<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 23:05
 */

class Book_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_books($id)
    {
        $query = $this->db->query("select count(noteid) as times,A.bookname as bookname ,A.bookid as bookid from (select bookname,bookid from `notebook` where uid = '".$id."') as A left join `note` on A.`bookid`=`note`.`bookid` group by A.bookid order by times DESC,bookname ASC;");
        return $query->result_array();
    }
    public function add_book($id)
    {
        $data = array(
            'bookid' => NULL,
            'bookname' => $this->input->post('bookname'),
            'uid' => $id,
        );
        $this->db->insert('notebook', $data);
        return $this->db->affected_rows();
    }
    public function has_book($id)
    {
        $query = $this->db->query("select bookid from notebook where bookname = '".$this->input->post('bookname')."' and  uid = '".$id."';");
        $row=$query->row_array();
        return isset($row);
    }
    public function find($id)
    {
        $query = $this->db->query("select count(noteid) as times,A.bookname as bookname ,A.bookid as bookid from (select bookname,bookid from `notebook` where bookname like '%".$this->input->get('bookname')."%'and uid = '".$id."') as A left join `note` on A.`bookid`=`note`.`bookid` group by A.bookid;");
        return $query->result_array();
    }
    public function delete($id)
    {
        $query=$this->db->query("select bookid from notebook where bookname = '".$this->input->post('bookname')."' and  uid = '".$id."';");
        $data=$query->row_array();
        $bookid=$data['bookid'];
        $tables = array('note','notebook');
        $this->db->where('bookid', $bookid);
        $this->db->delete($tables);
    }
    public function get_allbook()
    {
        $query=$this->db->query("select bookid as id,bookname as `name` from `notebook` where read=0 order by bookname ASC;");
        return $query->result_array();
    }
    public function get_notes($id)
    {
        $query=$this->db->query("select noteid as id,notename as `name` from note where read=0 and bookid='".$id."'");
        return $query->result_array();
    }
    public function notename($id)
    {
        $query = $this->db->query("select bookname from notebook where bookid='".$id."';");
        $row=$query->row_array();
        if(isset($row))
        {
            return $row['bookname'];
        }
        else
        {
            return "";
        }
    }
    public function has_notes($id)
    {
        $query=$this->db->query("select noteid as id,notename as `name` from note where read=0 and bookid='".$id."' limit 1");
        $row=$query->row_array();
        return isset($row);
    }
}