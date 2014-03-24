<div>
<h2><?php echo __('Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->image($user['Photo']['src'], array('alt' => 'picture', 'height'=>'300','width'=>'300')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php 
				$user = $this->User->findById($photo['Photo']['id_user']);
				echo h($user['User']['username']); 
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['rating']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), null, __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
