<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function addRM($data)
	{   
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_relationshipmanager');
        $this->db->where('emailRM',$data['emailRM']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Email ID Already Exist');
            return false;
        }
        else{
        $this->db->select();
        $this->db->from('tbl_relationshipmanager');
        $this->db->where('phoneRM',$data['phoneRM']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Phone Number Already Exist');
            return false;
        }
        else{
            $status=$this->db->insert('tbl_relationshipmanager', $data);
		    if($status){
                return true;
            }
            else{
              $this->session->set_flashdata('error', ' Something Went Wrong');
              return false;
            }
        }
        }
	}
    public function removeRM($id)
	{   
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_assignrm');
        $this->db->where('idRM',$id);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        else{
        $this->db->where('idRM', $id);
        $status=$this->db->delete('tbl_relationshipmanager');
        if($status){
            return true;
        }
        else{
          return false;
        }
    }
    }
    public function changePWDS($cp,$np){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_admin');
        $query = $this->db->get();
        foreach($query->result() as $row){
            $dbUser=$row->adminEmail;
            $dbPWD=$row->adminPassword;
        }
        if(!password_verify($cp, $dbPWD)){
            $this->session->set_flashdata('error', ' Current Password Is Not Matching');
            return false;
        }
        else{
            $hashed_password = password_hash($np, PASSWORD_DEFAULT);
            $data = array(
                'adminPassword' => $hashed_password
            );
            $this->db->where('adminEmail', $dbUser);
            $this->db->update('tbl_admin', $data);
            return true;
        }
    }
    public function addidea($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_investmentideas');
        $this->db->where('i_idea_title',$data['i_idea_title']);
        $this->db->where('i_idea_owner',$data['i_idea_owner']);
        $this->db->where('i_idea_Rdate',$data['i_idea_Rdate']);
        $this->db->where('i_idea_category',$data['i_idea_category']);
        $this->db->where('i_idea_desc',$data['i_idea_desc']);
        $this->db->where('i_idea_country',$data['i_idea_country']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Duplication');
            return false;
        }else{
            $status=$this->db->insert('tbl_investmentideas', $data);
		    if($status){
                return true;
            }
            else{
              $this->session->set_flashdata('error', ' Something Went Wrong');
              return false;
            }
        }
    }
    public function editidea($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_investmentideas');
        $this->db->where('i_idea_title',$data['i_idea_title']);
        $this->db->where('i_idea_owner',$data['i_idea_owner']);
        $this->db->where('i_idea_Rdate',$data['i_idea_Rdate']);
        $this->db->where('i_idea_category',$data['i_idea_category']);
        $this->db->where('i_idea_desc',$data['i_idea_desc']);
        $this->db->where('i_idea_country',$data['i_idea_country']);
        $this->db->where('i_idea_id !=',$_SESSION['ideaID']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Duplication');
            return false;
        }else{
            $this->db->where('i_idea_id',$_SESSION['ideaID']);
            $status=$this->db->update('tbl_investmentideas', $data);
            if($status){
                return true;
            }
            else{
              $this->session->set_flashdata('error', ' Something Went Wrong');
              return false;
            }
        }
    }
    public function assignRMtoCus($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_assignRM');
        $this->db->where('client_id',$data['client_id']);
        $this->db->where('idRM',$data['idRM']);
        $this->db->where('client_id !=',$data['client_id']);
        $this->db->where('idRM !=',$data['idRM']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Duplication');
            return false;
        }else{
            $status=$this->db->insert('tbl_assignRM', $data);
            if($status){
            $status=array(
                'c_status' => '1'
            );                
            $this->db->where('client_id',$data['client_id']);
            $status=$this->db->update('tbl_clientregistration', $status);
            return true;
            }
            else{
              $this->session->set_flashdata('error', ' Something Went Wrong');
              return false;
            }
        }
    }
}