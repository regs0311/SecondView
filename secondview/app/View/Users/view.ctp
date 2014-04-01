<div class="container-fluid navbarfix">
   <div class="row">
      <div class="col-md-3">
         <div class="col-md-10 col-md-offset-1 profile_info">
            <div class="row">
	       <div class="col-md-9"> 
	          <div class="thumbnail">
        	     <?php echo $this->Html->image($user['User']['profilepic'], array('alt' => 'profile picture')); ?>
	          </div>
    	       </div>        
            </div>
	 
            <div class="row">
               <div class="user_info col-md-10">
	          <h3>Profile information</h3>
                  <div>
	             <span class="glyphicon glyphicon-user"></span>
                     <span><?php echo h($user['User']['username']); ?></span>
                     <span>(<?php echo h($user['User']['name']); ?>)</span>
                  </div>
                  <div>
                     <span class="glyphicon glyphicon-envelope"></span>
                     <span><?php echo h($user['User']['email']); ?></span>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-7">

         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
               <div class="item active">
                  <?php echo $this->Html->image("gym.jpg", array('alt' => '...')); ?>
               </div>
               <div class="item">
                  <?php echo $this->Html->image("sunset.jpg", array('alt' => '...')); ?>
               </div>
               <div class="item">
                  <?php echo $this->Html->image("jumbo.jpg", array('alt' => '...')); ?>
               </div>
            </div>

             <!-- Controls -->
             <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
             </a>
             <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
             </a>
         </div>
      </div>
   </div>
</div>
<div>
