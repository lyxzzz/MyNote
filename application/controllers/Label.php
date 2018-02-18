<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/10
 * Time: 15:33
 */
include "MySelfController.php";
class Label extends MySelfController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('label_model');
        $this->checklog();
    }
    public function getlabel()
    {
        $temp=$this->label_model->get_label($this->session_data['uid']);
        $data["label"]=$temp;
        $this->load->view('note/label',$data);
    }
    public function addlabel()
    {
        $id=$this->session_data['uid'];
        if(!$this->label_model->has_label($id))
        {
            if($this->label_model->count_label($id)<=3)
            {
                $this->label_model->add_label($this->session_data['uid']);
                echo "success";

            }
            else{
                echo "much";
            }
        }
        else{
            echo"fail";
        }
    }
    public function deletelabel()
    {
        $this->label_model->delete_label($this->session_data['uid']);
    }
}