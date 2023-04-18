<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustModel extends CI_Model {
    public function register($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_clientregistration');
        $this->db->where('c_email',$data['c_email']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Email ID Already Exist');
            return false;
        }
        else{
            if($data['c_contactNumber']==$data['c_alternativeContactNo']){
                $this->session->set_flashdata('error', 'Phone Number & Althernative Phone Number Cannot be same');
                return false;
            }
            else{
                $this->load->database();
                $this->db->select();
                $this->db->from('tbl_clientregistration');
                $this->db->where('c_contactNumber',$data['c_contactNumber']);
                $query = $this->db->get();
                if($query->result()!=null){
                    $this->session->set_flashdata('error', 'Phone Number Already Exist');
                    return false;
                }
                else{
                    $status=$this->db->insert('tbl_clientregistration', $data);
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
    }
    public function editProfile($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_clientregistration');
        $this->db->where('c_email',$data['c_email']);
        $this->db->where('client_id!=',$_SESSION['CusID']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Email ID Already Exist');
            return false;
        }
        else{
            if($data['c_contactNumber']==$data['c_alternativeContactNo']){
                $this->session->set_flashdata('error', 'Phone Number & Althernative Phone Number Cannot be same');
                return false;
            }
            else{
                $this->load->database();
                $this->db->select();
                $this->db->from('tbl_clientregistration');
                $this->db->where('c_contactNumber',$data['c_contactNumber']);
                $this->db->where('client_id!=',$_SESSION['CusID']);
                $query = $this->db->get();
                if($query->result()!=null){
                    $this->session->set_flashdata('error', 'Phone Number Already Exist');
                    return false;
                }
                else{
                    $this->db->where('client_id',$_SESSION['CusID']);
                    $status=$this->db->update('tbl_clientregistration', $data);
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
    }
    public function likeIdea($id){
        $data=array(
            'client_id' => $_SESSION['CusID'],
            'i_idea_id' => $id
        );
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_likedidea');
        $this->db->where('i_idea_id',$id);
        $this->db->where('client_id',$_SESSION['CusID']);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        else{
            $status=$this->db->insert('tbl_likedidea', $data);
            if($status){
                return true;
            }
            else{
            return false;
            }
        }
    }
    public function likePreference($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_interestedarea');
        $this->db->where('client_id',$data['client_id']);
        $this->db->where('i_idea_category',$data['i_idea_category']);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        else{
            $status=$this->db->insert('tbl_interestedarea', $data);
            if($status){
                return true;
            }
            else{
            return false;
            }
        }
    }
    public function removeInvest($id){
        $this->load->database();
        $this->db->where('i_idea_id', $id);
        $this->db->where('client_id', $_SESSION['CusID']);
        $status=$this->db->delete('tbl_likedidea');
        if($status){
            return true;
        }
        else{
        return false;
        }
    }
    public function removePreference($id,$uID){
        $this->load->database();
        $this->db->where('client_id', $uID);
        $this->db->where('i_idea_category', $id);
        $status=$this->db->delete('tbl_interestedarea');
        if($status){
            return true;
        }
        else{
        return false;
        }
    }
    public function changePWDS($cp,$np){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_clientregistration');
        $this->db->where('client_id', $_SESSION['CusID']);
        $query = $this->db->get();
        foreach($query->result() as $row){
            $dbPWD=$row->c_password;
        }
        if(!password_verify($cp, $dbPWD)){
            $this->session->set_flashdata('error', ' Current Password Is Not Matching');
            return false;
        }
        else{
            $hashed_password = password_hash($np, PASSWORD_DEFAULT);
            $data = array(
                'c_password' => $hashed_password
            );
            $this->db->where('client_id', $_SESSION['CusID']);
            $this->db->update('tbl_clientregistration', $data);
            return true;
        }
    }
}
?>