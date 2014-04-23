<div class="col-md-9">
  <?php if($photos) { ?>
  <div class="text-center">
  	<h4 style="color:white">Photos founded</h4>
  </div>
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
      endforeach; 
    ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php 
        $i = 0;
        foreach ($photos as $photo):
          if($i == 0) { ?>
            <div class='item active'>
              <?php echo $this->Html->image($photo['photos']['src'], array('alt' => '...',
                                                                           'class' => 'pic',
                                                                           'style' => 'display: block; margin: 0 auto',
                                                                           'url' => array('controller' => 'photos',       
                                                                                          'action' => 'view', 
                                                                                          $photo['photos']['id']))); ?>
	        </div>
	      <?php 
	      }
          else { ?>
            <div class='item'>
              <?php echo $this->Html->image($photo['photos']['src'], array('alt' => '...',
                                                                           'class' => 'pic',
                                                                           'style' => 'display: block; margin: 0 auto',
                                                                           'url' => array('controller' => 'photos',       
                                                                           'action' => 'view', 
                                                                           $photo['photos']['id']))); ?>		        
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
  <?php } else { ?>
  <div class="text-center">
  	<h4 style="color:white">No photos founded</h4>
  </div>
  <?php } ?>
</div> <!-- col-md-9 -->