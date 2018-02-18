<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/23
 * Time: 10:32
 */

class MySelfController extends CI_Controller
{
    protected $session_data;
    protected $check;
    static $start=false;
    protected function checklog()
    {
        if(isset($_COOKIE["id"])&&isset($_COOKIE["key"]))
        {
            session_start();
            $id=$_COOKIE["id"];
            if(isset($_SESSION[$id])&&$_SESSION[$id]["key"]==$_COOKIE["key"])
            {
                $this->check=true;
                $this->session_data=$_SESSION[$id];
                return;
            }
            else
            {
                $this->check=false;
                $this->session_data=NULL;
                return;
            }
        }
    }
    public function __construct()
    {
        parent::__construct();
        //$this->checklog();
    }
}