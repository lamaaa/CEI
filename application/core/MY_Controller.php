<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-10
 * Time: 上午9:59
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class AdminBase extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // 查看是否登录
    // 如果是，返回true
    // 如果不是，返回false
    function is_logged()
    {
        if($this->session->userdata('logged_in'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

class HomeBase extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}
