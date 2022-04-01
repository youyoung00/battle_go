<?php
class Game_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
        // @_@123
    }


    //돌 리스트 가져오는 메서드
    public function select_game_list($board_id) {
        //TODO : 돌리스트를 가져오는 쿼리
        //리턴 값 : 돌리스트
        $data = $this->db->query("
        select 
            *
        from 
            GAME
        where
            waitboard_id = '".$board_id."'
        ");
        return $data->result_array();
        
    }


     //게임종료 판단을 위한 착수멤버의 스톤 리스트전달
     public function select_member_stonelist($board_id,$member_id) {
        //TODO : 돌리스트를 가져오는 쿼리
        //리턴 값 : 돌리스트
        $data = $this->db->query("
        select 
            *
        from 
            GAME
        Where
            member_id = '".$member_id."' AND 
            waitboard_id = '".$board_id."'
        ");
        return $data->result_array();
        
    }


    //바둑알 착수 순서
    public function select_stone_domino($member_id, $board_id) {
        $data = $this->db->query("
        select 
            MAX(domino)
        from 
            GAME
        where
            member_id = '".$member_id."'
            AND
            waitboard_id = '".$board_id."'
        ");
        return $data->result_array();

    }


    //돌 좌표값 입력 메서드
    public function insert_game($x,$y,$order,$color, $member_id, $board_id) {
        //TODO : 돌 좌표값을 입력하는 쿼리
        //리턴 값 : x

        $this->db->query("
        INSERT INTO 
            GAME(positionx, positiony, order, color, member_id, board_id)
        values 
            ('".$x."', '".$y."', '".$order."', '".$color."','".$member_id."','".$board_id."');
        ");

    }

    //착수가능 여부 확인 
    public function check_stone_overlap($x,$y, $board_id) {
    //TODO : 돌 좌표값을 입력하는 쿼리
    //리턴 값 : x

        $this->db->query("
        select
            _id
        from
            GAME
        where
            positionx = '".$x."'
        AND
            positiony = '".$y."'
        AND 
            waitboard_id = '".$board_id."'
        ");
    }

    //돌 상태를 업데이트하는 메서드
    public function update_game_view($game_id) {
        //TODO : 돌 먹혔을때 상태를 바꿔주는 쿼리
        //리턴 값 : x
    }

}