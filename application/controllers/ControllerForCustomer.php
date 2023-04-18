<?php
class ControllerForCustomer extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function logouted(){
        echo "<script>alert('Please Login');</script>";
        $this->load->view('welcome_message');
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('welcome_message');
    }
    public function home(){
        $this->load->view('CustomerIndex');
    }
    public function viewProfile(){
        $this->load->view('viewCustomerProfile');
    }
    public function invIdea(){
        $this->load->view('investmentIdea');
    }
    public function rmSuggestion(){
        $this->load->view('rmSuggestion');
    }
    public function invest($id){
        $data=array(
            'id' => $id
         );
        $this->load->view('viewIdeaInDetail',$data);
    }
    public function custChangePWD(){
        $this->load->view('custChangePWD');
    }
    public function NewCust(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Name');
            $this->load->view('createAccount');
        }
        else{
            $this->form_validation->set_rules('number', 'number', 'required|regex_match[/^\d{10}$/]');
            if ($this->form_validation->run() == false) {
                // If form validation fails, show the form again with error messages
                $this->session->set_flashdata('error', 'Check Phone Number');
                $this->load->view('createAccount');
            }else{
                $this->form_validation->set_rules('altNumber', 'altNumber', 'required|regex_match[/^\d{10}$/]');
                if ($this->form_validation->run() == false) {
                    // If form validation fails, show the form again with error messages
                    $this->session->set_flashdata('error', 'Check Althernative Phone Number');
                    $this->load->view('createAccount');
                }else{
                    $this->form_validation->set_rules('address', 'address', 'required');
                    if ($this->form_validation->run() == false) {
                        // If form validation fails, show the form again with error messages
                        $this->session->set_flashdata('error', 'Check Address');
                        $this->load->view('createAccount');
                    }else{
                        $this->form_validation->set_rules('post', 'post', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]');
                        if ($this->form_validation->run() == false) {
                            // If form validation fails, show the form again with error messages
                            $this->session->set_flashdata('error', 'Check Post Code');
                            $this->load->view('createAccount');
                        }else{
                            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                            if ($this->form_validation->run() == false) {
                                // If form validation fails, show the form again with error messages
                                $this->session->set_flashdata('error', 'Check Email ID');
                                $this->load->view('createAccount');
                            }
                            else{
                                $nPWD=$this->input->post('psw');
                                $rnPWD=$this->input->post('conpsw');
                                if (strlen($nPWD)<8) {
                                    // If form validation fails, show the form again with error messages
                                    $this->session->set_flashdata('error', 'New Password length Does not Met the requirement-Minimum 8 Charater is Required');
                                    $this->load->view('createAccount');
                                }
                                else{
                                    if($nPWD!=$rnPWD){
                                    $this->session->set_flashdata('error', 'Password is not matching');
                                    $this->load->view('createAccount');
                                    }
                                    else{
                                        $defaultPWD=password_hash($this->input->post('psw'), PASSWORD_DEFAULT);
                                        $data = array(
                                            'c_name' => $this->input->post('name'),
                                            'c_contactNumber' => $this->input->post('number'),
                                            'c_alternativeContactNo' => $this->input->post('altNumber'),
                                            'c_address' => $this->input->post('address'),
                                            'c_postcode' => $this->input->post('post'),
                                            'c_email' => $this->input->post('email'),
                                            'c_password' => $defaultPWD,
                                            'c_status' => '0'
                                        );
                                        $this->load->model('CustModel');
                                        $status = $this->CustModel->register($data);
                                        if($status){
                                            echo "<script>alert('Registered Successfully');</script>";
                                            $this->load->view('welcome_message'); 
                                        }
                                        else{
                                            $this->load->view('createAccount'); 
                                        }
                                    }
                                }
                            }
                        }
                        
                    }
                }
            }
        }
    }
    public function editProfile(){
        $this->load->view('EditProfileCustomer');
    }
    public function submitEditProfile(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Name');
            $this->load->view('EditProfileCustomer');
        }
        else{
            $this->form_validation->set_rules('Phone', 'Phone', 'required|regex_match[/^\d{10}$/]');
            if ($this->form_validation->run() == false) {
                // If form validation fails, show the form again with error messages
                $this->session->set_flashdata('error', 'Check Phone Number');
                $this->load->view('EditProfileCustomer');
            }else{
                $this->form_validation->set_rules('altph', 'altph', 'required|regex_match[/^\d{10}$/]');
                if ($this->form_validation->run() == false) {
                    // If form validation fails, show the form again with error messages
                    $this->session->set_flashdata('error', 'Check Althernative Phone Number');
                    $this->load->view('EditProfileCustomer');
                }else{
                    $this->form_validation->set_rules('address', 'address', 'required');
                    if ($this->form_validation->run() == false) {
                        // If form validation fails, show the form again with error messages
                        $this->session->set_flashdata('error', 'Check Address');
                        $this->load->view('EditProfileCustomer');
                    }else{
                        $this->form_validation->set_rules('postcode', 'postcode', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]');
                        if ($this->form_validation->run() == false) {
                            // If form validation fails, show the form again with error messages
                            $this->session->set_flashdata('error', 'Check Post Code');
                            $this->load->view('EditProfileCustomer');
                        }else{
                            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                            if ($this->form_validation->run() == false) {
                                // If form validation fails, show the form again with error messages
                                $this->session->set_flashdata('error', 'Check Email ID');
                                $this->load->view('EditProfileCustomer');
                            }
                            else{
                                $data = array(
                                    'c_name' => $this->input->post('name'),
                                    'c_contactNumber' => $this->input->post('Phone'),
                                    'c_alternativeContactNo' => $this->input->post('altph'),
                                    'c_address' => $this->input->post('address'),
                                    'c_postcode' => $this->input->post('postcode'),
                                    'c_email' => $this->input->post('email')
                                );
                                $this->load->model('CustModel');
                                $status = $this->CustModel->editProfile($data);
                                if($status){
                                    echo "<script>alert('Changes Saved Successfully');</script>";
                                    $this->load->view('viewCustomerProfile'); 
                                }
                                else{
                                    $this->load->view('EditProfileCustomer'); 
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    public function likeIdea($id){
        $this->load->model('CustModel');
        $status = $this->CustModel->likeIdea($id);
        if($status){
            echo "<script>alert('Idea Liked');</script>";
            $this->load->view('investmentIdea'); 
        }
        else{
            echo "<script>alert('Already Liked Idea');</script>";
            $this->load->view('likedIdea'); 
        }
    }
    public function likedIdea(){
        $this->load->view('likedIdea'); 
    }
    public function preference(){
        $this->load->view('CategoryListing'); 
    }
    public function addPreference(){
        $this->load->view('addPreference'); 
    }
    public function preferenceADDtoDB($cat){
        $data= array(
            'client_id' => $_SESSION['CusID'],
            'i_idea_category' => $cat
        );
        $this->load->model('CustModel');
        $status = $this->CustModel->likePreference($data);
        if($status){
            echo "<script>alert('Preference Added');</script>";
            $this->load->view('addPreference'); 
        }
        else{
            echo "<script>alert('Already Liked Preference');</script>";
            $this->load->view('addPreference'); 
        }
    }
    public function removeInvest($id){
        $this->load->model('CustModel');
        $status = $this->CustModel->removeInvest($id);
        if($status){
            echo "<script>alert('Idea Removed');</script>";
            $this->load->view('likedIdea'); 
        }
        else{
            echo "<script>alert('Already Removed Idea');</script>";
            $this->load->view('likedIdea'); 
        }
    }
    public function removePreference($id){
        $this->load->model('CustModel');
        $status = $this->CustModel->removePreference($id,$_SESSION['CusID']);
        if($status){
            echo "<script>alert('Preference Removed');</script>";
            $this->load->view('CategoryListing'); 
        }
        else{
            echo "<script>alert('Already Removed Preference');</script>";
            $this->load->view('CategoryListing'); 
        }

    }
    public function changePWD(){
        $nPWD=$this->input->post('passwordNew');
        $rnPWD=$this->input->post('confirmPassword');
        $cPWD=$this->input->post('password');
        if (strlen($nPWD)<8) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'New Password length Does not Met the requirement');
            $this->load->view('custChangePWD');
        }
        else{
            if($nPWD!=$rnPWD){
            $this->session->set_flashdata('error', 'Password is not matching');
            $this->load->view('custChangePWD');
            }
            else{
                $this->load->model('CustModel');
                $status = $this->CustModel->changePWDS($cPWD,$nPWD);
                if($status){
                 echo "<script>alert('Password Changed');</script>";
                 $this->load->view('CustomerIndex'); 
                }
                else{
                    $this->load->view('custChangePWD'); 
                }
            }
        }
    }
}
?>