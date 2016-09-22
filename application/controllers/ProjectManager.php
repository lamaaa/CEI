<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-11
 * Time: 上午10:14
 */

class ProjectManager extends AdminBase
{
    public function index()
    {
        if($this->is_logged())
        {
            $data['title'] = 'CEI: Admin Projects Page';
            $data['include'] = 'project_index';
            $this->load->view('admin_template', $data);
        }
        else
        {
            redirect(base_url().'login', 'refresh');
        }
    }

    // 列出所有项目
    public function listing()
    {
        $this->load->library('table');

        $this->load->model('MProject', '', true);
        $projects_qry = $this->MProject->listProjects();

        // 展示数据
        $data['title'] = "CEI: Project List";
        $data['include'] = "project_listing";
        $data['projects_qry'] = $projects_qry;

        $this->load->view('project_template', $data);
    }

    // 项目详情
    public function view()
    {
        $this->load->model('MProject', '', TRUE);
        $project_id = $this->uri->segment(4);

        $data['projects'] = $this->MProject->getProject($project_id)->result();
        $data['project_members'] = $this->MProject->getProjectMembers($project_id)->result();
        $data['title'] = "CEI: View Project";
        $data['include'] = 'project_view';

        $this->load->view('project_template', $data);
    }

    // 添加项目的表单
    public function add()
    {
        $this->load->helper('form');
        $this->load->model('MProject', '', true);
        $projects_qry = $this->MProject->getMembers();

        // 展示数据
        $data['title'] = "CEI: Add Project";
        $data['include'] = 'project_add';
        $data['projects_qry'] = $projects_qry;

        $this->load->view('project_template', $data);
    }

    // 添加项目
    public function create()
    {
        $this->load->model('MProject', '', TRUE);

        $this->MProject->addProject($_POST);

        redirect(base_url().'admin/projects/listing', 'refresh');
    }

    // 修改项目的表单
    public function edit()
    {
        $this->load->helper('form');
        $this->load->model('MProject', '', TRUE);
        $project_id = $this->uri->segment(4);
        $data['project'] = $this->MProject->getProject($project_id)->result();
        $data['members'] = $this->MProject->getMembers()->result();

        // 展示数据
        $data['title'] = "CEI: Edit Project";
        $data['include'] = "project_edit";

        $this->load->view('project_template', $data);
    }

    // 修改项目
    public function update()
    {
        $this->load->model('MProject', '', TRUE);
        $this->MProject->updateProject($_POST['project_id'], $_POST);
        redirect(base_url().'admin/projects/listing', 'refresh');
    }

    // 删除项目
    public function delete()
    {
        $this->load->model('MProject', '', TRUE);
        $project_id = $this->uri->segment(4);

        $this->MProject->deleteProject($project_id);
        redirect(base_url().'admin/projects/listing', 'refresh');
    }
}