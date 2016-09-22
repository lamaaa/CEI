<?php
/**
 * Created by PhpStorm.
 * User: lam
 * Date: 16-9-11
 * Time: 上午10:22
 */

echo form_open(base_url().'admin/projects/create');
?>
<fieldset>
			<legend>项目添加</legend>
项目名称:<br>
			<input type="text" name="project_name"/>
			</br>
项目费用:<br>
			<input type="number" name="project_price"/>
			<br>
项目参与人:<br>
			<?php foreach($projects_qry->result() as $member):?>
			<input type="checkbox" name="members_name[]" value="<?php echo $member->member_name?>"/><?php echo $member->member_name?>
			<?php endforeach;?>
			</br>
项目描述:<br>
			<textarea name="project_desc" id="" cols="30" rows="10"></textarea>
			</br>
			<input type="submit" value="添加"/>
		</fieldset>

<?php

echo form_close();
