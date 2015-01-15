<div class="tasks view">
  <h2><?php echo __('Task'); ?></h2>
  
  <h3><?php echo h($task['Task']['name']); ?></h3>
  
  <p>
     <?php echo h(nl2br($task['Task']['description'])); ?>
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
        'Mark this Task as finished', 
        array('action' => 'finish', $task['Task']['id']), 
        array('class' => 'btn btn-success'), 
        'Are you sure? This means you consider your job completely done with this task.'
);
?>

<div class="related bottom">
  <h3><?php echo __('Related Notes'); ?></h3>
<?php if (!empty($task['Note'])): ?>
    <table cellpadding = "0" cellspacing = "0">
      <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('User Id'); ?></th>
        <th><?php echo __('Task Id'); ?></th>
        <th><?php echo __('Title'); ?></th>
        <th><?php echo __('Content'); ?></th>
        <th><?php echo __('Status'); ?></th>
        <th><?php echo __('Created'); ?></th>
        <th><?php echo __('Modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
      </tr>
  <?php foreach ($task['Note'] as $note): ?>
        <tr>
          <td><?php echo $note['id']; ?></td>
          <td><?php echo $note['user_id']; ?></td>
          <td><?php echo $note['task_id']; ?></td>
          <td><?php echo $note['title']; ?></td>
          <td><?php echo $note['content']; ?></td>
          <td><?php echo $note['status']; ?></td>
          <td><?php echo $this->Time->nice($note['created']); ?></td>
          <td><?php echo $this->Time->nice($note['modified']); ?></td>
          <td class="actions">
    <?php echo $this->Html->link(__('View'), array('controller' => 'notes', 'action' => 'view', $note['id'])); ?>
    <?php echo $this->Html->link(__('Edit'), array('controller' => 'notes', 'action' => 'edit', $note['id'])); ?>
    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notes', 'action' => 'delete', $note['id']), array(), __('Are you sure you want to delete # %s?', $note['id'])); ?>
          </td>
        </tr>
          <?php endforeach; ?>
    </table>
<?php else: ?>

    <strong>No Related Notes</strong>
  <?php endif; ?>
  <div class="clearfix bottom10"></div>
  <a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add', $task['Task']['id'], '#' => 'form-note')); ?>">Add Note</a>
</div>