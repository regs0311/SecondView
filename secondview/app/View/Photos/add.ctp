<div>
<?php echo $this->Form->create('Photo', array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Photo'); ?></legend>
	<?php
		echo $this->Form->input('picture', array(
									'label' => 'Photo',
									'type'  => 'file',
		));
		echo $this->Form->input('description', array(
									'label' => 'Description'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
