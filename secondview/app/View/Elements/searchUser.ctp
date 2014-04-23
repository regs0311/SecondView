<div class="col-md-3 usersidebar" style="overflow-y: scroll">
  <div class="text-center">
  	<h4 style="color:white">Users founded</h4>
  </div>
  <div class="col-md-10 col-md-offset-1 profile-info">
    <?php foreach ($users as $user): ?>
      <div class="thumbnail">
        <?php echo $this->Html->image($user['users']['profilepic'], array('alt' => 'profile picture')); ?>
      </div> 
      <div>
        <span class="glyphicon glyphicon-user"></span>
        <span><?php echo h($user['users']['username']); ?>  </span>
        <a class="btn btn-default" href="#" role="button">View</a>
      </div>
    <?php endforeach; ?>
  </div> <!-- coll-md-10 -->
</div> <!-- col-md-3 -->