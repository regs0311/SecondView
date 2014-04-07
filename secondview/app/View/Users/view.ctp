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
	       <?php 
                  $i = 0;
                  foreach ($photos as $photo):
                     if($i == 0) {
                       echo "<li data-target='#myCarousel' data-slide-to='" . $i . "' class='active'></li>";
		     }
                     else {
                       echo "<li data-target='#myCarousel' data-slide-to='" . $i . "'></li>";
		     }
 		     $i++;
                  endforeach; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
 
	       <?php 
                  $i = 0;
                  foreach ($photos as $photo):
                     if($i == 0) {
                        echo "<div class='item active'>";
                           echo $this->Html->image($photo['Photo']['src'], array('alt' => '...',
                                                                                 'url' => array('controller' => 'photos',       
                                                                                                'action' => 'view', $photo['Photo']['id'])));
		        echo "</div>";
		     }
                     else {
                        echo "<div class='item'>";
                           echo $this->Html->image($photo['Photo']['src'], array('alt' => '...', 
                                                                                 'url' => array('controller' => 'photos',       
                                                                                                'action' => 'view', $photo['Photo']['id'])));
		        echo "</div>";
		     }
 		     $i++;
                  endforeach; ?>

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

