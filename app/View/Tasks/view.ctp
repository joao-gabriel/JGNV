<div class="tasks view">
  <h2><?php echo __('Task'); ?></h2>

  <h3><?php echo h($task['Task']['name']); ?></h3>

  <p>
    <strong>Description:</strong><br />
    <?php echo h(nl2br($task['Task']['description'])); ?>
  </p>

  <p>
    <strong>This task has been worked for:</strong><br />
    <?php echo date('H',strtotime($task['totalTimeElapsed'])); ?> hours, 
    <?php echo date('i',strtotime($task['totalTimeElapsed'])); ?> minutes and 
    <?php echo date('s',strtotime($task['totalTimeElapsed'])); ?> seconds
  </p>
  
  
  <p>
    <strong>You've been working in this task for:</strong><br />
    <?php echo date('H',strtotime($task['userTimeElapsed'])); ?> hours, 
    <?php echo date('i',strtotime($task['userTimeElapsed'])); ?> minutes and 
    <?php echo date('s',strtotime($task['userTimeElapsed'])); ?> seconds
  </p>

  <dl class="bottom30">
    <dt><?php echo __('Created by'); ?></dt>
    <dd>
      <?php echo $this->Html->link($task['User']['name'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Project'); ?></dt>
    <dd>
      <?php echo $this->Html->link($task['Project']['name'], array('controller' => 'projects', 'action' => 'view', $task['Project']['id'])); ?>
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
      <?php
      $status = unserialize(_TASK_STATUS);
      echo h($status[$task['Task']['status']]);
      ?>
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
</div>

<?php
echo $this->Form->postLink(
        'Mark this Task as finished', array('action' => 'finish', $task['Task']['id']), array('class' => 'btn btn-success'), 'Are you sure? This means you consider your job completely done with this task.'
);
?>

<div class="related bottom">
  <h3><?php echo __('Related Notes'); ?></h3>
  <?php if (!empty($task['Note'])): ?>
    <ul>
      <?php foreach ($task['Note'] as $note): ?>
        <li class="bottom30">
          <p>At <?php echo $this->Time->nice($note['created']); ?>, <?php echo $note['User']['name']; ?> wrote: </p>
          <p>
            <strong><?php echo $note['title']; ?></strong><br />
            <?php echo nl2br($note['content']); ?>
          </p>

        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>

    <strong>No Related Notes</strong>
  <?php endif; ?>
  <div class="clearfix bottom10"></div>
  <a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add', $task['Task']['id'], '#' => 'form-note')); ?>">Add Note</a>
</div>