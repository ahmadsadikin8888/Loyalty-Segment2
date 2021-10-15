<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_controller extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

 
    function send() {
        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
        
        $message="
        ini email Syanida
        <img src='https://sy-anida.com/YbsService/get_imagena/1.png'>
        ";
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to('ahmadsadikin8888@gmail.com');
        $this->email->subject('Email Notifikasi');
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}