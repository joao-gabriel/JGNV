<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $this->Html->charset(); ?>
    <title>
      JGNV:
      <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('bootstrap.min');

    echo $this->Html->css('offcanvas');
    echo $this->Html->css('dashboard');
    echo $this->Html->css('custom.style');
    echo $this->Html->css('bootstrap-datetimepicker');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
    <link rel="stylesheet" type="text/css" media="screen" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />
  </head>
  <body>
    
      <button type="button" class="pull-left glyphicon glyphicon-list btn btn-info" id="menu-lateral-btn" data-toggle="offcanvas"></button>
    
    <div class="clearfix"></div>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">JGNV</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">Dashboard</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', AuthComponent::user('id'))); ?>">Profile</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid menu-lateral">
      <div class="row row row-offcanvas row-offcanvas-left">
        <div class="col-md-2 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div>    
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php echo $this->Session->flash('auth'); ?>
          <?php echo $content_for_layout; ?>
          <?php echo $this->element('sql_dump'); ?>
        </div>
      </div> 
    </div> 
    <div class="clearfix"></div>

    <div class='now'>
      <strong>Status:</strong> 
      <?php
      $status = $this->Session->read('Status');
      if (!empty($status)) {
        echo $status;
      } else {
        ?>  
        Doing nothing yet? Time to get to work ;) Take a look at the <a href='<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>'>Dashboard</a> and see if there is a task for you.
        <?php
      }
      ?>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <?php
    echo '<script> window.base_url = "' . Router::url('/', true) . '";</script>';
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('bootstrap-datetimepicker.min');
    echo $this->Html->script('jquery.mask.min');
    echo $this->Html->script('offcanvas');
    echo $this->Html->script('ie10-viewport-bug-workaround');
    echo $this->Html->script('custom');
    echo $this->fetch('script');
    ?>
  </body>
</html>
