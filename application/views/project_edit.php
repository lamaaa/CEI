<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-11
 * Time: 上午10:24
 */
echo form_open(base_url().'admin/projects/update');

echo form_hidden('project_id', $project[0]->project_id);
?>
    <fieldset>
        <legend>项目更新</legend>
        项目名称:<br>
        <input type="text" name="project_name" value="<?php echo $project[0]->project_name ?>"/>
        </br>
        项目费用:<br>
        <input type="number" name="project_price" value="<?php echo $project[0]->project_price ?>"/>
        <br>
        项目参与人:<br>
        <?php foreach($members as $member):?>
            <input type="checkbox" name="members_name[]" value="<?php echo $member->member_name?>"/><?php echo $member->member_name?>
        <?php endforeach;?>
        </br>
        项目描述:<br>
        <textarea name="project_desc" id="" cols="30" rows="10"><?php echo $project[0]->project_desc ?></textarea>
        </br>
        <input type="submit" value="添加"/>
    </fieldset>
<?php

$_POST['project_id'] = $this->uri->segment(4);
echo form_close();