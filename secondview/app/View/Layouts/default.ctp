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
      echo $this->Html->script('swipe.js');
      echo $this->Html->script('jquery.mobile.custom.min.js');
    ?>
  </head>
  <body>
    <div id="container">
      <div id="header"></div>
      <div id="content">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>	
              <span class="icon-bar"></span>	
              <span class="icon-bar"></span>	
            </button>
            <a class="navbar-brand" rel="home" href="/secondview/photos/index" title="label">Second View</a>
          </div>		
          <?php if($this->Session->read('Auth.User')) { ?>
            <div class='collapse navbar-collapse navbar-ex1-collapse'>
              <ul class='nav navbar-nav'>
                <li><a href='/secondview/users/view/<?php echo AuthComponent::user('id') ?>'>Profile</a></li>
                <li><a href='#'>About</a></li>   
              </ul>
              <div class="col-md-3 pull-right">
                <form class="navbar-form" role="search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="srch-word" id="srch"/>
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="Submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>	
                  </div> 
                </form>
              </div>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='/secondview/users/logout'><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>    
              </ul>
            </div>           
          <?php } ?>
        </div>
        <?php echo $this->fetch('content'); ?>
      </div> <!-- content -->
    </div> <!-- container -->
  </body>
</html>
