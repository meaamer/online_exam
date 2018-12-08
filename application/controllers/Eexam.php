<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Eexam extends CI_Controller
{
	
	// this fucntion is use for display single question on view 
	public function StartTest($set_id=null,$offset=null) 
	{
		

		if($offset==null){
			show_404();
		}
		if($set_id==null){
			show_404();
		}
		$this->load->model('EexamModel');
		
		$data['set_id'] = $set_id;
		$data['next_num'] = $offset+1;
		$data['pre_num'] = $offset-1;
		//$offsetx--;
		$data['que_num'] =$offset;
		$data['TotalQuestions'] = $this->EexamModel->TotalQuestions($set_id);

		if($data['TotalQuestions']<$offset){
			show_404();
		}
		$data['list'] = $this->EexamModel->SelectTestQuestion($set_id,$offset);
		$data['duration'] = $this->EexamModel->TestDuration($set_id)[0];
		
		$this->load->view('includes/header');
		$this->load->view('E-ExamView',$data);
		$this->load->view('includes/footer');
	} 

	
	public function SubmitQuestion(){
		$this->load->model('EexamModel');
		$this->EexamModel->SubmitQuestion();	
	}

	public function FinalResult($set_id,$student_id)
	{
		$this->load->model('EexamModel');
		$data['result'] = $this->EexamModel->FinalResult($set_id,$student_id);
		$this->load->view('includes/header');
		$this->load->view('ResultView',$data);
		$this->load->view('includes/footer');
	}

	function SetLanguage(){
		$this->session->set_userdata("langs",$this->input->get_post("lang"));
		echo $this->session->userdata("langs");
	}
}

	
		













 ?>