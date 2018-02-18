<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/12
 * Time: 15:15
 */
class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
    }
    public function index()
    {
        $data['title']='manager';
        $this->load->view('templates/header', $data);
        $this->load->view("manager/log");
        $this->load->view('templates/footer');
    }
    public function check()
    {
        $data['user']=$this->user_model->find();
        $this->load->view("manager/user",$data);
    }
    public function find()
    {
        $data['user']=$this->user_model->find($this->input->post('name'));
        $this->load->view("manager/user",$data);
    }
    public function delete()
    {
        $this->user_model->delete($this->input->post('id'));
        $this->check();
    }
}