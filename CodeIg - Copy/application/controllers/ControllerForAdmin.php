<?php
class ControllerForAdmin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('welcome_message');
    }
    public function home(){
        $this->load->view('AdminIndex');
    }
    public function adminRMIndex(){
        $this->load->view('adminRMIndex');
    }
    public function adminCustomerIndex(){
        $this->load->view('adminCustomerIndex');
    }
    public function adminIdeaIndex(){
        $this->load->view('adminIdeaIndex');
    }
    public function adminPasswordIndex(){
        $this->load->view('adminPasswordIndex');
    }
    public function viewDetailsRM($id){
        $_SESSION['RMID']=$id;
        $this->load->view('viewRMDetails');
    }
    public function CustomerNotification(){
        $this->load->view('newCustomerNotification');
    }
    public function AssignRM($id){
        $data=array(
            'id' => $id
         );
        $this->load->view('assignRMtoNewCust',$data);
    }
    public function viewDetailsCustomer($id){
        $_SESSION['CID']=$id;
        $this->load->view('viewCustomerDetails');
    }
    public function logouted(){
        echo "<script>alert('Please Login');</script>";
        $this->load->view('welcome_message');
    }
    public function AddRM(){
        $this->load->view('addNewRM');
    }
    public function registerRM(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Name');
            $this->load->view('addNewRM');
        }
        else{
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Email ID');
            $this->load->view('addNewRM');
        }
        else{
            $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^\d{10}$/]');
            if ($this->form_validation->run() == false) {
                // If form validation fails, show the form again with error messages
                $this->session->set_flashdata('error', 'Check Phone Number');
                $this->load->view('addNewRM');
            }
            else{
                $defaultPWD=password_hash($this->input->post('phone'), PASSWORD_DEFAULT);
                $data = array(
                    'nameRM' => $this->input->post('name'),
                    'phoneRM' => $this->input->post('phone'),
                    'emailRM' => $this->input->post('email'),
                    'passwordRM' => $defaultPWD
                );
                $this->load->model('AdminModel');
                $status = $this->AdminModel->addRM($data);
                if($status){
                    echo "<script>alert('Registered Successfully with Phone Number as Password');</script>";
                    $this->load->view('adminRMIndex'); 
                }
                else{
                    $this->load->view('addNewRM'); 
                }
            }
        }
        }
    }
    public function removeRM($id){
        $this->load->model('AdminModel');
        $status = $this->AdminModel->removeRM($id);
        if($status){
            echo "<script>alert('Deleted Sucessfully');</script>";
            $this->load->view('adminRMIndex'); 
        }
        else{
            echo "<script>alert('Delete Unsucessful-Client Is Active With This RM');</script>";
            $this->load->view('adminRMIndex'); 
        }
    }
    public function changePWD(){
        $nPWD=$this->input->post('passwordNew');
        $rnPWD=$this->input->post('confirmPassword');
        $cPWD=$this->input->post('password');
        if (strlen($nPWD)<8) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'New Password length Does not Met the requirement');
            $this->load->view('adminPasswordIndex');
        }
        else{
            if($nPWD!=$rnPWD){
            $this->session->set_flashdata('error', 'Password is not matching');
            $this->load->view('adminPasswordIndex');
            }
            else{
                $this->load->model('AdminModel');
                $status = $this->AdminModel->changePWDS($cPWD,$nPWD);
                if($status){
                 echo "<script>alert('Password Changed');</script>";
                 $this->load->view('AdminIndex'); 
                }
                else{
                    $this->load->view('adminPasswordIndex'); 
                }
            }
        }
    }
    public function AddIdea(){
        $this->load->view('addNewIdea');
    }
    public function EditIdea(){
        $this->load->view('editidea');
    }
    public function NewIdea(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Title');
            $this->load->view('addNewIdea');
        }
        else{
            $this->form_validation->set_rules('date', 'date', 'required');
            if ($this->form_validation->run() == false) {
                // If form validation fails, show the form again with error messages
                $this->session->set_flashdata('error', 'Check Date');
                $this->load->view('addNewIdea');
            }
            else{
                $formdate=$this->input->post('date');
                $currentdate=date('Y-m-d');
                if($formdate<$currentdate){
                    $this->session->set_flashdata('error', 'Past Dates Cannot Be Accepted');
                    $this->load->view('addNewIdea');
                }
                else{
                    $this->form_validation->set_rules('Owner', 'Owner', 'required');
                    if ($this->form_validation->run() == false) {
                        // If form validation fails, show the form again with error messages
                        $this->session->set_flashdata('error', 'Check Owner Name');
                        $this->load->view('addNewIdea');
                    }
                    else{
                        $this->form_validation->set_rules('desc', 'desc', 'required');
                        $this->form_validation->set_rules('Category', 'Category', 'required');
                        if ($this->form_validation->run() == false) {
                            // If form validation fails, show the form again with error messages
                            $this->session->set_flashdata('error', 'Check Category or Description');
                            $this->load->view('addNewIdea');
                        }
                        else{
                            $this->form_validation->set_rules('country', 'country', 'required|alpha');
                            if ($this->form_validation->run() == false) {
                                // If form validation fails, show the form again with error messages
                                $this->session->set_flashdata('error', 'Check Country Name');
                                $this->load->view('addNewIdea');
                            }
                            else{
                                $data = array(
                                    'i_idea_title' => $this->input->post('title'),
                                    'i_idea_owner' => $this->input->post('Owner'),
                                    'i_idea_Rdate' => $this->input->post('date'),
                                    'i_idea_category' => $this->input->post('Category'),
                                    'i_idea_desc' => $this->input->post('desc'),
                                    'i_idea_country' => $this->input->post('country')
                                );
                                $this->load->model('AdminModel');
                                $status = $this->AdminModel->addidea($data);
                                if($status){
                                    echo "<script>alert('Idea Added Successfully');</script>";
                                    $this->load->view('adminIdeaIndex'); 
                                }
                                else{
                                   $this->load->view('addNewIdea'); 
                                 }
                            }
                        }
                    }
                }
            }

        }
    }
    public function viewDetailsIdea($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('viewIdeaDetails');
    }
    public function editIdeaSumit(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Title');
            $this->load->view('editidea');
        }
        else{
            $this->form_validation->set_rules('date', 'date', 'required');
            if ($this->form_validation->run() == false) {
                // If form validation fails, show the form again with error messages
                $this->session->set_flashdata('error', 'Check Date');
                $this->load->view('editidea');
            }
            else{
                $formdate=$this->input->post('date');
                $currentdate=date('Y-m-d');
                if($formdate<$currentdate){
                    $this->session->set_flashdata('error', 'Past Dates Cannot Be Accepted');
                    $this->load->view('editidea');
                }
                else{
                    $this->form_validation->set_rules('Owner', 'Owner', 'required');
                    if ($this->form_validation->run() == false) {
                        // If form validation fails, show the form again with error messages
                        $this->session->set_flashdata('error', 'Check Owner Name');
                        $this->load->view('editidea');
                    }
                    else{
                        $this->form_validation->set_rules('desc', 'desc', 'required');
                        $this->form_validation->set_rules('Category', 'Category', 'required');
                        if ($this->form_validation->run() == false) {
                            // If form validation fails, show the form again with error messages
                            $this->session->set_flashdata('error', 'Check Category or Description');
                            $this->load->view('editidea');
                        }
                        else{
                            $this->form_validation->set_rules('country', 'country', 'required|alpha');
                            if ($this->form_validation->run() == false) {
                                // If form validation fails, show the form again with error messages
                                $this->session->set_flashdata('error', 'Check Country Name');
                                $this->load->view('editidea');
                            }
                            else{
                                $data = array(
                                    'i_idea_title' => $this->input->post('title'),
                                    'i_idea_owner' => $this->input->post('Owner'),
                                    'i_idea_Rdate' => $this->input->post('date'),
                                    'i_idea_category' => $this->input->post('Category'),
                                    'i_idea_desc' => $this->input->post('desc'),
                                    'i_idea_country' => $this->input->post('country')
                                );
                                $this->load->model('AdminModel');
                                $status = $this->AdminModel->editidea($data);
                                if($status){
                                    echo "<script>alert('Idea Edited Successfully');</script>";
                                    $this->load->view('adminIdeaIndex'); 
                                }
                                else{
                                   $this->load->view('editidea'); 
                                 }
                            }
                        }
                    }
                }
            }

        }

    }
    public function confirmRM(){
        $data= array(
            'client_id' => $this->input->post('id'),
            'idRM' => $this->input->post('rm')
        );
        $this->load->model('AdminModel');
        $status = $this->AdminModel->assignRMtoCus($data);
        if($status){
            echo "<script>alert('Assigned');</script>";
            $this->load->view('newCustomerNotification'); 
        }
        else{
           $this->load->view('assignRMtoNewCust'); 
         }
    }
}
?>