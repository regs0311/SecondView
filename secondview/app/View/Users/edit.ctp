<div class="users form">
<?php 
	if (AuthComponent::user('username') == 0 ) {
		$g = 'Male';
	} else {
		$g = 'Female';
	}
?>

<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('username', array(
									'disabled'=> 'disabled'
										
		));
		echo $this->Form->input('name', array(
									'disabled'=> 'disabled'
										
		));
		echo $this->Form->input('email', array(
									'disabled'=> 'disabled',
										
		));
		echo $this->Form->input('country'); 
		echo $this->Form->input('gen', array(
									'label' => 'Gender',
									'value' => $g,
									'disabled'=> 'disabled',
		));
		echo $this->Form->input('picture', array(
									'label' => 'Select your profile picture',
									'type'  => 'file',
		));
		echo $this->Form->input('dob', array(
									'label'      => 'Birthday',
								    'dateFormat' => 'DMY',
								    'minYear'    => date('Y') - 70,
								    'maxYear'    => date('Y') - 10,
								    'disabled'=> 'disabled',
		));
		echo $this->Form->input('description', array(
									'type' => 'text',
		));
		echo $this->Form->input('password', array(
									'value' => '',
		)); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
