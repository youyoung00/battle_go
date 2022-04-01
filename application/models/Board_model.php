<?php
class Board_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
    }

    //방목록을 불러와서 보여주는 메서드
    public function select_board_list() {
        // TODO: 방목록을 가져와서 보여주는 쿼리
        // 삭제된 방은 제외
        // 방의 상태를 기준으로 정렬
        // 리턴 값 : 방목록
        $data = $this->db->query("
        select 
            _id,
            title,
            status
        from 
            waitboard 
        where 
            status = 0
            OR status = 1
            OR status = 2
        ORDER BY 
            status ASC
        ");
        return $data->result_array();
    }

    //방생성 메서드
    public function insert_board($title, $member_id, $host_color, $guest_color) {
        // TODO: 방생성을 하는 쿼리
        // 리턴 값 : x
        $this->db->query("
        INSERT INTO 
                waitboard(title, host_id, host_color, guest_color)
        values 
                ('".$title."', '".$member_id."', '".$host_color."','".$guest_color."');
        ");
    }
    
    //방폭파 메서드
    public function delete_board($board_id) {
        // TODO: 방 폭파 쿼리
        // 리턴 값 : x
        $this->db->query("
            UPDATE 
                    waitboard
            SET 
                    status = 3
            WHERE 
                    _id = ".$board_id."
        ");
    }

    // 방 입장 메서드
    public function enter_board($member_id, $board_id) {
        // TODO: 방 입장 쿼리
        // 업데이트 쿼리
        // 방 상태 1로, 게스트 아이디
        // 방 아이디, 상태가 0인 방에
        // 리턴 값 : x

        $this->db->query("
            UPDATE 
                waitboard
            SET
                status = 1,
                guest_id = '".$member_id."'
            WHERE
                _id = ".$board_id." AND status = 0
        ");

    }


    public function check_board_status($board_id) {
        // TODO: 방 상태 체크하는 쿼리
        // 리턴 값 : 방 상태
        $data = $this->db->query("
            select 
                status
            from 
                waitboard
            where  
                _id = ".$board_id."
        ");

        return $data->row();

    }

    // 방 정보를 가져오는 메서드
    public function select_board($board_id) {
        // TODO: 방 정보를 가져오는 메서드
        // 방 아이디를 가지고
        // 리턴 값 : 방의 모든 컬럼
        $data = $this->db->query("
            select 
                *
            from 
                waitboard
            where  
                _id = ".$board_id."
        ");

        return $data->row();
    }

    // 방 승자 정보를 입력하는 메서드
    public function result_update_board($board_id, $winner_id) {
        // TODO: 방 승자 정보를 입력하는 쿼리
        // 방 아이디, 승자 아이디를 가지고
        // 리턴 값 : x
        $this->db->query("
        UPDATE 
            waitboard
        SET 
            status = 2,
            winner_id = ".$winner_id." 

        WHERE 
            _id = ".$board_id."
        ");

    }
}

