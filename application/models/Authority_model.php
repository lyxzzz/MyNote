<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 23:05
 */

class Authority_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function canwrite($uid)
    {
        $bid=$this->input->get('bookid');
        $nid=$this->input->get('noteid');
    }
    public function canread($abc)
    {
        $id=$this->input->get("isbook")=='true'?$this->input->get("bookid"):$this->input->get("noteid");
        if($this->input->get("isbook")=='true')
        {
            $this->db->where('bookid', $id);
            $this->db->select('read');
            $query=$this->db->get("notebook");
        }
        else
        {
            $this->db->where('noteid', $id);
            $this->db->select('read');
            $query=$this->db->get("note");
        }
        $row=$query->row_array();
        return $row;
    }
    public function changeread()
    {
        $is=$this->input->get("isbook")=='true';
        $id=$is?$this->input->get("bookid"):$this->input->get("noteid");
        $read=$this->input->get("read");
        $data = array(
            'read' => $read,
        );
        if($is)
        {
            $this->db->where('bookid', $id);
            $this->db->update('notebook', $data);
        }
        else
        {
            $this->db->where('noteid', $id);
            $this->db->update('note', $data);
        }
    }
}
