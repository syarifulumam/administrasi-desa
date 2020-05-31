<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_notifikasi extends CI_Model {
    public function get_data()
    {
        $this->db->order_by('id_nontifikasi','desc');
        return $this->db->get_where('notifikasi',array('status'=>0));
    }
    public function nonaktif_status($url,$id)
    {
        $data = [
            'status' => 1
        ];
        $this->db->where('id_nontifikasi',$id);
        $this->db->update('notifikasi',$data);
        redirect($url);
    }
}