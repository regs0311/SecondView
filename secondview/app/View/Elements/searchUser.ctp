<div class="col-md-3 usersidebar" style="overflow-y: scroll">
  <?php if($users) { ?>
  <div class="text-center">
  	<h4 style="color:white">Users founded</h4>
  </div>
  <div class="col-md-10 col-md-offset-1 profile-info">
    <?php foreach ($users as $user): ?>
      <div class="thumbnail">
        <?php echo $this->Html->image($user['users']['profilepic'], array('alt' => 'profile picture')); ?>
      </div> 
      <div>
        <a class="btn btn-default" href="/secondview/users/view/<?php echo $user['users']['id'] ?>" role="button">
	      <span class="glyphicon glyphicon-user"></span>
          <span><?php echo h($user['users']['username']); ?>  </span>    
        </a>
      </div>
    <?php endforeach; ?>
  </div> <!-- coll-md-10 -->
  <?php } else { ?>
  <div class="text-center">
  	<h4 style="color:white">Not users founded</h4>
  </div>
  <?php } ?>
</div> <!-- col-md-3 -->