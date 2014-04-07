<script>
  $(document).ready(function() 
  {
    $(".arrow").each(function() {
      $(this).css("height", $( document ).height() - 100); 
    });
  });
</script>
<?php
  if(isset($_GET['param'])) { ?>
  <div class="text-center message">
<?php 
    $value = $_GET['param'];
    if($value == 'e') {
	    echo 'An error occured';
    } elseif ($value == 's') {
	    echo 'Success';
    }
?>
  </div>
<?php } ?>
<div class="container-fluid navbarfix">
  <div class="row">
    <div class="col-md-3">
      <div class="col-md-10 col-md-offset-1 profile-info">
	    <div class="thumbnail">
          <?php echo $this->Html->image($user['User']['profilepic'], array('alt' => 'profile picture')); ?>
	    </div>
	    <label><?php echo h($user['User']['description']); ?></label>    
	    <table class="table">
	      <tbody>
	        <tr>
	          <td>Followers</td>
	          <td>Following</td>
	        </tr>
	        <tr>
	          <td>10<!-- add php here --></td>
	          <td>20<!-- add php here --></td>
	        </tr>
	        <tr>
	          <td>Photos</td>
	          <td>Rating</td>
	        </tr>
	        <tr>
	          <td><?php echo count($myphotos)?></td>
	          <td>5/5<!-- add php here --></td>
	        </tr>
	      </tbody>
	    </table>
        <div>
	      <span class="glyphicon glyphicon-user"></span>
          <span><?php echo h($user['User']['username']); ?></span>
          <span>(<?php echo h($user['User']['name']); ?>)</span>
        </div>
        <div>
          <span class="glyphicon glyphicon-envelope"></span>
          <span><?php echo h($user['User']['email']); ?></span>
        </div>
        <br/>
        <br/>
        <div class="text-center">
          <a data-toggle="modal" data-target="#modalUploadPicture" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-camera"></i> Upload</a>
        </div>
        <br/>
        <br/>
        <a data-toggle="modal" data-target="#modalChangeProfilePicture" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-cog"></i> Change Profile Picture</a>
        <a data-toggle="modal" data-target="#modalChangeDescription" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-cog"></i> Change Description</a>
        <a data-toggle="modal" data-target="#modalChangePassword" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-cog"></i> Change Password</a>     
      </div> <!-- coll-md-10 -->
    </div> <!-- col-md-3 -->
    <div class="col-md-9">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
	    <?php 
          $i = 0;
          foreach ($myphotos as $photo):
            if($i == 0) {
              echo "<li data-target='#myCarousel' data-slide-to='" . $i . "' class='active'></li>";
		    }
            else {
              echo "<li data-target='#myCarousel' data-slide-to='" . $i . "'></li>";
		    }
 		    $i++;
          endforeach; 
        ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
	      <?php 
            $i = 0;
            foreach ($myphotos as $photo):
              if($i == 0) { ?>
                <div class='item active'>
                  <?php echo $this->Html->image($photo['Photo']['src'], array('alt' => '...',
                                                                              'url' => array('controller' => 'photos',       
                                                                                             'action' => 'view', 
                                                                                             $photo['Photo']['id']))); ?>
		        </div>
		      <?php 
		      }
              else { ?>
                <div class='item'>
                  <?php echo $this->Html->image($photo['Photo']['src'], array('alt' => '...',
                                                                              'url' => array('controller' => 'photos',       
                                                                                             'action' => 'view', 
                                                                                             $photo['Photo']['id']))); ?>		        
                </div>
		      <?php
		      }
 		      $i++;
            endforeach; 
          ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control arrow" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control arrow" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div> <!-- myCatousel -->
    </div> <!-- col-md-7 -->
 </div> <!-- row -->
</div> <!-- container fluid navbar  -->


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
