<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stone extends CI_Controller {

	public function __construct()  
	{
		parent::__construct(); 
		$this->load->model('Game_model');
        $this->load->model('Board_model');
        $this->load->library('session');
	}

    public function index() {
        echo '돌리스트 컨트롤러';
    }

    // 돌 목록 가져오는 컨트롤러 메서드
    public function stone_list() {
        // 돌 리스트 가져오기
        // 돌 좌표, 방 id, 멤버 id, 돌 색깔

        $board_id = $this->input->get('board_id');
        $stone_list = $this->Game_model->select_game_list($board_id);

        echo json_encode($stone_list);
    }

    // 돌 새로 삽입하는 컨트롤러 메서드
    public function stone_insert() {
        // post 방식으로 돌 좌표, 방 id 입력받기
        $board_id = $this->input->post('board_id');
        $position_x = $this->input->post('position_x');
        $position_y = $this->input->post('position_y');

        // 세션에서 멤버 id 가져오기
        $member_id = $this->session->userdata('_id');

        var_dump($board_id);
        var_dump($position_x);
        var_dump($position_y);
        var_dump($member_id);
        exit();
        
        // 좌표에 돌이 이미 존재하는지 확인



        // 방 id를 가지고 돌 순서 계산하기
        $last_order = $this->Game_model->select_stone_order($board_id);
        $new_order;
        if (isset($last_order)) { 
            $new_order = 1;
        } else {
            $new_order = $last_order + 1;
        }

        // 돌 색상 가져오기
        $board_data = $this->Board_model->select_board($board_id);
        $stone_color;

        if ($member_id == $board_data->host_id) {
            $stone_color = $board_data->host_color;
        } else {
            $stone_color = $board_data->guest_color;
        }

        // 새로운 돌 입력하기
        $this->Game_model->insert_game($position_x, $position_y, $new_order, $stone_color, $member_id, $board_id);

        // 게임 끝났는지 체크
        stone_five_check($board_id, $position_x, $position_y);
    }
    
    public function stone_five_check($board_id, $x, $y) {
        // 세션에서 멤버아이디 가져오기
        $member_id = $this->session->userdata('_id');

        // 그멤버아이디에 대한 돌 리스트
        $stone_list = $this->Game_model->select_member_stonelist($board_id, 3);

        // 가져온 돌리스트에서 돌이 연속으로 5개있는지 체크
        $min_x = ($x - 4) < 0 ? 0 : ($x - 4);
        $max_x = ($x + 4) > 18 ? 18 : ($x + 4);
        $min_y = ($y - 4) < 0 ? 0 : ($y - 4);
        $max_y = ($y + 4) > 18 ? 18 : ($y + 4);
        
        // 가로 체크
        $count = 0;
        for ($i = $min_x; $i <= $max_x; $i++) {
            // array에서 x값이 $this_x, y값이 $y인 값 찾기
            $result = array_filter($stone_list, function ($stone) use($i, $y) {
                return $stone['positionx'] == $i && $stone['positiony'] == $y;
            });
            var_dump(count($stone_list));
            echo '<br/>';
            var_dump(count($result));
            echo '<br/>';
            if (count($result) >= 1) {
                $count ++;
            } else {
                if ($count == 5) {
                    return True;
                }
                $count = 0;
            }
            echo $count;
        }
        if ($count == 5) {
            return True;
        }
        
        // 세로 체크
        $count = 0;


        // 대각 체크

    }

    public function test() {
        echo $this->stone_five_check(1, 5, 3);
    }
}