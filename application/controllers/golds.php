<?php
class Golds extends CI_Controller {
	public function index()
	{
		if (!$this->session->userdata('golds'))
		{
			$this->session->set_userdata('golds', 0);
		}
		
		$this->load->view("ninja", array("golds" => $this->session->userdata("golds")));
		
	}

	public function process_money()
	{
		$farm_golds = rand(10, 20);
		$cave_golds = rand(5, 10);
		$house_golds = rand(2, 5);
		$casino_golds = rand(0, 50);
		$golds = $this->session->userdata('golds');

		if ($this->session->userdata('activities') == false)
		{
			$this->session->set_userdata('activities', "");
		}

		if ($this->input->post('building') && $this->input->post('building') == "farm")
		{
			$log = $this->session->userdata('activities');
			$this->session->set_userdata("activities", $log . "<p class='success'>You farmed and made {$farm_golds} golds!</p>");
			$this->session->set_userdata("golds", $golds + $farm_golds);	
		}

		if ($this->input->post('building') && $this->input->post('building') == "cave")
		{
			$log = $this->session->userdata('activities');
			$this->session->set_userdata("activities", $log . "<p class='success'>You explored a cave and got {$cave_golds} golds!</p>");
			$this->session->set_userdata("golds", $golds + $cave_golds);	
		}

		if ($this->input->post('building') && $this->input->post('building') == "house")
		{
			$log = $this->session->userdata('activities');
			$this->session->set_userdata("activities", $log . "<p class='success'>You robbed a house and got {$house_golds} golds!</p>");
			$this->session->set_userdata("golds", $golds + $house_golds);	
		}

		if ($this->input->post('building') && $this->input->post('building') == "casino")
		{
			$log = $this->session->userdata('activities');
			if (rand(1, 10) > 2)
			{
				$this->session->set_userdata("activities", $log . "<p class='fail'>You lost at the casino and lost {$casino_golds} golds!</p>");
				$this->session->set_userdata("golds", $golds - $casino_golds);
			}
			else
			{
				$this->session->set_userdata("activities", $log . "<p class='success'>You won at the casino and won {$casino_golds} golds!</p>");
				$this->session->set_userdata("golds", $golds + $casino_golds);	
			}
		}
		
		redirect('result');
	}

	public function result()
	{
		$this->load->view("ninja", array("golds" => $this->session->userdata("golds"), 
										"active_log" => $this->session->userdata("activities")));
	}

	public function reset()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}





?>