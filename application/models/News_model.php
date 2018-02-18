<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20
 * Time: 22:48
 */
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->query("select * from `user`;");
            return $query->result_array();
        }

        //$query = $this->db->get_where('news', array('slug' => $slug));
        $query = $this->db->query("select * from `user`;");
        return $query->row_array();
    }public function set_news()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );

    return $this->db->insert('news', $data);
}

}
