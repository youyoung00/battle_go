<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	public function __construct()  
	{
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Board_model');
        $this->load->model('Comment_model'); 
        $this->load->library('session');

        if($this->session->userdata('email') == "")
		{
			header("Location: /index.php/member/login"); 
		}
	}

    public function index() {
        echo '게임테스트 컨트롤러';
    }

    //초기화면을 보여주는 메서드
    public function init()  {
        echo '초기화면입니다';
    }

    //게임 대기실 리스트를 불러오는 메서드
    public function game_list() {
        $_id = $this->session->userdata('_id');
        
        $profile_result = $this->Member_model->member_profile($_id);
        $profile['_id'] = $_id;
        $profile['email'] = $profile_result->id;
        $profile['nick'] = $profile_result->nick;
        $profile['win'] = $profile_result->win_record;
        $profile['lose'] = $profile_result->tot_record - $profile_result->win_record;

        $board_list = $this->Board_model->select_board_list();

        $data['profile'] = $profile;
        $data['board_list'] = $board_list;

        $this->load->view("game/game_list", $data);
    }

    // 방 생성창을 보여주는 메서드
    public function create() {
        $this->load->view("game/create");
    }

    // 방 생성 동작을 수행하는 메서드
    public function board_create() {
        $member_id = $this->session->userdata('_id');
        $title = $this->input->post('title');
        $host_color = $this->input->post('color');
        $guest_color = ($host_color + 1) % 2;

        $this->Board_model->insert_board($title, $member_id, $host_color, $guest_color);

        $this->wait();
    }

    // 방 입장 버튼을 눌렀을 때, 수행할 메서드
    public function enter() {
        $board_id = $this->input->get('board_id'); // get 방식으로 방 _id 값을 받아
        $member_id = $this->session->userdata('_id'); // 세션에서 member_id 값을 받아
        
        $result = $this->Board_model->enter_board($member_id, $board_id);
        
        $this->wait();
    }

    // 방생성후 대기화면을 보여주는 메서드
    public function wait() {
        $this->load->view("game/wait");
    }

    public function wait_check() {
        $result = $this->Board_model->check_board_status(5);

        var_dump($result);
    }

    // 게임시작후 진행화면을 보여주는 메서드
    public function play() {
        // $member_id = $this->session->userdata['_id'];
        $member_id = 10; // 테스트용 멤버 아이디(관전자)
        // $board_id = $this->input->get('board_id'); // get방식으로 board_id 가져오기
        $profile = $this->Member_model->member_profile($member_id);
        $board_id = 1; // 테스트용 보드 아이디
        $board_data = $this->Board_model->select_board($board_id);
        $comment_list = $this->Comment_model->select_comment_list($board_id);

        $data['profile'] = $profile;
        $data['member_id'] = $member_id;
        $data['board_data'] = $board_data;
        $data['comment_list'] = $comment_list;
        
        $this->load->view('game/play', $data);
    }

    // 기권할 경우 수행할 컨트롤러 메서드
    public function game_throw() {
        $board_id = $this->input->get('board_id'); // get 방식으로 board_id 가져오기
        $board_data = $this->Board_model->select_board($board_id);
        $member_id = $this->session->userdata('_id');
        $winner_id;

        if ($member_id == $board_data->host_id) {
            $winner_id = $board_data->guest_id;
        } else {
            $winner_id = $board_data->host_id;
        }

        $result = $this->Board_model->result_update_board($board_id, $winner_id);
    }

    //게임끝난후 결과화면을 보여주는 메서드
    public function result() {
        $this->load->view("game/result");
    }

    public function test_board() {
        $board_id = $this->input->get('board_id');
        $board_data = $this->Board_model->select_board($board_id);
        $member_id = $this->session->userdata('_id');
        $winner_id;

        if ($member_id == $board_data->host_id) {
            $winner_id = $board_data->guest_id;
        } else {
            $winner_id = $board_data->host_id;
        }

        $result = $this->Board_model->result_update_board($board_id, $winner_id);
    }
    
    
}