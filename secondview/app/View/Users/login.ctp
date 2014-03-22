	
<div class="jumbotron">
        
	<div class="container">
            
        	<h1 class="jumbotron-header">Second View</h1>
            
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in tristique erat. Proin viverra hendrerit nibh eu pharetra. Proin tincidunt mi quis nulla lacinia, id tempor enim dapibus. Cras suscipit tristique dolor. Etiam feugiat commodo vestibulum. In egestas erat augue. Donec pulvinar hendrerit enim, vitae interdum ipsum pretium id. Aliquam. </p>
            
                <button class="btn btn-default btn-xlarge btn-transp" data-toggle="modal" data-target="#myModal">Login</button>
            
                <!-- Modal -->
                <div class="modal fade" style="overflow-y: auto;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   <div class="modal-dialog modal-custom">
                      <div class="modal-content">
                         <div class="modal-body">
			    <?php echo $this->Session->flash('auth'); ?>
			    <?php echo $this->Form->create('User'); ?>
				<fieldset>
				<legend>
					<?php echo __('Log in or Register'); ?>
				</legend>
				<?php echo $this->Form->input('username');
			  	      echo $this->Form->input('password');
		                ?>
	                        </fieldset>
                                <?php echo $this->Form->end(__('Login')); ?>
                            <form class="form-signin" role="form">
                               <h2 class="form-signin-heading">Please log in or register</h2>
                               <input type="email" class="form-control" placeholder="Email address" required autofocus>
                               <input type="password" class="form-control" placeholder="Password" required>
                               <label class="checkbox"><input type="checkbox" value="remember-me"> Remember me </label>
                               <button class="btn btn-lg btn-primary" type="submit">Login</button>
                               <button class="btn btn-lg btn-success">Register</button>
                            </form>
                         </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                      </div>
                   </div>
                 </div>
            
        </div>
</div>
    
   <div class="footer">
	<span>Copyright @ 2014 SecondView</span>
   </div>
