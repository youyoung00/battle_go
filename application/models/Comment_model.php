<?php
class Comment_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
    }

    // 댓글 목록을 가져오는 메서드
    public function select_comment_list($board_id) {
        // TODO: 댓글 목록 가져오는 쿼리
        // 방 아이디에 포함되는 댓글만
        // 댓글 컬럼 + 작성자 닉네임
        // 리턴 값 : 댓글 리스트

        $data = $this->db->query("
        select 
            *,
            (select nick from member where _id = COMMENT.member_id) as nick
        from 
            COMMENT as COMMENT
        where 
            waitboard_id = ".$board_id." AND status = 0 
        ");
        return $data->result_array();
    }


    // 새로운 댓글을 추가하는 메서드
    public function insert_comment($board_id, $member_id, $content) {
        // TODO: 새로운 댓글 테이블에 추가하는 쿼리
        // 방아이디, 작성자 아이디, 댓글 내용
        // 리턴 값 : x

        $this->db->query("
        INSERT INTO 
            COMMENT(waitboard_id, member_id, content)
        values 
            ('".$board_id."','".$member_id."','".$content."');
        ");
    }

    // 댓글을 삭제하는 메서드
    public function delete_comment($comment_id) {
        // TODO: 댓글을 테이블에서 삭제하는 쿼리
        // status =1 은 삭제
        // 댓글 아이디
        // 리턴 값 : x
        $this->db->query("
            UPDATE 
                COMMENT
            SET 
                status = 1
            WHERE 
                _id = ".$comment_id."
        ");
    }

}