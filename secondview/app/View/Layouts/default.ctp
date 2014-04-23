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
          </div> <!-- nav-header -->		
          <div class='collapse navbar-collapse navbar-ex1-collapse'>
            <?php if($this->Session->read('Auth.User')) { ?>
              <ul class='nav navbar-nav'>
                <li><a href='/secondview/users/view/<?php echo AuthComponent::user('id') ?>'>Profile</a></li>
                <li><a href='#'>About</a></li>   
              </ul>
              <span class="btn-group navbar-right" style="top:9px;right:15px">
                <button class="btn btn-default"><i class="glyphicon glyphicon-cog"></i></button>
                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a data-toggle="modal" data-target="#modalChangeProfilePicture">Change Profile Picture</a></li> 
                  <li><a data-toggle="modal" data-target="#modalChangeDescription">Change Description</a></li>
                  <li><a data-toggle="modal" data-target="#modalChangePassword">Change Password</a></li>
                  <li class="divider"></li>
                  <li><a href='/secondview/users/logout'><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                </ul>
              </span>   
            <?php } ?>
            <div class="col-md-3 pull-right">
              <?php echo $this->Form->create('Photo', array('role'   => 'form',
                                                            'url'    => array('controller' => 'photos',       
                                                                              'action'     => 'search'),
                                                            'class'  => 'navbar-form')); 
              ?>
              <div class="input-group">
                <?php echo $this->Form->input('srch-word', array('label'       => false, 
                                                                 'placeholder' => 'Search', 
                                                                 'class'       => 'form-control',
                                                                 'id'          => 'srch',
                                                                 'div'         => false)); ?>
	            <div class="input-group-btn">
	              <button class="btn btn-default" type="Submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
              <?php echo $this->Form->end(); ?>
            </div>
          </div> <!-- collapse navbar-collapse navbar-ex1-collapse-->
        </div> <!-- navbar navbar-inverse navbar-static-top -->  
        <?php echo $this->fetch('content'); ?>      
      </div> <!-- content -->
    </div> <!-- content --> 
  </body>
</html>
