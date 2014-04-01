<div class="row">
   <div class="col-md-5 col-md-offset-1 uploadphoto">
      <h1>Upload Photo</h1>
      <?php echo $this->Form->create('Photo', array('enctype' => 'multipart/form-data', 'class' => 'form')); ?>
	
      <div class="form-group">
         <?php echo $this->Form->input('picture', array('label' => 'Photo', 
                                                        'type'  => 'file',)); ?>
      </div>
      <div class="form-group">
	 <?php echo $this->Form->input('description', array('label' => 'Description', 
                                                            'placeholder' => 'Describe your photo!', 
                                                            'class' => 'form-control')); ?>
      </div>
       
      <?php
	$options = array('class' => 'btn btn-default'); 
	echo $this->Form->end($options); ?>

   </div>
</div>
