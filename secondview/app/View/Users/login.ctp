<div class="text-center">
  <?php echo $this->Session->flash();?>
</div>
<div class="jumbotron">
  <div class="container">
    <h1 class="jumbotron-header">Second View</h1>			
    <p>SecondView is a cool and professional way to share your picture with other photographers and
future employers. We won't let your hard work and soul be buried in the sea of selfies and breakfast pictures. Upload your best pictures. Let other people see them. Interact with photographers. With SecondView, you'll see the world in a different way.
    </p>
    <?php if(!$this->Session->read('Auth.User')) { ?>
      <button class="btn btn-default btn-xlarge btn-transp" data-toggle="modal" data-target="#myModal">Login</button>
      <a href='/secondview/users/add' class="btn btn-info btn-xlarge btn-transp">Register</a>	
    <?php } else { ?>	
      <a href="/secondview/photos/index" class="btn btn-success btn-xlarge">Enter</a>
    <?php } ?>
    <!-- Modal -->
    <div class="modal fade" style="overflow-y: auto;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-custom">
        <div class="modal-content">
          <div class="modal-body">
            <div class="users form">
              <form action="/secondview/users/login" id="UserLoginForm" method="post" accept-charset="utf-8" class="form-signin" role="form">
                <div style="display:none;">
                  <input type="hidden" name="_method" value="POST"/>
                </div>	
                <fieldset>
                  <h2 class="form-signin-heading">Please log in</h2>
                  <div class="input text required">
                    <input name="data[User][username]" class="form-control" maxlength="255" type="text" id="UserUsername" placeholder="Username" required="required"/>
                  </div>
                  <br/>
                  <div class="input password required">
                    <input name="data[User][password]" class="form-control" type="password" id="UserPassword" placeholder="Password" required="required"/>
                  </div>	
                </fieldset> 
                <button class="btn btn-lg btn-primary" type="submit">Login</button>
              </form>
            </div> <!-- User form  -->
          </div> <!-- modal body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div> <!-- modal content -->
      </div> <!-- modal dialog modal custom -->
    </div> <!-- modal fade -->	
  </div> <!-- container -->
</div> <!-- jumbotron -->	
<div class="footer">
  <span>Copyright @ 2014 SecondView</span>
</div>
