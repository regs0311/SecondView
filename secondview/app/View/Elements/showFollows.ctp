<div class="col-md-9">
  <h3 class="text-center" style="color:white">Followers</h3>
  <div class="row" style="overflow-x: scroll">
    <?php foreach ($userFollowing as $user): ?>
      <div  class="col-md-3 text-center">
        <div class="thumbnail">
          <?php echo $this->Html->image($user['user']['profilepic'], array('alt' => 'profile picture')); ?>
        </div> 
        <div style="margin-bottom: 15px">
          <a class="btn btn-default" href="/secondview/users/view/<?php echo $user['user']['id'] ?>" role="button">
	        <span class="glyphicon glyphicon-user"></span>
            <span><?php echo h($user['user']['username']); ?>  </span>    
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    <?php if(!$userFollowing) { ?>
      <h5 class="text-center" style="color:white">No followers</h5>
    <?php } ?>
  </div>
  <hr>
  <h3 class="text-center" style="color:white">Following</h3>
  <div class="row" style="overflow-x: scroll">
    <?php foreach ($userFollows as $user): ?>
      <div class="col-md-3 text-center">
        <div class="thumbnail">
          <?php echo $this->Html->image($user['user']['profilepic'], array('alt' => 'profile picture')); ?>
        </div> 
        <div style="margin-bottom: 15px">
          <a class="btn btn-default" href="/secondview/users/view/<?php echo $user['user']['id'] ?>" role="button">
	        <span class="glyphicon glyphicon-user"></span>
            <span><?php echo h($user['user']['username']); ?>  </span>    
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    <?php if(!$userFollows) { ?>
      <h5 class="text-center" style="color:white">No users being followed</h5>
    <?php } ?>
  </div>
</div> <!-- col-md-9 -->
