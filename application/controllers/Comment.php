<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct()  
	{
		parent::__construct(); 
		$this->load->model('Comment_model');
        $this->load->library('session');
	}

    public function index() {
        echo '게임테스트 컨트롤러';
    }

    // 댓글 목록 가져오는 컨트롤러 메서드
    public function comment_list() {
        $board_id = $this->input->get('board_id');
        $comment_list = $this->Comment_model->select_comment_list($board_id);

        echo json_encode($comment_list);
    }

    // 댓글 추가하는 컨트롤러 메서드
    public function comment_insert() {
        $member_id = $this->session->userdata('_id');
        $board_id = $this->input->post('board_id');
        $content = $this->input->post('content');

        $this->Comment_model->insert_comment($board_id, $member_id, $content);
    }

    // 댓글 삭제하는 컨트롤러 메서드
    public function comment_delete() {
        $comment_id = $this->input->get('comment_id');
        echo $comment_id;

        $this->Comment_model->delete_comment($comment_id);
    }


}