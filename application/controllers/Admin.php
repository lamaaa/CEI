<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-8
 * Time: 下午4:32
 */

class Admin extends AdminBase
{
    // 验证用户是否登录
    // 如果已经登录，则跳转到管理员页面
    // 如果没有登录，则跳转到登录页面
    public function index()
    {
        if($this->is_logged())
        {
            $data['title'] = 'CEI: Admin Admin Page';
            $data['include'] = 'admin_index';
            $this->load->view('admin_template', $data);
        }
        else
        {
            redirect(base_url().'login', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('admin', 'refresh');
    }
}