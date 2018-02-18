<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20
 * Time: 22:57
 */
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index($page = "None")
    {
        $data['news'] = $this->news_model->get_news();
        $data['uid'] = 'News archive';
        $data['title']=$page;
        $this->load->view('templates/header', $data);
        $this->load->view('news/index123', $data);
        $this->load->view('templates/footer');

    }

    public function view($page = "None",$slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);
        $data['title']=$page;
        if (empty($data['news_item']))
        {
            show_404();
        }

        $data['uid'] = $data['news_item']['uid'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

}
