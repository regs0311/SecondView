<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Second View</title>
	<?php
		echo $this->Html->meta('icon');

                echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('styles.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->script('jquery-2.1.0.js');
		echo $this->Html->script('bootstrap.js');
	?>

</head>
<body>

	<div class="navbar navbar-inverse navbar-static-top" role="navigation">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
               			<span class="icon-bar"></span>	
               		 	<span class="icon-bar"></span>	
               		 	<span class="icon-bar"></span>	
			</button>
			<a class="navbar-brand" rel="home" href="/" title="label">Second View</a>
		</div>
		
		<?php
                  
                if($this->Session->read('Auth.User')) {
		echo "<div class='collapse navbar-collapse navbar-ex1-collapse'>

			<ul class='nav navbar-nav'>
				<li class='active'><a href='#'>Profile</a></li>
				<li><a href='#'>Upload</a></li> 
				<li><a href='#'>About</a></li>
				<li><a href='/users/logout'>Logout</a></li>    
			</ul>

		</div>";
		}
                ?>
	</div>

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>

</body>
</html>
