<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($user['User']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<?php 
		if ($user['User']['gender'] == 0 ) {
			$g = 'Male';
		} else {
			$g = 'Female';
		}
		?>
		<dd>
			<?php echo h($g); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profilepic'); ?></dt>
		<dd>
			<?php echo $this->Html->image($user['User']['profilepic'], array('alt' => 'profile picture', 'height'=>'300','width'=>'300')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($user['User']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($user['User']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit My Information'), array('action' => 'edit', AuthComponent::user('id'))); ?> </li>
		<li><?php echo $this->Html->link(__('Log Out'), array('action' => 'logout')); ?> </li>
	</ul>
</div>
