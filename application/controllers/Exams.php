<?php 

/**
* 
*/
class Exams extends CI_Controller
{
	

	public function StartExam()
	{

		$this->load->model('ExamModel');
		$data['list'] = $this->ExamModel->CourseList()[0];
		
		$data['set_list'] = $this->ExamModel->SetList($data);
		
		
		$this->load->view('includes/header');
		$this->load->view('StartExamView',$data);
		$this->load->view('includes/footer');
		
	}
	public function NewExam($id)
	{
		$this->load->model('ExamModel');
		$data['set_list'] = $this->ExamModel->StartNewExam($id)[0];
		$data['total_ques'] = $this->ExamModel->SelectTotalQues($id);
		$this->load->view('includes/header');
		$this->load->view('NewExamView',$data);
		$this->load->view('includes/footer');
	}


		
		
		
		



}
		
		
	








 ?>