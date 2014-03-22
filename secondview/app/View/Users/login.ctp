	
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
			    <?php echo $this->Session->flash(); ?>
			    <div class="users form">
     			       <form action="/" id="UserLoginForm" method="post" accept-charset="utf-8" class="form-signin" role="form">
      			          <div style="display:none;">
                                     <input type="hidden" name="_method" value="POST"/>
                                  </div>	
                                  <fieldset>
                                     <h2 class="form-signin-heading">Please log in or register</h2>
                                     <div class="input text required">
	                                <input name="data[User][username]" class="form-control" maxlength="255" type="text" id="UserUsername" placeholder="Username" required="required"/>
                                     </div>
                                     <div class="input password required">
	                                <input name="data[User][password]" class="form-control" type="password" id="UserPassword" placeholder="Password" required="required"/>
                                     </div>	
                                  </fieldset> 
                                  <button class="btn btn-lg btn-primary" type="submit">Login</button>
			          <a href='/users/add' class="btn btn-lg btn-success">Register</a>
                               </form>
                            </div>
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
