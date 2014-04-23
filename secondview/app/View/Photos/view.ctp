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
