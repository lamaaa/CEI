<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-8
 * Time: 下午9:57
 */

class MUser extends CI_Model
{
    public function login($username, $password)
    {
        // SELECT username,password
        // FROM users
        // WHERE username = $username
        // AND password = $password
        // LIMIT 1
        $this->db->select('username, password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        // query
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}