<?php
class Member_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
    }

    // db에 id중복을 체크하는 메서드
    public function member_check($id) {

        // id 중복을 체크하는 쿼리
        $data = $this->db->query("
        select
            _id
        from
            member
        where
            id = '".$id."'
        ");

    return $data->row();
        
    }

    // db에 등록된 유저가 맞는지 확인하는 메서드
    public function member_select($id, $password) {
        $data = $this->db->query("
            select
                _id
            from
                member
            where
                id = '".$id."'
                AND
                pw =  '".$password."'
            ");

        return $data->row();
    }

    // 새로운 유저 정보를 db에 등록하는 메서드
    public function member_insert($id, $password, $nickname, $grade) {
        $result = $this->member_check($id);

        if(!isset($result->_id))
        {
            $this->db->query("
                INSERT INTO member(id, pw, nick, grade)
                values('".$id."', '".$password."',  '".$nickname."',  '".$grade."')
            ");
            return true;
        }
        else {
            return false;
        }
        // member db에 삽입하는 쿼리
        // 리턴 값 x
    }

    public function login_select($email,$password)
    {
        $data = $this->db->query("
        select 
            _id 
        from 
            member
        where  
            id = '".$id."' and
            pw = '".$password."'
        ");


        return $data->row();
    }

    public function member_update($id, $password, $nickname, $grade) {
        $this->db->query("
                UPDATE 
                        member
                SET 
                        id = '".$id."', 
                        pw = '".$password."', 
                        nick = '".$nickname."', 
                        grade = '".$grade."'
                WHERE 
                        _id = ".$id."
        ");
    }

    // 멤버 _id로 멤버 프로필정보 가져오는 메서드
    public function member_profile($_id) {
        // member테이블에서 _id와 일치하는 데이터 가져오는 쿼리
        // 삭제된 유저 제외
        // pw, status 제외한 컬럼
        // row() 리턴
        $data = $this->db->query("
        select 
            id,
            nick,
            tot_record,
            win_record
        from 
            member
        where
            _id = '".$_id."'
        ");

        return $data->row();
    }
}
