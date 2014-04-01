<div>
<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Change your description'); ?></legend>
	<?php
		echo $this->Form->input('picture', array(
									'label' => 'Select your profile picture',
									'type'  => 'file',
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
