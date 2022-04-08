<?php
class Game_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
        // test_@_@123
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
    public function select_stone_domino($board_id) {
        $data = $this->db->query("
        select 
            domino,
            insert_time
        from 
            GAME
        where
            waitboard_id = '".$board_id."' 
            and
            domino = (
                select
                    MAX(domino)
                from
                    GAME
                where
                    waitboard_id = '".$board_id."'
            )
        ");
        return $data->row();

    }


    //돌 좌표값 입력 메서드
    public function insert_game($x,$y,$domino,$color, $member_id, $board_id) {
        //TODO : 돌 좌표값을 입력하는 쿼리
        //리턴 값 : x

        $this->db->query("
        INSERT INTO 
            GAME(positionx, positiony, domino, color, member_id, waitboard_id)
        values 
            ('".$x."', '".$y."', '".$domino."', '".$color."', '".$member_id."', '".$board_id."');
        ");

    }


    public function record_game_result($member_id, $result) {
        // 게임 결과 저장
        // win : 1, lose : 0, total : 1  업데이트 함
        // 리턴 값 : x

        $this->db->query("
            UPDATE 
                member
            SET
                tot_record = tot_record + 1,
                win_record = win_record + '".$result."'
            WHERE
                _id = '".$member_id."';
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