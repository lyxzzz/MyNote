<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/10
 * Time: 15:33
 */

class Label_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_val($data,$str)
    {
        if(isset($data[$str]))
        {
            return $data[$str];
        }
        else
        {
            return null;
        }
    }
    public function get_label($id)
    {
        $this->db->where('uid', $id);
        $this->db->where('bid', $this->get_val($_GET,'bookid'));
        $this->db->where('nid', $this->get_val($_GET,'noteid'));
        $this->db->select('lname');
        $query=$this->db->get("label");
        return $query->result_array();
    }
    public function has_label($id)
    {
        $this->db->where('uid', $id);
        $this->db->where('bid', $this->get_val($_GET,'bookid'));
        $this->db->where('nid', $this->get_val($_GET,'noteid'));
        $this->db->where('lname',$this->get_val($_GET,'labelname'));
        $this->db->select('lname');
        $query=$this->db->get("label");
        $row=$query->row_array();
        return isset($row);
    }
    public function add_label($id)
    {
        $data = array(
            'lid' => null,
            'lname' => $this->get_val($_GET,'labelname'),
            'uid' => $id,
            'bid' => $this->get_val($_GET,'bookid'),
            'nid' => $this->get_val($_GET,'noteid')
        );
        $this->db->insert('label', $data);
    }
    public function count_label($id)
    {
        $this->db->where('uid', $id);
        $this->db->where('bid', $this->get_val($_GET,'bookid'));
        $this->db->where('nid', $this->get_val($_GET,'noteid'));
        $this->db->select('count(*) as num');
        $query=$this->db->get("label");
        $row=$query->row_array();
        return $row['num'];
    }
    public function delete_label($id)
    {
        $tables = array('label');
        $this->db->where('uid', $id);
        $this->db->where('lname', $this->get_val($_GET,'labelname'));
        $this->db->where('bid', $this->get_val($_GET,'bookid'));
        $this->db->where('nid', $this->get_val($_GET,'noteid'));
        $this->db->delete($tables);
    }
}