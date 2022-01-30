<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require  APPPATH . 'libraries/RestController.php';
require  APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;


class ProductController extends RestController{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel');
	}

	public function index_get(){
		//echo("I am RestFul API");
		//$this->load->get_employee();
		$product= new ProductModel();
		$result_emp= $product->get_category();
		$this->response($result_emp,200);
	}

	
	public function categoryPagenation_post(){
		$limit=$this->input->post('limit');
		$start=$this->input->post('start');
		//echo("I am RestFul API");
		//$this->load->get_employee();
		$product= new ProductModel();
		$result_emp= $product->get_category_pagenation($limit,$start);
		$this->response($result_emp,200);
	}

	public function getProduct_post(){
		$limit=$this->input->post('limit');
		$start=$this->input->post('start');
		$category=$this->input->post('category');
		//echo("I am RestFul API");
		//$this->load->get_employee();
		$product= new ProductModel();
		$result_emp= $product->get_product_pagenation($limit,$start,$category);
		$this->response($result_emp,200);
	}

	public function saveEmployee_post(){
		$employee= new EmployeeModel();
		$data=[
			"first_name"=>$this->input->post('first_name'),
			"last_name"=>$this->input->post('last_name'),
			"phone"=>$this->input->post('phone'),
			"email"=>$this->input->post('email'),

		];
		$result=$employee->insertEmployee($data);
		if($result>0){
				$this->response([
					'status'=>true,
					'message'=>'New Employee Inserted'
				],RestController::HTTP_OK);
		}else{
			$this->response([
				'status'=>false,
				'message'=>'New Employee Inserted'
			],RestController::HTTP_BAD_REQUEST);
		}
		//$this->response($data,200);

	}

	public function findEmployee_get($id){
		$employee= new EmployeeModel();
		$result=$employee->editEmployee($id);
		$this->response($result,200);
	}

	public function updateEmployee_put($id)
    {
        $employee = new EmployeeModel();
        $data = [
            'first_name' =>  $this->put('first_name'),
            'last_name' => $this->put('last_name'),
            'email' => $this->put('email'),
			'phone' => $this->put('phone'),
        ];
        $result = $employee->update_employee($data,$id);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'Employee Updated'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Failed to Update Employee'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteEmployee_delete($id)
    {
        $employee = new EmployeeModel();
        $result = $employee->delete_employee($id);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'Employee Deleted'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Failed to Delete Employee'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

	public function uploadImage_post(){
		echo("Test Pro");
	}

	
}
?>
