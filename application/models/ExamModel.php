<?php 

class ExamModel extends CI_Model
{
	

	public function CourseList()
	 {
	 	$this->db->select('*');
 		$this->db->from('course');
 		$course =  $this->session->userdata('student_course');
 		$this->db->where('course_name',$course);
 		$query = $this->db->get();
 		return $query->result_array();
	 }

	 public function SetList($data)
	 {
	 	
	 	$list=$data['list'];
		$id = $list['course_id'];

	 	$this->db->select('*');
 		$this->db->from('sets');
 		$this->db->where('course_id',$id);
 		$query = $this->db->get();
 		return $query->result_array();
 		
	 }

	 public function StartNewExam($id)
	 {
	 	$this->db->select('*');
 		$this->db->from('sets');
 		$this->db->where('set_id',$id);
 		$query = $this->db->get();
 		return $query->result_array();
	 }

	  public function SelectTotalQues($id)
	 {
	 	$this->db->select('*');
 		$this->db->from('questions');
 		$this->db->where('set_id',$id);
 		$query = $this->db->get();
 		 return $query->num_rows();
	 }


	 

	
}

 ?>