<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-8
 * Time: 下午9:53
 */

class Login extends AdminBase
{
    // 验证用户是否登录
    // 如果已经登录，则跳转到管理员页面
    // 如果没有登录，则跳转到登录页面
    public function index()
    {
        if($this->is_logged())
        {
            redirect(base_url().'admin', 'refresh');
        }
        else
        {
            $data['title'] = 'CEI: Admin Login Page';
            $data['include'] = 'admin_login';

            $this->load->view('admin_template', $data);
        }
    }


    // 验证表单数据是否正确
    // 如果正确，跳转到登录页面
    // 如果不正确，跳转到管理员页面
    public function verify_login()
    {
        $this->load->model('MUser', '', TRUE);
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            redirect(base_url().'login', 'refresh');
        }
        else
        {
            redirect(base_url().'admin', 'refresh');
        }
    }


    // 在数据库中验证中帐号密码
    // 如果正确，则设置session为logged_in,并返回true
    // 如果不正确，则返回false
    public function check_database($password)
    {
        $username = $this->input->post('username');

        $result = $this->MUser->login($username, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            return false;
        }
    }
}