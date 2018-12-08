<?php 

/**
* 
*/
class EexamModel extends CI_Model
{
	
	public function SelectTestQuestion($set_id,$offset)
	{
		
		$offset--;
		$this->db->select('*');
		$this->db->from('questions');
		$this->db->where('language',$this->session->userdata('langs'));
		$this->db->where('set_id',$set_id);
		$this->db->limit('1',$offset);
		$query = $this->db->get();
		$data =  $query->result_array()[0];
		$data['std_answer'] = $this->getAnswer($data['question_id'],$set_id);
		return $data;
	}

	public function getAnswer($que_id,$set_id){
		$this->db->select('*');
		$this->db->from('ans_machin');
		$this->db->where('set_id',$set_id);
		$this->db->where("question_id",$que_id);
		$this->db->where("std_id",$this->session->userdata("student_id"));
		$q = $this->db->get();
		if($q->num_rows()>0){
			return $q->result_array()[0]['std_answer'];
		}else{
			return "null";
		}
	}
	public function TotalQuestions($set_id)
	{
		
		$this->db->select('*');
		$this->db->from('questions');
		$this->db->where('set_id',$set_id);
		$this->db->where('language',$this->session->userdata('langs'));
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function TestDuration($set_id)
	{
		$this->db->select('*');
		$this->db->from('sets');
		$this->db->where('set_id',$set_id);
		$query = $this->db->get();
		return $query->result_array();
	}
		
		


	public function SelectCurrentSet($set_id)
	{
		$this->db->select('*');
		$this->db->from('sets');
		$this->db->where('set_id',$set_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function SubmitQuestion(){
		$set_id = $this->input->get_post("set_id");
		$q_num = $this->input->get_post("q_num");
		if($this->input->get_post("selected")=="null")
		{
			die("<script>window.location='".base_url()."Eexam/StartTest/".$set_id."/".$q_num."'</script>");	
		}
		if($this->CheckExistQuestion()>0){
			$data = array("std_answer"=>$this->input->get_post("selected"));
			$this->db->where("question_id",$this->input->get_post("q_id"));
			$this->db->where("std_id",$this->session->userdata("student_id"));
			$this->db->update("ans_machin",$data);
			die("<script>window.location='".base_url()."Eexam/StartTest/".$set_id."/".$q_num."'</script>");	

		}else{
			$data = array("set_id"=>$this->input->get_post("set_id"),
						"question_id"=>$this->input->get_post("q_id"),
						"std_id"=>$this->session->userdata("student_id"),"std_answer"=>$this->input->get_post("selected"),
						"date"=>date("d-m-Y"));
			$this->db->insert("ans_machin",$data);
			die("<script>window.location='".base_url()."Eexam/StartTest/".$set_id."/".$q_num."'</script>");	
			
		}

	}
	public function CheckExistQuestion(){
			$this->db->select();
			$this->db->from("ans_machin");
			$this->db->where("question_id",$this->input->get_post("q_id"));
			$this->db->where("std_id",$this->session->userdata("student_id"));
			$q = $this->db->get();
			return $q->num_rows();
	}

	public function FinalResult($set_id,$student_id)
	{
		$this->db->select('*');
		$this->db->from("ans_machin");
		$this->db->join('questions','ans_machin.question_id=questions.question_id','left');
		$this->db->join('sets', 'ans_machin.set_id = sets.set_id');
		$this->db->where('ans_machin.set_id',$set_id);
		$this->db->where('ans_machin.std_id',$student_id);
		
		$query = $this->db->get();
		return $query->result_array();
	}


	public function TrueQuestion($set_id,$q_id)
	{
		$this->db->select('*');
		$this->db->from("ans_machin");
		$this->db->where('std_id',$set_id);
		$query = $this->db->get();
		return $query->result_array();
	
	}	
		

}


 ?>