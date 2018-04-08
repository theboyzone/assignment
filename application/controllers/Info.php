<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends Application
{
	public function index()
	{
		$data = json_encode(array("scenario" => "CST Student Outfitter"));

		$this->output->set_content_type('application/json');
		$this->output->set_output($data);
	}

	public function category($key = null)
	{
		$data = json_encode($this->categories->get($key));

		if (is_null($key))
		{
			$data = json_encode($this->categories->all());
		}

		$this->output->set_content_type('application/json');
		$this->output->set_output($data);
	}

	public function catalog($key = null)
	{
		$data = json_encode($this->accessories->get($key));

		if (is_null($key))
		{
			$data = json_encode($this->accessories->all());
		}

		$this->output->set_content_type('application/json');
		$this->output->set_output($data);
	}

	public function bundle($key = null)
	{
		$data = json_encode($this->sets->get($key));

		if (is_null($key))
		{
			$data = json_encode($this->sets->all());
		}

		$this->output->set_content_type('application/json');
		$this->output->set_output($data);
	}
}
