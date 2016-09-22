<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-7
 * Time: 下午3:18
 */

// generate HTML table from query results
$tmpl = array(
    'table_open' => '<table border="0" cellpadding="3" cellspacing="0">',
    'heading_row_start' => '<tr bgcolor="#66cc44">',
    'row_start' => '<tr bgcolor="#dddddd">'
);

$this->table->set_template($tmpl);

$this->table->set_empty("&nbsp;");

$this->table->set_heading('编号', '项目名称', '日期',
    '费用', '操作');

$table_row = array();

foreach ($projects_qry->result() as $project)
{
    $table_row = NULL;

    $table_row[] = $project->project_id;
    $table_row[] = $project->project_name;
    $table_row[] = $project->project_date;
    $table_row[] = $project->project_price;
    $table_row[] = '<nobr>' .
        anchor(base_url().'admin/projects/view/'.$project->project_id, '详情') . ' | ' .
        anchor(base_url().'admin/projects/edit/'.$project->project_id, '修改') . ' | ' .
        anchor(base_url().'admin/projects/delete/'.$project->project_id, '删除',
            "onClick=\" return confirm('你确定要删除{$project->project_name}项目吗?')\"") .
        '</nobr>';

    $this->table->add_row($table_row);
}

$projects_table = $this->table->generate();

echo $projects_table;
