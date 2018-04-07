<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends Application
{
    public function actor($role)
    {
        $this->session->set_userdata('user_role', $role);

        redirect($_SERVER['HTTP_REFERER']); // back where we came from
    }
}
