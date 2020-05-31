<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
    public function nonaktif($url,$id)
    {
        $this->load->model('model_notifikasi');
        $this->model_notifikasi->nonaktif_status($url,$id);
    }
}