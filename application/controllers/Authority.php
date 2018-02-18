<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/10
 * Time: 21:45
 */
include "MySelfController.php";
class Authority extends MySelfController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('authority_model');
        $this->load->helper('url_helper');
        $this->checklog();
    }
    public function canread()
    {
        echo $this->authority_model->canread($this->session_data['uid'])['read'];
    }
    public function changeread()
    {
        $this->authority_model->changeread($this->session_data['uid']);
    }
}