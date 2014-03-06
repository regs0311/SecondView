<div class="photos view">
<h2><?php echo __('Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id User'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['id_user']); ?>
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
		<dt><?php echo __('Src'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['src']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Photo'), array('action' => 'edit', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), null, __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
