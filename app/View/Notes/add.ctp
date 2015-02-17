<div class="notes form">


  <h2><?php echo __('Task'); ?></h2>

  <dl class="bottom30">
    <dt><?php echo __('Id'); ?></dt>
    <dd>
      <?php echo h($task['Task']['id']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('User'); ?></dt>
    <dd>
      <?php echo $this->Html->link($task['User']['name'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Project'); ?></dt>
    <dd>
      <?php echo $this->Html->link($task['Project']['name'], array('controller' => 'projects', 'action' => 'view', $task['Project']['id'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Name'); ?></dt>
    <dd>
      <?php echo h($task['Task']['name']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Description'); ?></dt>
    <dd>
      <?php echo h($task['Task']['description']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Expected Start Date'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($task['Task']['expected_start_date'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Expected Deadline'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($task['Task']['expected_deadline'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Start Date'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($task['Task']['start_date'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Finish Date'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($task['Task']['finish_date'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Status'); ?></dt>
    <dd>
      <?php echo h($task['Task']['status']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Created'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($task['Task']['created'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Modified'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($task['Task']['modified'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('User in charge'); ?></dt>
    <dd>
      <?php echo $this->Html->link($task['Recipient']['name'], array('controller' => 'users', 'action' => 'view', $task['Recipient']['id'])); ?>
      &nbsp;
    </dd>
  </dl>
  <div class="clearfix"></div>
  <a name="form-note"></a>
  <?php echo $this->Form->create('Note'); ?>
  <fieldset>
    <legend><?php echo __('Add Note'); ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('content');
    ?>
    <div class="col-lg-9">
      <?php
      echo $this->Form->input('Create Note', array(
          'type' => 'submit',
          'label' => false,
          'class' => 'btn btn-info pull-left',
          'div' => false
              )
      );
      echo $this->Form->end();

      echo $this->Form->postLink('Cancel', array('controller' => 'tasks', 'action' => 'view', $task['Task']['id']), array('class' => 'btn btn-danger ml20 pull-left'), "Are you Sure?");
      ?>    
    </div>
  </fieldset>


</div>
<div class="clearfix"></div>
