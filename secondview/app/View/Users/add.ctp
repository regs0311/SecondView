<div>
<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('country');
		echo $this->Form->input('gender', array(
								    'options' => array('Male', 'Female'),
								    'empty' => '(select one)',
		));
		echo $this->Form->input('picture', array(
									'label' => 'Select your profile picture',
									'type'  => 'file',
		));
		echo $this->Form->input('dob', array(
									'label'      => 'Birthdate',
								    'dateFormat' => 'DMY',
								    'minYear'    => date('Y') - 70,
								    'maxYear'    => date('Y') - 10,
		));
		echo $this->Form->input('Tell us something about yourself: ', array(
									'type' => 'text',
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
