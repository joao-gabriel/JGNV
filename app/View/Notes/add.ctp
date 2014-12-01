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
  <a name="form-note"></a>
  <?php echo $this->Form->create('Note'); ?>
  <fieldset>
    <legend><?php echo __('Add Note'); ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('content');
    ?>
  </fieldset>
  <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>

    <li><?php echo $this->Html->link(__('List Notes'), array('action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
  </ul>
</div>
