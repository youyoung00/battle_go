<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	public function __construct()  
	{
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Board_model');
		$this->load->model('Game_model');
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

        $board_id = $this->Board_model->insert_board($title, $member_id, $host_color, $guest_color);

        $this->wait($board_id);
    }

    // 방 입장 버튼을 눌렀을 때, 수행할 메서드
    public function enter() {
        $board_id = $this->input->get('board_id'); // get 방식으로 방 _id 값을 받아
        $member_id = $this->session->userdata('_id'); // 세션에서 member_id 값을 받아
        
        $result = $this->Board_model->enter_board($member_id, $board_id);
        
        $this->wait($board_id);
    }

    // 방생성후 대기화면을 보여주는 메서드
    public function wait($board_id) {
        $data['board_id'] = $board_id;
        $this->load->view("game/wait", $data);
    }

    // 대기중일 때 방 상태를 체크하는 메서드
    public function wait_check() {
        $board_id = $this->input->get('board_id');
        $result = $this->Board_model->check_board_status($board_id);

        $data['status'] = $result->status;
        echo json_encode($data);
    }

    // 매칭 후 매칭중화면을 보여주는 메서드
    public function matching() {
        $board_id = $this->input->get('board_id');
        $data['board_id'] = $board_id;
        $this->load->view("game/matching", $data);
    }


    public function match_check() {
        $board_id = $this->input->get('board_id');
        $result = $this->Board_model->select_board($board_id);

        $data['board_data'] = $result;
        echo json_encode($data);
    }

    // 게임시작후 진행화면을 보여주는 메서드
    public function play() {
        // $member_id = $this->session->userdata['_id'];
        $member_id = 10; // 테스트용 멤버 아이디(관전자)
        // $board_id = $this->input->get('board_id'); // get방식으로 board_id 가져오기
        $profile = $this->Member_model->member_profile($member_id);
        $board_id = 1; // 테스트용 보드 아이디
        $board_data = $this->Board_model->select_board($board_id);
        // $comment_list = $this->Comment_model->select_comment_list($board_id);

        $data['profile'] = $profile;
        $data['member_id'] = $member_id;
        $data['board_data'] = $board_data;
        // $data['comment_list'] = $comment_list;
        
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
        
        // $this->record_result($board_id, $winner_id);
        header("Location: /index.php/game/record_result?board_id=".$board_id."&winner_id=".$winner_id); // Game->record_result 이동
    }

    // 게임결과 업데이트 메서드
    public function record_result() {
        $board_id = $this->input->get('board_id');
        $winner_id = $this->input->get('winner_id');

        // 각 멤버 판수, 승수 업데이트
        // 방 정보 가져오기
        $board_data = $this->Board_model->select_board($board_id);
        
        $loser_id;
        if ($winner_id == $board_data->host_id) {
            $loser_id = $board_data->guest_id;
        } else {
            $loser_id = $board_data->host_id;
        }

        $this->Game_model->record_game_result($winner_id, 1);
        $this->Game_model->record_game_result($loser_id, 0);

        // 방에 승자정보 업데이트
        $this->Board_model->result_update_board($board_id, $winner_id);

    }

    // 게임끝난후 결과화면을 보여주는 메서드
    public function result() {
        // 멤버 id 세션에서 가져오기
        $member_id = $this->session->userdata('_id');

        // 보드 id get방식으로 가져오기
        $board_id = $this->input->get('board_id');
        
        // 보드 정보 가져오기
        $board_data = $this->Board_model->select_board($board_id);

        // 승자 정보 가져오기
        $winner_profile = $this->Member_model->member_profile($member_id);

        // 전달할 데이터 (승자 닉네임, 승자 바둑돌 칼라)
        $data['nick_name'] = $winner_profile->nick;
        if ($board_data->winner_id == $board_data->host_id) {
            $data['win_color'] = $board_data->host_color;
        } else {
            $data['win_color'] =$board_data->guest_color;
        }

        if ($member_id == $board_data->winner_id) {
            // 승자일 경우
            $this->load->view('game/result_win', $data);
        } else if ($member_id == $board_data->host_id || $member_id == $board_data->guest_id) {
            // 패자일 경우
            $this->load->view('game/result_lose', $data);
        } else {
            // 관전자일 경우
            $this->load->view('game/result_observer', $data);
        }
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
    
    public function game_data() {
        // 방 id get 방식으로 입력받기
        $board_id = $this->input->get('board_id');

        // 방 정보 가져오기
        $board_data = $this->Board_model->select_board($board_id);

        // 바둑돌 순서 가져오기
        $last_order = $this->Game_model->select_stone_domino($board_id);
        $new_order;
        if (isset($last_order->domino)) { 
            $new_order = $last_order->domino + 1;
        } else {
            $new_order = 0;
        }

        // 바둑돌 리스트 가져오기
        $stone_list = $this->Game_model->select_game_list($board_id);

        // json 형식으로
        if ($board_data->winner_id == 0) {
            $board_data->winner_id = "";
        }
        $data['board_data'] = $board_data;
        $data['order'] = $new_order;
        $data['stone_list'] = $stone_list;

        echo json_encode($data);
    }

    public function test() {
        $result = $this->Board_model->insert_board('test', 3, 0, 1);
        var_dump($result);
    }
}