<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

		public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('admin_database');
$this->load->helper("url");
}


public function login(){
	$this->load->view("header");
	$this->load->view("login");
}


	public function logindata(){
		$email    = $this->input->post("email");
		$password = md5($this->input->post("password"));

		$userdata = $this->admin_database->checkusernamedata($email,$password);
		if ($userdata == 0) {
		  
		   $this->session->set_flashdata("error","data not added");
		   redirect("login");
		}
		else
		{
			$userid = $userdata[0]["id"];
			$role   = $userdata[0]["role"];
			$this->session->set_userdata("userid",$userid);
			$this->session->set_userdata("role",$role);

			$this->session->set_flashdata("suuccess","data added");
			if($role == 0){
              	redirect("adash");
			}
			else
			{
			   redirect("dash");
			}
		

		}

}
		public function adash(){
			$this->load->view("header");
			$this->load->view("adash");
		}

		public function customeradddata(){
         
         $name     = $this->input->post("name");
         $fname    = $this->input->post("fname");
         $email    = $this->input->post("email");
         $conatct  = $this->input->post("contact");
         $status   = $this->input->post("m_status");
         $image    = $this->input->post("image");

          
           $this->form_validation->set_rules('name', 'Name Cannobe empty', 'required');
                   

            $this->form_validation->set_rules('contact', 'PhoneNo', 'required|min_length[10]|numeric|max_length[10]');
             if ($this->form_validation->run() == FALSE){
                   $this->load->view("header.php");
                   $this->load->view("adash");

             }
             else
             {
                   $configUpload['upload_path']    = './uploads/';                 #the folder placed in the root of project
    $configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
    $configUpload['max_size']       = '0';                          #max size
    $configUpload['max_width']      = '0';                          #max width
    $configUpload['max_height']     = '0';                          #max height
    $configUpload['encrypt_name']   = false;                         #encrypt name of the uploaded file
    $this->load->library('upload', $configUpload);                  #init the upload class
    if(!$this->upload->do_upload('image')){
        $uploadedDetails    = $this->upload->display_errors();
    }else{
        $uploadedDetails    = $this->upload->data();    
    }
    if($this->upload->do_upload('image')){

     $imgname = $uploadedDetails["file_name"];
     $accountno  = substr(md5(time()), 0, 16);

     $data = array("accountno"=>$accountno,"name"=>$name,"fname"=>$fname,"married_status"=>$status,"contact"=>$conatct,"image"=>$imgname,"role"=>"1","username"=>"","password"=>"",);

     $indata = $this->db->insert("user",$data);
     if($indata>0){
     	redirect("adash");
     }

     }
     else
     {
     	  $uploadedDetails    = $this->upload->display_errors();
     	  $this->load->view("header");
     	  $this->load->view("adash");

     }


	}}


	public function addtanscation($id){
      $id = base64_decode($id);
      $this->load->view("header");
      $data["id"]=$id;
      $this->load->view("addtranscation",$data);
	}


   public function addtransdata(){
   	$amount =$this->input->post("amount");
   	$date   = $this->input->post("date");
   	$type   = $this->input->post("customer_type");
   	$id     = $this->input->post("id");
   	$this->form_validation->set_rules('amount', 'amount', 'required|numeric');
        if ($this->form_validation->run() == FALSE){
             $this->load->view("header");
              $data["id"]=$id;
              $this->load->view("addtranscation",$data); 
        }
        else
        {
          $data = array("cust_id"=>$id,"type"=>$type,"date"=>$date,"amount"=>$amount);
          $insdata = $this->db->insert("trans_detail",$data);
          if($insdata>0){
          	redirect("trandetail");
          }
        }

   }

   public function transmonth(){
   	$id = $this->input->post("id");
   	$str="";
     $data = $this->admin_database->customertransmonthdata($id);
   			if(!empty($data)){
            for ($i=0; $i < count($data); $i++) { 
            	$id = $data[$i]["cust_id"];
            	$custname = $this->admin_database->customername($id);
              $str.="<tr><td>".$data[$i]["type"]."</td><td>".$custname[0]["name"]."</td><td>".$data[$i]["date"]."</td><td>".$data[$i]["amount"]."</td></tr>";
            }
   			}
   			else{
   				$str.="<tr><td colspan='4'>No Data Found</td></tr>";
   			}

echo $str; 
   }

   public function trandetail(){
   	    $this->load->view("header");
   	    $this->load->view("transdetail");
   }

	public function logout(){
		$this->session->unset_userdata("userid");
		$this->session->sess_destroy();
		redirect("login");
	}
	
}