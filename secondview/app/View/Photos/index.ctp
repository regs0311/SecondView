<script>
  $(document).ready(function() 
  {
    $(".arrow").each(function() {
      $(this).css("height", $( document ).height() - 100); 
    });
    $(".pic").each(function() {
      $(this).css("height", $( document ).height() - 100); 
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
    <?php echo $this->element('sidebar');?>
    <?php echo $this->element('photosCarousel'); ?>
 </div> <!-- row -->
</div> <!-- container fluid navbar  -->
<?php echo $this->element('modals');?>

