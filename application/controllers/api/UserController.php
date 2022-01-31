<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require  APPPATH . 'libraries/RestController.php';
require  APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;


class UserController extends RestController{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}


	public function registerUser_post(){
		$user= new UserModel();
		$data=[
			"mstsmtac"=>$this->input->post('password'),
			"user_id"=>$this->input->post('user_id'),
			"mstsmtan"=>$this->input->post('name'),
			"mstsmtacpn"=>"NA",
			"mstsmtamn1"=>$this->input->post('contact_no'),
			"mstsmtamn2"=>0,
			"mstsmtaa"=>"NA",
			"mstsmtacou"=>101,
			"mstsmtasta"=>41,
			"mstsmtacit"=>5583,
			"mstsmtapin"=>7000748,
			"mstsmtagn"=>"NA",
			"mstsmtare"=>"",
			"mstsmtastatus"=>1,
			"mstsmta_type"=>"CUSTOMER",
			"mstsmtacrd"=>"",
			"mstsmtaip"=>""
		];
		
		$data1=[
			"user_id"=>$this->input->post('user_id'),
			"mstsmtac"=>$this->input->post('password'),
		];
		$result1=$user->checkUser($data1);
		if($result1>0){
				$this->response([
					'status'=>true,
					
					'message'=>'User already have account'
				],RestController::HTTP_OK);
		}else{
			$result2=$user->saveUser($data);
			if($result2>0){
				$this->response([
					'status'=>true,
					//'user_data'=>$this->input->post('user_id'),
					'message'=>'User is register successfully'
				],RestController::HTTP_OK);
			}else{
				$this->response([
					'status'=>false,
					'message'=>'There is some issue'
				],RestController::HTTP_OK);
			}
		

		}
		//$this->response($data,200);

	}


	public function loginUser_post(){
		$user= new UserModel();
		$data=[
			"user_id"=>$this->input->post('user_id'),
			"mstsmtac"=>$this->input->post('password'),

		];
		$result=$user->checkUser($data);
		if($result>0){
				$this->response([
					'status'=>true,
					'user_data'=>$result,
					'message'=>'User Login Successfully'
				],RestController::HTTP_OK);
		}else{
			$this->response([
				'status'=>false,
				'message'=>'User is not there'
			],RestController::HTTP_BAD_REQUEST);
		}
		//$this->response($data,200);

	}




}

?>
