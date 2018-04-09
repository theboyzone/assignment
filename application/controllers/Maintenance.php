<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends Application
{
    public function index()
    {
        $categories = $this->categories->all();

        // get all categories and associated items
        foreach ($categories as $category) {
            $accessories = $this->accessories->some('categoryId', $category->categoryId);
            foreach ($accessories as $accessory) {
                $accessory->categoryName = $category->categoryName;
            }
            $category->accessories = $accessories;
        }

        $role = $this->session->userdata('user_role');

        if (is_null($role)) {
            $role = "Guest";
        }

        $this->data['user_role'] = $role;
        $this->data['categories'] = $categories;

        $this->data['pagebody'] = 'maintenance';
        $this->data['pagetitle'] = 'All options';

        $this->render();
    }
	
	public function add()
	{
		$accessory = $this->accessories->create();
		$this->session->set_userdata('accessory', $accessory);
		$this->showit('itemadd');
	}
	
	public function edit($id = null)
	{
		if ($id == null)
			redirect('/maintenance');
		$accessory = $this->accessories->get($id);
		$this->session->set_userdata('accessory', $accessory);
		$this->showit('itemedit');
	}
	
	private function showit($body)
	{
		$this->load->helper('form');
		$accessory = $this->session->userdata('accessory');
		$this->data['accessoryId'] = $accessory->accessoryId;
		
		// if no errors, pass an empty message
		if (! isset($this->data['error'])) {
			$this->data['error'] = '';
		}
		$fields = array(
			'faccessory'      => form_label('Accessory description') . form_input('singleAccessory', $accessory->accessoryName),
			'fimg'  => form_label('AccessoryImg') . form_input('img', $accessory->accessoryImg),
			'fcomfort'  => form_label('comfort') . form_input('comfort', $accessory->accessoryComfort),
			'fspeed'  => form_label('speed') . form_input('speed', $accessory->accessorySpeed),
			'fprofessionality'  => form_label('professionality') . form_input('professionality', $accessory->accessoryProfessionality),
			'fcategory'  => form_label('category') . form_input('category', $accessory->categoryId),
			'zsubmit'    => form_submit('submit', 'Update the accessory'),
		);
		$this->data = array_merge($this->data, $fields);
		$this->data['pagebody'] = $body;
		$this->render();
	}
	
	public function submit()
	{
		// setup for validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->accessories->rules());
		
		// retrieve & update data transfer buffer
		$accessory = (array) $this->session->userdata('accessory');
		$accessory = array_merge($accessory, $this->input->post());
		$accessory = (object) $accessory;  // convert back to object
		$this->session->set_userdata('accessory', (object) $accessory);
		
		// validate away
		if ($this->form_validation->run()) {
			if (empty($accessory->accessoryId)) {
				$accessory->accessoryId = $this->accessories->highest() + 1;
				$this->accessories->add($accessory);
				$this->alert('accessory ' . $accessory->accessoryId . ' added', 'success');
			} else {
				$this->accessories->update($accessory);
				$this->alert('accessory ' . $accessory->accessoryId . ' updated', 'success');
			}
		} else {
			$this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
		}
		redirect('/maintenance');
	}
	
	private function alert($message)
	{
		$this->load->helper('html');
		$this->data['error'] = heading($message, 3);
	}
	
		// Forget about this edit
	public function cancel()
	{
		$this->session->unset_userdata('singleAccessory');
		redirect('/maintenance');
	}
	// Delete this item altogether
	public function delete()
	{
		$dto = $this->session->userdata('accessory');
		$accessory = $this->accessories->get($dto->accessoryId);
		$this->accessories->delete($accessory->accessoryId);
		$this->session->unset_userdata('accessory');
		redirect('/maintenance');
	}
	
}
