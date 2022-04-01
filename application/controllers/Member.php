<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 멤버 컨트롤러
class Member extends CI_Controller {

	public function __construct()  
	{
		parent::__construct();
        $this->load->model('Member_model'); 
        $this->load->library('session');
	}

    public function index() {
        echo '멤버 컨트롤러';
    }

    // 로그인 화면을 로딩하는 메서드
    public function login() {
         
        $this->session->sess_destroy(); 
        $this->load->view("member/login");
    }

    // 회원가입 화면을 로딩하는 메서드
    public function input() {
        $this->load->view("member/input");
    }

    //회원가입시 입력을 실행하는 메서드
    public function insert() {
        $email = $this->input->post("email"); 
		$password = $this->input->post("password");
        $password = md5($password);
        $nickname = $this->input->post("nickname");
        $grade = $this->input->post("grade");

        $result = $this->Member_model->member_insert($email, $password, $nickname, $grade);

        if($result == true) {
			header("Location: /index.php/member/login?msg=회원가입 성공");
		}
		else {
			header("Location: /index.php/member/input?msg=이미 있는 이메일 입니다");
		}
    }

    //로그인 세션을 사용하는 메서드
    public function session() {
        $email = $this->input->post("email"); 
		$password = $this->input->post("password");
        $password = md5($password);
        
        $result = $this->Member_model->member_select($email, $password);
        var_dump($result);

        if (isset($result->_id)) {  // email, pw와 일치하는 데이터가 있으면 성공, 아니면 실패
            $newdata = array(   // 성공시 email, _id 세션에 저장
				'email'     => $email,
				'_id' 		=> $result->_id
			);

			$this->session->set_userdata($newdata);

			header("Location: /index.php/game/game_list"); // Game->game_list 이동
        } else {
            header("Location: /index.php/member/login?msg=다시 입력해주세요"); // Member->login 이동
        }
    }
}