<!-- Modal for change uploading picture -->
<div class="modal fade" id="modalUploadPicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Upload photo</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('Photo', array('enctype' => 'multipart/form-data', 
                                                      'class' => 'form',
                                                      'url' => '/photos/add')); ?>
        <div class="form-group">
		<?php echo $this->Form->input('picture', array('label' => 'Photo', 
                                                       'type'  => 'file',
                                                       'class' => 'form-control')); ?>
        </div>
        <div class="form-group">
        <?php echo $this->Form->input('description', array('label' => 'Description', 
                                                           'placeholder' => 'Describe your photo!', 
                                                           'class' => 'form-control')); ?>
        </div>
        <?php echo $this->Form->end(array( 'class' => 'btn btn-default',
                                           'label' => 'Submit')); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal for change password -->
<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('User', array(
                                       'role' => 'form',
                                       'url' => array('controller' => 'users',       
                                                      'action' => 'changepassword', 
                                                      $user['User']['id'])));
        ?>
        <div class="form-group">
		<?php echo $this->Form->input('newpassword', array(
							          'label' => 'New password',
								      'type' => 'password',
								      'class' => 'form-control',
		  )); ?>
        </div>
        <div class="form-group">
		<?php echo $this->Form->input('oldpassword', array(
								      'label' => 'Old password',
								      'required' => true,
								      'type' => 'password',
								      'class' => 'form-control',
		  ));
	    ?>
        </div>
        <?php echo $this->Form->end(array( 'class' => 'btn btn-default',
                                           'label' => 'Submit')); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal for change description -->
<div class="modal fade" id="modalChangeDescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Description</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('User', array(
                                       'role' => 'form',
                                       'url' => array('controller' => 'users',       
                                                      'action' => 'changedescription', 
                                                      $user['User']['id']))); 
        ?>
        <div class="form-group">
		<?php
		  echo $this->Form->input('description', array(
		                          'label' => 'New Description',
							      'type' => 'textarea',
							      'class' => 'form-control',
		  ));
	    ?>
        </div>
        <?php echo $this->Form->end(array( 'class' => 'btn btn-default',
                                           'label' => 'Submit')); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal for change profile picture -->
<div class="modal fade" id="modalChangeProfilePicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Profile Picture</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('User', array(
                                       'role' => 'form',
                                       'url' => array('controller' => 'users',       
                                                      'action' => 'changepp', 
                                                      $user['User']['id']),
                                       'enctype' => 'multipart/form-data')); 
        ?>
        <div class="form-group">
		<?php
		  echo $this->Form->input('picture', array(
							      'label' => 'Select your new profile picture',
								  'type'  => 'file',
		  ));
	    ?>
        </div>
        <?php echo $this->Form->end(array( 'class' => 'btn btn-default',
                                           'label' => 'Submit')); ?>
      </div>
    </div>
  </div>
</div>