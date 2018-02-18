<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 23:06
 */
include "MySelfController.php";
class Book extends MySelfController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->checklog();
    }
    public function index()
    {
        $temp=$this->book_model->get_books($this->session_data['uid']);
        $data['books'] = is_array($temp)?$temp:array();
        $data['title']="我的笔记";
        $data['a']='note';
        $this->load->view('templates/header', $data);
        $this->load->view("pages/123",$data);
        $this->load->view('book/books', $data);
        $this->load->view('templates/footer');

    }
    public function getbooks()
    {
        $temp=$this->book_model->get_books($this->session_data['uid']);
        $data['books'] = is_array($temp)?$temp:array();
        $this->load->view('book/notebook', $data);
    }
    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news User';
        if($this->book_model->has_book($this->session_data['uid']))
        {
            $this->load->view("pages/fail");

        }
        else
        {
            $this->book_model->add_book($this->session_data['uid']);
            $this->load->view("pages/success");
            $temp=$this->book_model->get_books($this->session_data['uid']);
            $t = is_array($temp)?$temp:array();
            return json_encode($t);
        }
    }
    public function update()
    {

    }
    public function delete()
    {
        $this->book_model->delete($this->session_data['uid']);
    }
    public function find()
    {
        $temp=$this->book_model->find($this->session_data['uid']);
        $data['books'] = is_array($temp)?$temp:array();
        $this->load->view('book/notebook', $data);
    }
    public function loadinfo($id)
    {
        $data['title']="main"; // Capitalize the first letter
        $data['title']="我的笔记";
        $data['active']="book";
        $data['data']=$this->book_model->get_notes($id);
        $data['title']=$this->book_model->notename($id);
        $data['a']='home';
        $this->load->view('templates/header', $data);

        $this->load->view("pages/123",$data);

        $this->load->view('pages/home1', $data);
        if($this->book_model->has_notes($id))
        {
            $this->load->view("pages/infopage1",$data);
        }
        else
        {
            $this->load->view("pages/None",$data);
        }

        $this->load->view('templates/footer');
    }
}