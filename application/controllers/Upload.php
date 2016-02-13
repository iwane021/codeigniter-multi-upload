<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

 public function __construct()
  {
      parent::__construct();
      $this->load->helper(array('form', 'url'));
  }

 public function index()
 {
    $this->load->view('upload_form_multi_2');
 }

 function do_upload_multi()
 {        
    $this->load->library('upload');

    //Configure upload.
    $this->upload->initialize(array(
        "allowed_types" => "gif|jpg|png|jpeg",
        "upload_path"   => "./uploads/"
    ));

    //Perform upload.
    if($this->upload->do_upload("images")) {
        $uploaded = $this->upload->data();
        echo '<pre>';
        var_export($uploaded);
        echo '</pre>';
    }
    else{
        die('UPLOAD FAILED');
    } 
 }
}