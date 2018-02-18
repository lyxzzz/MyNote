<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 17:48
 */
include "MySelfController.php";
class User extends MySelfController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->checklog();
    }

    public function sign_up($authority=false)
    {

        $this->load->helper('form');
        $this->load->library('form_validation');
        if($this->check)
        {
            redirect('book/index');
            return ;
        }
        $data['title'] = 'Create a news User';

//        $this->form_validation->set_rules('username', 'Name', 'required');
//        $this->form_validation->set_rules('userpassword', 'Password', 'required');

        if (false)
        {
//            $this->load->view('templates/header', $data);
//            $this->load->view('user/sign_up');
//            $this->load->view('templates/footer');
        }
        else
        {
            if($this->user_model->is_repeat())
            {
                $this->load->view('pages/fail');
            }
            else
            {
                $this->user_model->add_user();
                $this->load->view('pages/success');
            }
        }
    }
    public function login()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');
        if($this->check)
        {
            redirect('book/index');
            return ;
        }
        $data['title'] = 'Create a news User';

        $this->form_validation->set_rules('username', 'Name', 'required');
        $this->form_validation->set_rules('userpassword', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('user/sign_in');
            $this->load->view('templates/footer');
        }
        else
        {
            if($this->user_model->canlog())
            {
                $this->load->view('pages/success');
            }
            else
            {
                $this->load->view('pages/fail');
            }
        }
    }
    public function logout()
    {
        $data['title'] = 'Create a news User';
        if(!$this->check)
        {
            redirect('user/signin');
            return ;
        }
            $this->user_model->logout($_COOKIE["id"]);
            redirect('user/signin');
    }
    public function getInfo()
    {
        $data['info'] = $this->user_model->get_info();
        $data['title'] = '个人信息';
        if (empty($data['info']))
        {
            show_404();
        }

        $data['uid'] = $data['info']['uid'];

        $this->load->view('templates/header', $data);
        $this->load->view('user/info', $data);
        $this->load->view('templates/footer');
    }
    public function setInfo()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = '设置个人信息';

        if($this->user_model->set_info())
        {
            $this->load->view('pages/success');
        }
        else
        {
            $this->load->view('pages/fail');
        }
    }
}