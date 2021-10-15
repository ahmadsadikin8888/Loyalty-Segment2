<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_General
 *
 * @author Dhiya
 */
class Frontend extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('front-end/landing-page/agency/index');
  }
  public function register()
  {
    $this->load->model('sys/Sys_user_model','tmodel');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $val['name'] = $this->test_input($_POST["name"]);
      $val['email'] = $this->test_input($_POST["email"]);
      $val['nmuser'] = $this->test_input($_POST["email"]);
      $val['phone'] = $this->test_input($_POST["phone"]);
      $val['address'] = $this->test_input($_POST["message"]);
      $val['picture'] = 'default.png';
      $val['opt_level'] = 3;
      $val['opt_status'] = 1;
      $pass=rand(0,100000);
      $val['passuser']= _generate($pass); 
      $success = $this->tmodel->insert($val);
      if($success){
        echo "<strong>Your profile has been sent. <br>";
        echo "Account : <br>Username :  ".$val['email']."<br>";
        echo "Password : ".$pass."<br>";
        echo "Please Login With Your Account, and Upload your CV. </strong>";
      }else{
        echo "<strong>Your Email Already Registered!. </strong>";
      }
    }
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
