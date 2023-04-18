<?php
// Login_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function admin($username, $password)
	{   
        
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_admin');
        $query = $this->db->get();
        foreach($query->result() as $row){
            $dbPWD=$row->adminPassword;
            $dbUser=$row->adminEmail;
        }
		if($dbUser==$username){
            if(password_verify($password,$dbPWD)){
                return true;
            }
            else{
                $this->session->set_flashdata('error', 'Check Password');
                return false;
            }
        }
        else{
            $this->session->set_flashdata('error', 'Check Email');
            return false;
        }
	}
    public function customer($username, $password)
	{   
        $dbPWD=null;
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_clientregistration');
        $query = $this->db->get();
        foreach($query->result() as $row){
            if($username==$row->c_email){
            $dbPWD=$row->c_password;
            $dbUser=$row->c_email;
            $_SESSION['uname']=$row->c_name;
            $_SESSION['CusID']=$row->client_id;
            }
        }
		if($dbUser==$username){
            if(password_verify($password,$dbPWD)){
                return true;
            }
            else{
                $this->session->set_flashdata('error', 'Check Password');
                return false;
            }
        }
        else{
            $this->session->set_flashdata('error', 'Check Email');
            return false;
        }
	}
    public function RM($username, $password)
	{   
        
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_relationshipmanager');
        $query = $this->db->get();
        foreach($query->result() as $row){
            if($username==$row->emailRM){
            $dbPWD=$row->passwordRM;
            $dbUser=$row->emailRM;
            $dbNum=$row->phoneRM;
            $_SESSION['rmName']=$row->nameRM;
            $_SESSION['rmID']=$row->idRM;
            }
        }
		if($dbUser==$username){
            if(password_verify($password,$dbPWD)){
                return true;
            }
            else{
                $this->session->set_flashdata('error', 'Check Password');
                return false;
            }
        }
        else{
            $this->session->set_flashdata('error', 'Check Email');
            return false;
        }
	}
}