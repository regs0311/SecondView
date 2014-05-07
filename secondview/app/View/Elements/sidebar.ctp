<div class="col-md-3">
  <div class="col-md-10 col-md-offset-1 profile-info">
    <div class="thumbnail">
      <?php echo $this->Html->image($user['User']['profilepic'], array('alt' => 'profile picture')); ?>
    </div>
    <label><?php echo h($user['User']['description']); ?></label>    
    <table class="table">
      <tbody>
        <tr>
          <td><a href="/secondview/users/follows/<?php echo $user['User']['id'] ?>" class="btn btn-link">Followers</a></td>
          <td><a href="/secondview/users/follows/<?php echo $user['User']['id'] ?>" class="btn btn-link">Following</a></td>
        </tr>
        <tr>
          <td><?php echo $following ?></td>
          <td><?php echo $follows ?></td>
        </tr>
        <tr>
          <td>Photos</td>
          <td>Rating</td>
        </tr>
        <tr>
          <td><?php echo $myphotos?></td>
          <td>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
	  </td>
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
    <?php if($this->Session->read('Auth.User')) { ?>
    <div class="text-center">
      <?php if (AuthComponent::user('id') == $user['User']['id']) { ?>
        <a data-toggle="modal" data-target="#modalUploadPicture" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-camera"></i> Upload</a>
      <?php } elseif ($isfollowing) { ?>
        <a href="/secondview/followers/delete/<?php echo $isfollowing[0]['followers']['id']; ?>" class="btn btn-default btn-lg" type="Submit">Unfollow <i class="glyphicon glyphicon-minus-sign"></i></a>
      <?php } else { 
                echo $this->Form->create('Follower', array(
                                         'role' => 'form',
                                         'url' => array('controller' => 'followers',       
                                                        'action' => 'add')));  
                echo $this->Form->input('followed_id', array(
					                    'type' => 'hidden',
					                    'value' => $user['User']['id']));                                     
      ?>
      <button class="btn btn-default btn-lg" type="Submit">Follow <i class="glyphicon glyphicon-plus-sign"></i></button>
      <?php 
          echo $this->Form->end();
        } 
	  ?>
    </div>
    <?php } ?>   
  </div> <!-- coll-md-10 -->
</div> <!-- col-md-3 -->
