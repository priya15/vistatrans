<?php

Class Admin_Database extends CI_Model {
   
   public function checkusernamedata($email,$password){
  $data =   $this->db->select("*")->from("user")->where("username",$email)->where("password",$password)->get()->result_array();
   if(!empty($data)){
    return $data;
   }
   else
   {
     return 0;
   }
   }

   public function customertransdata(){
        $data =   $this->db->select("*")->from("trans_detail")->get()->result_array();
   if(!empty($data)){
    return $data;
   }
   else
   {
     return 0;
   }

   } 

 public function customername($id){
           $data =   $this->db->select("*")->from("user")->where("id",$id)->get()->result_array();
   if(!empty($data)){
    return $data;
   }
   else
   {
     return 0;
   }

   } 

 

   public function customerdata(){
    $data =   $this->db->select("*")->from("user")->where("role","1")->get()->result_array();
   if(!empty($data)){
    return $data;
   }
   else
   {
     return 0;
   }
   }

   public function customertransmonthdata($id){
    $data =   $this->db->query("SELECT * FROM `trans_detail` where month(date)='$id'
")->result_array();
   if(!empty($data)){
    return $data;
   }
   else
   {
     return 0;
   }


   }
  

   
}