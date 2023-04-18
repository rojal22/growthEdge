<?php 
class HomePageController extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function LoginIndex(){
     $this->load->view('loginIndex');
    }
    public function SignUp(){
        $this->load->view('createAccount');
    }
}
?>