<div class="tasks view">
  <h2><?php echo __('Task'); ?></h2>
  <dl>
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
      <?php echo h($task['Task']['expected_start_date']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Expected Deadline'); ?></dt>
    <dd>
      <?php echo h($task['Task']['expected_deadline']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Start Date'); ?></dt>
    <dd>
      <?php echo h($task['Task']['start_date']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Finish Date'); ?></dt>
    <dd>
      <?php echo h($task['Task']['finish_date']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Status'); ?></dt>
    <dd>
      <?php echo h($task['Task']['status']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Created'); ?></dt>
    <dd>
      <?php echo h($task['Task']['created']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Modified'); ?></dt>
    <dd>
      <?php echo h($task['Task']['modified']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Recipient Id'); ?></dt>
    <dd>
      <?php echo h($task['Task']['recipient_id']); ?>
      &nbsp;
    </dd>
  </dl>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Task'), array('action' => 'edit', $task['Task']['id'])); ?> </li>
    <li><?php echo $this->Form->postLink(__('Delete Task'), array('action' => 'delete', $task['Task']['id']), array(), __('Are you sure you want to delete # %s?', $task['Task']['id'])); ?> </li>
    <li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Task'), array('action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
  </ul>
</div>
<div class="related">
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
          <td><?php echo $note['created']; ?></td>
          <td><?php echo $note['modified']; ?></td>
          <td class="actions">
            <?php echo $this->Html->link(__('View'), array('controller' => 'notes', 'action' => 'view', $note['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('controller' => 'notes', 'action' => 'edit', $note['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notes', 'action' => 'delete', $note['id']), array(), __('Are you sure you want to delete # %s?', $note['id'])); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>

  <div class="actions">
    <ul>
      <li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
    </ul>
  </div>
</div>
<div class="related">
  <h3><?php echo __('Related Projects'); ?></h3>
  <?php if (!empty($task['Project'])): ?>
    <table cellpadding = "0" cellspacing = "0">
      <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('User Id'); ?></th>
        <th><?php echo __('Name'); ?></th>
        <th><?php echo __('Description'); ?></th>
        <th><?php echo __('Expected Start Date'); ?></th>
        <th><?php echo __('Expected Deadline'); ?></th>
        <th><?php echo __('Start Date'); ?></th>
        <th><?php echo __('Finish Date'); ?></th>
        <th><?php echo __('Status'); ?></th>
        <th><?php echo __('Created'); ?></th>
        <th><?php echo __('Modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
      </tr>
      <?php
      $project = $task['Project'];
      ?>
      <tr>
        <td><?php echo $project['id']; ?></td>
        <td><?php echo $project['user_id']; ?></td>
        <td><?php echo $project['name']; ?></td>
        <td><?php echo $project['description']; ?></td>
        <td><?php echo $project['expected_start_date']; ?></td>
        <td><?php echo $project['expected_deadline']; ?></td>
        <td><?php echo $project['start_date']; ?></td>
        <td><?php echo $project['finish_date']; ?></td>
        <td><?php echo $project['status']; ?></td>
        <td><?php echo $project['created']; ?></td>
        <td><?php echo $project['modified']; ?></td>
        <td class="actions">
          <?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
          <?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
          <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), array(), __('Are you sure you want to delete # %s?', $project['id'])); ?>
        </td>
      </tr>

    </table>
  <?php endif; ?>

  <div class="actions">
    <ul>
      <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
    </ul>
  </div>
</div>
