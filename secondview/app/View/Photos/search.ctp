<script>
  $(document).ready(function() 
  {
    $(".arrow").each(function() {
      $(this).css("height", $( document ).height() - 170); 
    });
    $(".usersidebar").each(function() {
      $(this).css("height", $( document ).height() - 220); 
    });
    $(".pic").each(function() {
      $(this).css("height", $( document ).height() - 170); 
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
	<?php echo $this->element('searchUser');?>
	<?php echo $this->element('searchPhotos'); ?>
  </div>
</div>
<?php echo $this->element('modals');?>
