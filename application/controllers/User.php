<?php 
	class User extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('user_model');
			$this->load->helper('url');
		}

		public function index(){
			$users = $this->user_model->getUsers();
			$this->load->view('register',array('users'=>$users));
		}

		public function register(){
			if($this->input->post('submit')){
				$data['name'] = $this->input->post('name');
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->input->post('password');
				$categories = $this->input->post('categories');

				$user_id = $this->user_model->registerUser($data);
				foreach ($categories as $key => $category) {
					$this->user_model->addUserCategory($user_id,$category);
				}
		
			}
			redirect('user');
		}

		public function edit($id){
			$user = $this->user_model->getUser($id);
			$categories = $this->user_model->getUserCategories($id);
			$category_list = array_map(function($category){
				return $category['category'];
			},$categories);
			$this->load->view('edit',array('user'=>$user,'category_list'=>$category_list));
		}

		public function update($id){
			if($this->input->post('submit')){
				$data['name'] = $this->input->post('name');
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->input->post('password');
				$categories = $this->input->post('categories');

				$this->user_model->updateUser($id,$data);
				$this->user_model->deleteAllUserCategories($id);
				foreach ($categories as $key => $category) {
					$this->user_model->updateUserCategory($id,$category);
				}
		
			}
			redirect('user');
		}
	}


?>
