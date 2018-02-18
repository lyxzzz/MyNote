<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20
 * Time: 21:36
 */
include "MySelfController.php";
class Pages extends MySelfController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('note_model');
        $this->load->helper('url_helper');
        $this->checklog();
    }

    public function view($page = 'home')
    {
        $this->checklog();
        $this->load->helper('url_helper');
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if(!$this->check)
        {
            redirect('user/signin');
            return ;
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
       // $this->load->view('pages/'.'234', $data);
        $this->load->view('templates/footer', $data);

    }
    public function photo($page='home')
    {
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('pages/'.$page, $data);
       // $this->load->view('pages/'.'234', $data);
    }
    public function mainpage($target='book')
    {
        $data['title']="main"; // Capitalize the first letter
        $data['title']="我的笔记";
        $data['active']=$target;
        $data['a']='home';
        $this->load->view('templates/header', $data);
        $this->load->view("pages/123",$data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }
    public function loadinfo()
    {
        $value=$this->input->get("target");
        if($value=='writer')
        {
            echo "正在升级,更多功能敬请稍后";
            return;
        }
        else if($value=='book')
        {
            $data['data']=$this->book_model->get_allbook();
        }
        else
        {
            $data['data']=$this->note_model->get_allnote();
        }
        $this->load->view("pages/infopage",$data);
    }
}
