<div class="row">
<div class="col-md-6 col-md-offset-3 registration">
    <h1>Registration</h1>
    <?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data', 'class' => 'form')); ?>
    <div class="form-group">
      <?php echo $this->Form->input('username', array('label'       => 'Username', 
                                                    'placeholder' => 'secondView97', 
                                                    'class'       => 'form-control')); ?>
      <br/>
      <?php echo $this->Form->input('name', array('label'       => 'Name', 
                                                'placeholder' => 'Second View', 
                                                'class'       => 'form-control')); ?>
      <br/>
      <?php echo $this->Form->input('email', array('label'       => 'Email', 
                                                 'placeholder' => 'second@view.com', 
                                                 'class'       => 'form-control')); ?>
      <br/>
      <?php echo $this->Form->input('password', array('label' => 'Password', 
                                                    'placeholder' => 'Password', 
                                                    'class' => 'form-control')); ?>
      <br/>
      <?php echo $this->Form->input('gender', array('options' => array('Male', 'Female'),
							                      'empty' => '(select one)',
	                                              'class' => 'form-control'));
      ?>
      <br/>
      <?php echo $this->Form->input('country', array('label'       => 'Country', 
                                                   'placeholder' => 'Finland', 
                                                   'class'       => 'form-control')); ?>
      <br/>
      <?php echo $this->Form->input('picture', array('label' => 'Select your profile picture', 
                                                   'type'  => 'file')); ?>
      <br/>
      <?php echo $this->Form->input('dob', array('label'      => 'Birthdate',
                                                 'dateFormat' => 'DMY',
	   				                             'minYear'    => date('Y') - 70,
	  			                                 'maxYear'    => date('Y') - 10, )); ?>
      <br/>
      <?php echo $this->Form->input('description', array('placeholder' => 'Tell us something about yourself :D',
                                                         'class'       => 'form-control')); ?>
    </div>
    <?php 
      $options = array('class' => 'btn btn-info'); 
      echo $this->Form->end($options); 
    ?>
  </div>
</div>

