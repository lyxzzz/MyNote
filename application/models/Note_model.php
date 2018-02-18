<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 23:05
 */

class Note_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_notes($id)
    {
        $query = $this->db->query("select noteid,notename from `note` where bookid = '".$id."' order by notename ASC;");
        return $query->result_array();
    }
    public function get_labels($id)
    {
        return array(
            'sadfjlk','xcv','a'
        );
    }
    public function add_note($id)
    {
        $data = array(
            'noteid' => NULL,
            'notename' => $this->input->post('notename'),
            'bookid' => $id,
        );
        $this->db->insert('note', $data);
        return $this->db->affected_rows();
    }
    public function has_note($id)
    {
        $query = $this->db->query("select noteid from note where notename = '".$this->input->post('notename')."' and  bookid = '".$id."';");
        $row=$query->row_array();
        return isset($row);
    }
    public function find($id)
    {
        $bid=$this->input->get('bookid');
        $notename=$this->input->get('notename');
        $query = $this->db->query("select noteid,notename from note where bookid ='".$bid."' and notename like '%".$notename."%' union select distinct noteid,notename from label left join note on label.nid=note.noteid where bookid='".$bid."'and lname like '%".$notename."%'");
        return $query->result_array();
    }
    public function delete($id)
    {
        $tables = array('note');
        $this->db->where('noteid', $id);
        $this->db->delete($tables);
    }
    public function get_allnote()
    {
        $query=$this->db->query("select noteid as id,notename as `name` from `note` where read=0 order by notename ASC;");
        return $query->result_array();
    }
    public function noteinfo($id)
    {
        $query=$this->db->query("select notename,bookid from note where noteid='".$id."'");
        $row=$query->row_array();
        if(isset($row))
        {
            $result=$row['notename'];
            $_GET['title']=$result;
            $query=$this->db->query("select uid,bookname from notebook where bookid='".$row['bookid']."'");
            $row1=$query->row_array();
            $root="user_notes/".$row1['uid'];
            if(!is_dir($root))
            {
                mkdir($root);
            }
            $root=$root."/".$row['bookid'];
            if(!is_dir($root))
            {
                mkdir($root);
            }
            $root=$root."/".$id;
            echo $root;
            if(!is_file($root))
            {
                return "";
            }
            else
            {
                $str = file_get_contents($root);
                return $str;
            }
        }
        return "";
    }
}