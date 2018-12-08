<?php 

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view('LoginView');
	}

	 public function StudentLogin()
        {
            header('Access-Control-Allow-Origin:*');
            $this->load->library("form_validation");
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run())
            {

                $this->load->model('UserModel');
                if($data=$this->UserModel->loginuser($this->input->post('mobile_no'),$this->input->post('password')))
                {
                      
                     echo"<script>
                        window.location='Exams/StartExam'
                    </script>";  
                }
                else
                {
                    die("<br><center> Please Check Your ID and password</center>");            
                }
            }
            else 
            {
                echo validation_errors();
            }
        }


      
        public function Logout() 
        {
            $this->session->unset_userdata("student_id");
            $this->session->unset_userdata("student_name");
            $this->session->unset_userdata("student_mobile");
            $this->session->unset_userdata("student_password");
            $this->session->unset_userdata("student_course");
             $this->session->unset_userdata("langs");
             redirect(base_url('Login'));  
        }




}








 ?>