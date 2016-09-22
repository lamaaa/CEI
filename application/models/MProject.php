<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-11
 * Time: 上午10:59
 */
class MProject extends CI_Model
{
    // 查询projects表，列出项目
    public function listProjects()
    {
        return $this->db->get('projects');
    }

    // 查询member表，列出成员
    public function getMembers()
    {
        // select * from members
        return $this->db->get('members');
    }

    // 增加项目
    // 第一，修改projects表中数据
    // 第二，修改project_members表中数据
    public function addProject($data)
    {
        // 获取项目成员名单并且从$data数组中去除
        $members_name = $data['members_name'];
        unset($data['members_name']);

        // 将项目相关成员去掉后插入项目表
        $this->db->insert('projects', $data);

        // 将项目相关成员插入项目相关成员表
        $this->db->select_max('project_id');
        $project_id = $this->db->get('projects')->result()[0]->project_id;
        foreach ($members_name as $member_name)
        {
            $this->db->insert('project_members', array(
                'project_id' => $project_id,
                 'member_name' => $member_name
            ));
        }
    }

    // 删除项目
    // 第一，删除projects表中数据
    // 第二，删除project_members表中数据
    public function deleteProject($project_id)
    {
        // 根据project_id删除projects表中的数据
        $this->db->where('project_id', $project_id);
        $this->db->delete('projects');

        // 根据project_id删除project_members表中的数据
        $this->db->where('project_id', $project_id);
        $this->db->delete('project_members');
    }

    // 根据project_id获得项目
    public function getProject($project_id)
    {
        $this->db->where('project_id', $project_id);
        return $this->db->get('projects');
    }

    public function updateProject($project_id, $data)
    {
        // 获取项目成员名单并且从$data数组中去除
        $members_name = $data['members_name'];
        unset($data['members_name']);

        // 更新projects表中的数据
        $this->db->where('project_id', $project_id);
        $this->db->update('projects', $data);

        // 删除project_members表中相应的数据
        // 插入相应的数据到project_members表中
        $this->db->where('project_id', $project_id);
        $this->db->delete('project_members');
        foreach ($members_name as $member_name)
        {
            $this->db->insert('project_members', array(
                'project_id' => $project_id,
                'member_name' => $member_name
            ));
        }
    }

    public function getProjectMembers($project_id)
    {
        $this->db->where('project_id', $project_id);
        return $this->db->get('project_members');
    }
}