<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>项目详情</title>
</head>
<body>
<table>
    <tr>
        <td>项目名称:</td>
        <td><h2><?php echo $projects[0]->project_name ?></h2></td>
    </tr>
    <tr>
        <td>日期:</td>
        <td><?php echo $projects[0]->project_date ?></td>
    </tr>
    <tr>
        <td>费用:</td>
        <td><?php echo $projects[0]->project_price?>元</td>
    </tr>
    <tr>
        <td>参与人:</td>
        <td>
            <?php foreach ($project_members as $member):?>
                <?php echo $member->member_name ?>&nbsp
            <?php endforeach;?>
        </td>
    </tr>
    <tr>
        <td>项目描述:</td>
        <td><?php echo $projects[0]->project_desc ?></td>
    </tr>
    <tr>
        <td>操作:</td>
        <td><?php echo anchor(base_url().'admin/projects/edit/'.$projects[0]->project_id, '修改') . '&nbsp' .
                anchor(base_url().'admin/projects/delete/'.$projects[0]->project_id, '删除',
                "onClick=\" return confirm('你确定要删除{$projects[0]->project_name}项目吗?')\"")?>
        </td>
    </tr>
</table>
</body>
</html>