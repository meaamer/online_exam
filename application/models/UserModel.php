<?php 



class UserModel extends CI_Model
{
	public function loginuser($mobile,$password)
		{
			
			$this->load->library('session');
			$this->db->select("*");
			$this->db->from("student_addmission");
			$this->db->where("std_mobile",$mobile);
			$this->db->where("std_password",$password);
			$query=$this->db->get();
			if($query->num_rows())
			{
				$row = $query->result_array()[0];
				$this->session->set_userdata('student_id',$row["std_id"]);
				$this->session->set_userdata('student_name',$row["std_full_name"]);
				$this->session->set_userdata('student_mobile',$row["std_mobile"]);
				$this->session->set_userdata('student_password',$row["std_password"]);
				$this->session->set_userdata('student_course',$row["std_course"]);
				// delete all the recordes before login
				$this->db->where('std_id',$row["std_id"]);
				$this->db->delete('ans_machin');
				return true;
			}
			else
			{
				return false;
			}
		}

		public function DeleteAllRecords()
		{

		}
		



}

	










 ?>

