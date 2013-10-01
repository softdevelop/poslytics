<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
echo $this->Html->script('/usermgmt/js/umupdate');
?>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php //echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<h4 class="widgettitle">Total Users</h4>
				<div style="float:right;margin-top:10px;">
					<span  class="umstyle2"><?php __('Select action');?></span>  <?php echo $this->Form->input("controller",array('type'=>'select', 'div'=>false,'options'=>$allControllers,'selected'=>$c,'label'=>false))?>
				</div>
				<div style="float:right;margin-top:10px;">
					<span  class="umstyle2"><?php __('Select group');?></span>  <?php echo $this->Form->input("group",array('type'=>'select', 'div'=>false,'options'=>$select_groups,'selected'=>$g,'label'=>false))?>
				</div>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="permissions">
		<?php   if (!empty($controllers)) { ?>
					<input type="hidden" id="BASE_URL" value="<?php echo SITE_URL?>">
					<input type="hidden" id="groups" value="<?php echo $groups?>">
					<table cellspacing="0" cellpadding="0" width="100%" border="0" class="table22">
						<thead>
							<tr>
								<th id='left_content' style='padding-left: 30px;'> <?php echo __("Model");?> </th>
								<th id='left_content'> <?php echo __("Action");?> </th>
								<th id='left_content'> <?php echo __("Permission");?> </th>
							</tr>
						</thead>
						<tbody>
			<?php
					$k=1;
					foreach ($controllers as $key=>$value) {
						if (!empty($value)) {
							for ($i=0; $i<count($value); $i++) {
								if (isset($value[$i])) {
									$action=$value[$i];
									echo $this->Form->create();
									echo $this->Form->hidden('controller',array('id'=>'controller'.$k,'value'=>$key));
									echo $this->Form->hidden('action',array('id'=>'action'.$k,'value'=>$action));
									echo "<tr>";
									echo "<td id='left_content' style='padding-left: 30px;'>".$key."</td>";
									echo "<td id='left_content'>".$action."</td>";
									echo "<td id='left_content'>";
									//foreach ($user_groups as $user_group) {
										$ugname=$user_groups[$g-1]['name'];
										$ugname_alias=$user_groups[$g-1]['alias_name'];
										if (isset($value[$action][$ugname_alias]) && $value[$action][$ugname_alias]==1) {
											$checked=true;
										} else {
											$checked=false;
										}
										echo $this->Form->input($ugname,array('id'=>$ugname_alias.$k,'type'=>'checkbox','checked'=>$checked));
									//}
									echo "</td>";
									echo "<td>";
									echo $this->Form->button('Update', array('type'=>'button','id'=>'mybutton123','name'=>$k,'onClick'=>'javascript:update_fields('.$k.');', 'class'=>'btn btn-primary'));
									echo "<div id='updateDiv".$k."' align='right' class='updateDiv'>&nbsp;</div>";
									echo "</td>";
									echo "</tr>";
									echo $this->Form->end();
									$k++;
								}
							}
						}
					} ?>
					</tbody>
				</table>
		<?php   }   ?>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.table22 tr:odd').addClass('trodd');
        $('#controller option:first-child').text('Select permission');
		jQuery('#group').change(function($){
			window.location = "http://pointofsale.com"+"/permissions/?c="+jQuery('#controller option:selected').val()+"&g="+jQuery('#group option:selected').val();
		});
		jQuery('#controller').change(function($){
			window.location = "http://pointofsale.com"+"/permissions/?c="+jQuery('#controller option:selected').val()+"&g="+jQuery('#group option:selected').val();
		});
    })
</script>