<div class="users view">
  <h2><?php echo __('User'); ?></h2>
  <dl class="bottom30">
    <dt><?php echo __('Id'); ?></dt>
    <dd>
      <?php echo h($user['User']['id']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Username'); ?></dt>
    <dd>
      <?php echo h($user['User']['username']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Role'); ?></dt>
    <dd>
      <?php echo h($user['User']['role']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Name'); ?></dt>
    <dd>
      <?php echo h($user['User']['name']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Email'); ?></dt>
    <dd>
      <?php echo h($user['User']['email']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Created'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($user['User']['created'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Modified'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($user['User']['modified'])); ?>
      &nbsp;
    </dd>
  </dl>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
    <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
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
<div class="related bottom30">
  <h3><?php echo __('Related Notes'); ?></h3>
  <?php if (!empty($user['Note'])): ?>
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
      <?php foreach ($user['Note'] as $note): ?>
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
</div>
<div class="related bottom30">
  <h3><?php echo __('Projects created by User'); ?></h3>
  <?php if (!empty($user['Project'])): ?>
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
      <?php foreach ($user['Project'] as $project): ?>
        <tr>
          <td><?php echo $project['id']; ?></td>
          <td><?php echo $project['user_id']; ?></td>
          <td><?php echo $project['name']; ?></td>
          <td><?php echo $project['description']; ?></td>
          <td><?php echo $this->Time->nice($project['expected_start_date']); ?></td>
          <td><?php echo $this->Time->nice($project['expected_deadline']); ?></td>
          <td><?php echo $this->Time->nice($project['start_date']); ?></td>
          <td><?php echo $this->Time->nice($project['finish_date']); ?></td>
          <td><?php echo $project['status']; ?></td>
          <td><?php echo $this->Time->nice($project['created']); ?></td>
          <td><?php echo $this->Time->nice($project['modified']); ?></td>
          <td class="actions">
            <?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), array(), __('Are you sure you want to delete # %s?', $project['id'])); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <strong>No Projects Created by User</strong>
  <?php endif; ?>
</div>
<div class="related bottom30">
  <h3><?php echo __('Tasks created by User'); ?></h3>
  <?php if (!empty($user['Task'])): ?>
    <table cellpadding = "0" cellspacing = "0">
      <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('User Id'); ?></th>
        <th><?php echo __('Project Id'); ?></th>
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
      <?php foreach ($user['Task'] as $task): ?>
        <tr>
          <td><?php echo $task['id']; ?></td>
          <td><?php echo $task['user_id']; ?></td>
          <td><?php echo $task['project_id']; ?></td>
          <td><?php echo $task['name']; ?></td>
          <td><?php echo $task['description']; ?></td>
          <td><?php echo $this->Time->nice($task['expected_start_date']); ?></td>
          <td><?php echo $this->Time->nice($task['expected_deadline']); ?></td>
          <td><?php echo $this->Time->nice($task['start_date']); ?></td>
          <td><?php echo $this->Time->nice($task['finish_date']); ?></td>
          <td><?php echo $task['status']; ?></td>
          <td><?php echo $this->Time->nice($task['created']); ?></td>
          <td><?php echo $this->Time->nice($task['modified']); ?></td>
          <td class="actions">
            <?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array(), __('Are you sure you want to delete # %s?', $task['id'])); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <strong>No Tasks Created by User</strong>
  <?php endif; ?>
</div>

<div class="related bottom30">
  <h3><?php echo __('Tasks assigned to User'); ?></h3>
  <?php if (!empty($user['Taskto'])): ?>
    <table cellpadding = "0" cellspacing = "0">
      <tr>
        <th><?php echo __('Id'); ?></th>
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
      <?php foreach ($user['Taskto'] as $task): ?>
        <tr>
          <td><?php echo $task['id']; ?></td>
          <td><?php echo $task['name']; ?></td>
          <td><?php echo $task['description']; ?></td>
          <td><?php echo $this->Time->nice($task['expected_start_date']); ?></td>
          <td><?php echo $this->Time->nice($task['expected_deadline']); ?></td>
          <td><?php echo $this->Time->nice($task['start_date']); ?></td>
          <td><?php echo $this->Time->nice($task['finish_date']); ?></td>
          <td><?php echo $task['status']; ?></td>
          <td><?php echo $this->Time->nice($task['created']); ?></td>
          <td><?php echo $this->Time->nice($task['modified']); ?></td>
          <td class="actions">
            <?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array(), __('Are you sure you want to delete # %s?', $task['id'])); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <strong>No Tasks Assigned to User</strong>
  <?php endif; ?>
</div>

<div class="related bottom30">
  <h3><?php echo __('Related Teams'); ?></h3>
  <?php if (!empty($user['Team'])): ?>
    <table cellpadding = "0" cellspacing = "0">
      <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('Name'); ?></th>
        <th><?php echo __('Description'); ?></th>
        <th><?php echo __('Created'); ?></th>
        <th><?php echo __('Modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
      </tr>
      <?php foreach ($user['Team'] as $team): ?>
        <tr>
          <td><?php echo $team['id']; ?></td>
          <td><?php echo $team['name']; ?></td>
          <td><?php echo $team['description']; ?></td>
          <td><?php echo $this->Time->nice($team['created']); ?></td>
          <td><?php echo $this->Time->nice($team['modified']); ?></td>
          <td class="actions">
            <?php echo $this->Html->link(__('View'), array('controller' => 'teams', 'action' => 'view', $team['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('controller' => 'teams', 'action' => 'edit', $team['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teams', 'action' => 'delete', $team['id']), array(), __('Are you sure you want to delete # %s?', $team['id'])); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <strong>No Related Teams</strong>
  <?php endif; ?>

</div>
