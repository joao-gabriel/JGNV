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


    echo $this->Html->css('dashboard');
    echo $this->Html->css('custom.style');

    echo $this->Html->css('bootstrap-datetimepicker');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
    <link rel="stylesheet" type="text/css" media="screen" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />
  </head>
  <body>
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

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <?php echo $this->Session->flash('auth'); ?>

          <?php echo $content_for_layout; ?>

          <div class="actions">
            <h3><?php echo __('Actions'); ?></h3>
            <ul>
              <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
              <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
              <li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
              <li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
              <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
              <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
              <li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
              <li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
              <li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
              <li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
            </ul>
          </div>          


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
    echo $this->Html->script('custom');
    echo $this->fetch('script');
    ?>
  </body>
</html>
