<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 17:51
 */

class User_model extends CI_Model {

    private function __getid()
    {
        session_start();
        return 1;
    }
    private function __setData($ucount,$upasswd,$authority=false,$uname=NULL,$uage=NULL,$usex=NULL,$intro=NULL,$uid=NULL)
    {
        $data = array(
            'uid' => $uid,
            'ucount' => $ucount,
            'upasswd' => $upasswd,
            'manager' => $authority,
            'uname' => $uname,
            'uage' => $uage,
            'usex' => $usex,
            'introduction' => $intro
        );
        return $data;
    }

    public function __construct()
    {
        $this->load->database();
    }
    public function add_user($authority=false)
    {
        session_start();
        $data = $this->__setData($this->input->post('username'),hash("sha1",$this->input->post('userpassword')));
        $this->db->insert('user', $data);
        $str=md5(time());
        $cookie_id=substr($str,0,16);
        $cookie_key = substr($str,16,16);
        setcookie("id",$cookie_id,time()+60*60*24*7,'/');
        setcookie("key",$cookie_key,time()+3060*60*24*7,'/');
        $_SESSION[$cookie_id]=array(
            "key" => $cookie_key,
            "uid" => $data['uid'],
            "username" => $data["ucount"],
            "noteid" => NULL
        );
        return $this->db->affected_rows();
    }
    public function is_repeat()
    {
        $query = $this->db->query("select ucount from user where ucount = '".$this->input->post('username')."';");
        $row=$query->row_array();
        return isset($row);
    }
    public function canlog()
    {
        session_start();
        $newdata = $this->input->post('username');
        $query = $this->db->query("select uid,upasswd from user where ucount = '".$newdata."';");
        $pd= hash("sha1",$this->input->post('userpassword'));
        if($pd==$query->row_array()['upasswd'])
        {
            $str=md5(time());
            $cookie_id=substr($str,0,16);
            $cookie_key = substr($str,16,16);
            setcookie("id",$cookie_id,time()+60*60*24*7,'/');
            setcookie("key",$cookie_key,time()+3060*60*24*7,'/');
            $_SESSION[$cookie_id]=array(
                "key" => $cookie_key,
                "uid" => $query->row_array()['uid'],
                "username" => $newdata,
                "noteid" => NULL
            );
            return true;
        }
        else
        {
            return false;
        }
    }
    public function logout($id)
    {
        $_SESSION[$id]=NULL;
    }
    public function get_info()
    {
        $id=__getid();
        $query = $this->db->query("select * from user where uid = '".$id."';");
        return $query->row_array();
    }
    public function set_info()
    {
        $id=__getid();
        $data = array(
            'uname' => $this->input->post('uname'),
            'uage' => $this->input->post('uage'),
            'usex' => $this->input->post('usex'),
            'introduction' => $this->input->post('intro')
        );
        $this->db->where('uid', $id);
        $this->db->update('user', $data);
    }
    public function find($id="")
    {
        $query = $this->db->query("select ucount,uid from user where ucount like '%".$id."%'");
        return $query->result_array();
    }
    public function delete($id)
    {
        $tables = array('user');
        $this->db->where('uid', $id);
        $this->db->delete($tables);
    }
}