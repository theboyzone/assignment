<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends Application
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $sets = $this->sets->all();

        $this->data['sets'] = $sets;

        $role = $this->session->userdata('user_role');

        if (is_null($role)) {
            $role = "Guest";
        }

        $this->data['user_role'] = $role;

        $this->data['pagebody'] = 'sets';
        $this->data['pagetitle'] = 'Home';
        $this->render();
    }
}
