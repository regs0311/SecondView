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
          <td><?php echo $myphotos?></td>
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
      <?php if (AuthComponent::user('id') == $user['User']['id']) { ?>
        <a data-toggle="modal" data-target="#modalUploadPicture" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-camera"></i> Upload</a>
      <?php } else { ?>
        <a data-toggle="modal" data-target="" class="btn btn-default btn-lg">Follow <i class="glyphicon glyphicon-plus-sign"></i></a>
      <?php } ?>
    </div>
    <br/>
    <br/>
    <a data-toggle="modal" data-target="#modalChangeProfilePicture" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-cog"></i> Change Profile Picture</a>
    <a data-toggle="modal" data-target="#modalChangeDescription" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-cog"></i> Change Description</a>
    <a data-toggle="modal" data-target="#modalChangePassword" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-cog"></i> Change Password</a>     
  </div> <!-- coll-md-10 -->
</div> <!-- col-md-3 -->