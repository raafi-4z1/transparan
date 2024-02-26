<?php

function cek_login_user($role_access)
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        if ($ci->session->userdata('role_access') != $role_access) {
            redirect('auth/blocked');
        }
    }
}