<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 23:06
 */
include "MySelfController.php";
class Note extends MySelfController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('note_model');
        $this->load->model('label_model');
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->checklog();
    }
    public function index()
    {
        //$temp=$this->book_model->get_books($this->session_data['uid']);
        //$data['books'] = is_array($temp)?$temp:array();
//        $bookname=$_POST("bookname");
//        $notename=$_POST("notename");
        $data['title']="我的笔记";

        $this->load->view('templates/header', $data);
        $this->load->view('pages/234',$data);
        $this->load->view('templates/footer');
    }
    public function getnotes()
    {
        $temp=$this->note_model->get_notes($this->input->post('bookid'));
        $bookid=$this->input->post('bookid');
        $data['notes'] = is_array($temp)?$temp:array();
        $uid=$this->session_data['uid'];
        for($i=0;$i<count($data['notes']);++$i)
        {
            $noteid=$data['notes'][$i]['noteid'];
            $_GET['noteid']=$noteid;
            $data['notes'][$i]['label']=$this->label_model->get_label($uid);
        }
        $data['title']="我的笔记";
        $this->load->view('note/notes', $data);
    }
    public function savephoto()
    {
        $root="user_notes/".$this->session_data['uid'];
        if(!is_dir($root))
        {
            mkdir($root);
        }
        $root=$root."/images";
        if(!is_dir($root))
        {
            mkdir($root);
        }
        $fileinfo = $_FILES['file'];
        $destination = $root."/";
        $destination = $destination.rand(0,1000).basename($_FILES['file']['name']);
        move_uploaded_file($fileinfo['tmp_name'],$destination);
        echo "/web_project/".$destination;

    }
    public function savetext()
    {
        $root="user_notes/".$this->session_data['uid'];
        if(!is_dir($root))
        {
            mkdir($root);
        }
        $root=$root."/".$_POST['bookname'];
        echo($root);
        if(!is_dir($root))
        {
            mkdir($root);
        }
        $myfile = fopen($root."/".$_POST['notename'], "w");
        fwrite($myfile, $_POST['str']);
        fclose($myfile);
        echo "success";
    }
    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news User';
        if($this->note_model->has_note($this->input->post('bookid')))
        {
            $this->load->view("pages/fail");

        }
        else
        {
            $this->note_model->add_note($this->input->post('bookid'));
            $this->load->view("pages/success");
            $temp=$this->note_model->get_notes($this->input->post('bookid'));
            $t = is_array($temp)?$temp:array();
            //return json_encode($t);
        }
    }
    public function delete()
    {
        $this->note_model->delete($this->input->post('noteid'));
    }
    public function readnote()
    {
        $root="user_notes/".$this->session_data['uid'];
        if(!is_dir($root))
        {
            mkdir($root);
        }
        $root=$root."/".$_POST['bookname'];
        if(!is_dir($root))
        {
            mkdir($root);
        }
        $root=$root."/".$_POST['notename'];
        if(!is_file($root))
        {
            echo "";
        }
        else
        {
            $str = file_get_contents($root);
            echo $str;
        }
    }
    public function canwrite()
    {
        $uid=$this->session_data['uid'];
    }
    public function find()
    {
        $temp=$this->note_model->find($this->input->post('bookid'));
        $_GET['bookid']=null;
        $data['notes'] = is_array($temp)?$temp:array();
        $uid=$this->session_data['uid'];
        for($i=0;$i<count($data['notes']);++$i)
        {
            $noteid=$data['notes'][$i]['noteid'];
            $_GET['noteid']=$noteid;
            $data['notes'][$i]['label']=$this->label_model->get_label($uid);
        }
        $data['title']="我的笔记";
        $this->load->view('note/notes', $data);
    }
    public function loadinfo($id)
    {
        $data['title']="main"; // Capitalize the first letter
        $data['title']="我的笔记";
        $data['active']="note";
        $data['content']=$this->note_model->noteinfo($id);
        $data['title']=$_GET['title'];
        $data['a']='home';
        $this->load->view('templates/header', $data);
        $this->load->view("pages/123",$data);
        $this->load->view('pages/home1', $data);
        $this->load->view('pages/infopage2', $data);
        $this->load->view('templates/footer');
    }
    public function pdf()
    {
        $pdf=new HTML2FPDF();
        $pdf->AddPage();
        // yourfile.html 你要转化的HTML文件
        $yourfile_html = "yourfile.html";
        // yourfile.pdf 转化成功后的pdf文件名
        $yourfile_pdf = "yourfile.pdf";
        $fp = fopen($yourfile_html,"r");
        $strContent = fread($fp, filesize($yourfile_html));
        fclose($fp);
        $pdf->WriteHTML($strContent);
        $pdf->Output($yourfile_pdf );
    }
}