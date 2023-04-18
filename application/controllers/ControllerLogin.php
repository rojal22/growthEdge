<?php
class ControllerLogin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function userCheck(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname', 'uname', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check E-mail ID');
            $this->load->view('LoginIndex');
        } else {
        $this->form_validation->set_rules('pass', 'pass', 'required|min_length[8]');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Password Lenght');
            $this->load->view('LoginIndex');
        }
        else{
        $this->form_validation->set_rules('user_type', 'user_type', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Select User Type');
            $this->load->view('LoginIndex');
        }
        else{
            $userType=$this->input->post('user_type');
            $email=$this->input->post('uname');
            $passwd=$this->input->post('pass');
            if($userType=='Customer'){
                $this->load->model('LoginModel');
                $data = $this->LoginModel->Customer($email,$passwd);
                if($data){
                    $_SESSION['CustomerStatus']="ACTIVE";
                   $this->load->view('CustomerIndex'); 
                }
                else{
                    $this->load->view('LoginIndex'); 
                }
            }
            if($userType=='RM'){
                $this->load->model('LoginModel');
                $data = $this->LoginModel->RM($email,$passwd);
                if($data){
                    $_SESSION['RMStatus']="ACTIVE";
                    $this->load->view('RMIndex'); 
                }
                else{
                    $this->load->view('LoginIndex'); 
                }
            }
            if($userType=='admin'){
                $this->load->model('LoginModel');
               $data = $this->LoginModel->admin($email,$passwd);
                if($data){
                    $_SESSION['adminStatus']="ACTIVE";
                    $this->load->view('AdminIndex'); 
                }
                else{
                    $this->load->view('LoginIndex'); 
                }
            }
        }
        }
        }
    }
    public function SignUp(){
        $this->load->view('createAccount');
    }
}
?>