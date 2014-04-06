<div class="container-fluid navbarfix">
   <div class="row">
      
      <div class="col-md-10 col-md-offset-1 detail-photo">
         <?php echo $this->Html->image($photo['Photo']['src'], array('alt' => '...', 'class' => 'thumbnail detail-img')); ?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-8 col-md-offset-2 add-comment">
         <?php echo $this->Form->create('Comment', array('url'=>array('controller'=>'comments','action'=>'add'))); ?>
         <fieldset>
         <h3>TODO: Comments div</h3>
            <?php
		echo $this->Form->input('photo_id', array(
					'type' => 'hidden',
					'value' => $photo['Photo']['id']
		));
		echo $this->Form->input('comment');
	    ?>
	 </fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
      </div>
   </div>
</div>




<!--   CODE FROM OLD PAGE!!! 

<div>
  <h2><?php echo __('Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->image($photo['Photo']['src'], array('alt' => 'picture', 'height'=>'300','width'=>'300')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php 
				echo h($photo['User']['username']); 
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
		<?php foreach($photo['Comment'] as $comment) { ?>
		<dt><?php echo __('Comment by ' . $comment['User']['username']); ?></dt>
		<dd><?php echo h($comment['comment']); ?></dd>
		<?php } ?>
	</dl>
	<?php echo $this->Form->create('Comment', array('url'=>array('controller'=>'comments','action'=>'add'))); ?>
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>
	<?php
		echo $this->Form->input('photo_id', array(
					'type' => 'hidden',
					'value' => $photo['Photo']['id']
		));
		echo $this->Form->input('comment');
	?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), null, __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('action' => 'add')); ?> </li>
	</ul>
</div>

-->
