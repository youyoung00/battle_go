<?php
class Test_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
    }

    // db 연결되었는지 테스트하는 메서드
    public function test_select() {

        $result = $this->db->query('
        SELECT
            *
        FROM
            name
        ;
        ');

        return $result->row();
    }
}
