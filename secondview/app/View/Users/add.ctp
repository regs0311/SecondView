<div class="row">
   <div class="col-md-5 col-md-offset-1 registration">
      <h1>Registration</h1>
      <?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data', 'class' => 'form')); ?>
	
      <div class="form-group">
	 <?php echo $this->Form->input('username', array('label' => 'Username', 
                                                            'placeholder' => 'Username', 
                                                            'class' => 'form-control')); ?>
      </div>
      <div class="form-group">
	 <?php echo $this->Form->input('name', array('label' => 'Name', 
                                                            'placeholder' => 'Name', 
                                                            'class' => 'form-control')); ?>
      </div>
      <div class="form-group">
	 <?php echo $this->Form->input('email', array('label' => 'Email', 
                                                            'placeholder' => 'Email', 
                                                            'class' => 'form-control')); ?>
      </div>  
      <div class="form-group">
	 <?php echo $this->Form->input('password', array('label' => 'Password', 
                                                            'placeholder' => 'Password', 
                                                            'class' => 'form-control')); ?>
      </div>       
      <div class="form-group">
	 <?php echo $this->Form->input('country', array('label' => 'Country', 
                                                            'placeholder' => 'Country', 
                                                            'class' => 'form-control')); ?>
      </div>            
      <div class="form-group">
         <?php echo $this->Form->input('picture', array('label' => 'Select your profile picture', 
                                                        'type'  => 'file',)); ?>
      </div>
      <div class="form-group">
         <?php echo $this->Form->input('dob', array('label' => 'Birthdate',
                                                    'dateFormat' => 'DMY',
						    'minYear'    => date('Y') - 70,
					            'maxYear'    => date('Y') - 10, )); ?>
      </div>

      <div class="form-group">
         <?php echo $this->Form->input('Tell us something about yourself: ', array('type' => 'text',)); ?>
      </div>

      <?php
	$options = array('class' => 'btn btn-default'); 
	echo $this->Form->end($options); ?>

   </div>
</div>
