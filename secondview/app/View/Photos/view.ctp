<div class="container-fluid navbarfix">
   <div class="row">
      
      <div class="col-md-10 col-md-offset-1 detail-photo">
         <?php echo $this->Html->image($photo['Photo']['src'], array('alt' => '...', 'class' => 'thumbnail detail-img')); ?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-10 col-md-offset-1 add-comment">
         <div class="row" style="padding-bottom: 35px; border-bottom: 1px solid white;">
            <div class="col-md-2">
               <span><b>Rating:</b></span>
               <span class="glyphicon glyphicon-star"></span>
               <span class="glyphicon glyphicon-star"></span>
               <span class="glyphicon glyphicon-star"></span>
               <span class="glyphicon glyphicon-star"></span>
               <span class="glyphicon glyphicon-star"></span>
            </div>
            <div class="col-md-4 col-md-offset-1">
               <span>
                  <b>Tags:</b> #Eero#bsdk#gvdafdgsd
               </span>
            </div>
         </div>
         <div class="row" style="margin-top: 20px;">
            <div class="col-md-8">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <?php 
                           for($x=0;$x<count($comments);$x++) {
                              echo "<div class='col-md-12 comment'>";
                              echo $this->Html->image($users[$x]['User']['profilepic'], array('alt' => '...', 
                                                                                              'class' => 'smallpic', 
                                                                                              'style' => 'width: 50px; height: 50px;'));
                              echo "<span><b>    ";
                              echo $users[$x]['User']['name'] . ": ";
                              echo "</b></span>";
                              echo "<span>";
                              echo $comments[$x]['Comment']['comment'];
                              echo "</span>";
                              echo "</div>";
                           }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3" style="margin-left: 20px;">

               <?php echo $this->Form->create('Comment', array('class' => 'form',
                                                               'url'=>array('controller'=>'comments','action'=>'add'))); ?>
               <div class="form-group">
  
               <?php echo $this->Form->input('photo_id', array('type' => 'hidden', 
                                                               'value' => $photo['Photo']['id']));
                     echo $this->Form->input('comment', array('label' => 'Leave a comment:', 
                                                              'class' => 'form-control')); ?>
               </div>
               <?php echo $this->Form->end(array( 'class' => 'btn btn-default',
                                                  'label' => 'Submit')); ?>
         </div>
      </div>
   </div>
</div>




