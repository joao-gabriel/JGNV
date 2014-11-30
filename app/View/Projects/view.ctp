<div class="projects view">
  <h2><?php echo __('Project'); ?></h2>
  <dl class="bottom30">
    <dt><?php echo __('Id'); ?></dt>
    <dd>
      <?php echo h($project['Project']['id']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Client'); ?></dt>
    <dd>
      <?php echo $this->Html->link($project['Client']['name'], array('controller' => 'clients', 'action' => 'view', $project['Client']['id'])); ?>
      &nbsp;
    </dd>    

    <dt><?php echo __('User'); ?></dt>
    <dd>
      <?php echo $this->Html->link($project['Author']['name'], array('controller' => 'users', 'action' => 'view', $project['Author']['id'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Name'); ?></dt>
    <dd>
      <?php echo h($project['Project']['name']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Description'); ?></dt>
    <dd>
      <?php echo h($project['Project']['description']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Expected Start Date'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($project['Project']['expected_start_date'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Expected Deadline'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($project['Project']['expected_deadline'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Start Date'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($project['Project']['start_date'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Finish Date'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($project['Project']['finish_date'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Status'); ?></dt>
    <dd>
      <?php echo h($project['Project']['status']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Created'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($project['Project']['created'])); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Modified'); ?></dt>
    <dd>
      <?php echo $this->Time->nice(h($project['Project']['modified'])); ?>
      &nbsp;
    </dd>
  </dl>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
    <li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), array(), __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
    <li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
  </ul>
</div>
<div class="related bottom30">
  <h3><?php echo __('Related Users'); ?></h3>
  <?php if (!empty($project['User'])): ?>
    <table cellpadding = "0" cellspacing = "0">
      <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('Name'); ?></th>
        <th><?php echo __('Email'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
      </tr>
      <?php foreach ($project['User'] as $user): ?>
        <tr>
          <td><?php echo $user['id']; ?></td>
          <td><?php echo $user['name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td class="actions">
            <?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
            <?php if (AuthComponent::user('role') == 'admin') { ?>
              <?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
              <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
            <?php } ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <strong>No Related Users</strong>
  <?php endif; ?>
</div>


<div class="related bottom30">
  <h3><?php echo __('Related Tasks'); ?></h3>
  <?php if (!empty($project['Task'])): ?>
    <table cellpadding = "0" cellspacing = "0">
      <tr>
        <th><?php echo __('Name'); ?></th>
        <th><?php echo __('Expected Start Date'); ?></th>
        <th><?php echo __('Expected Deadline Date'); ?></th>
        <th><?php echo __('Start Date'); ?></th>
        <th><?php echo __('Finish Date'); ?></th>
        <th><?php echo __('Status'); ?></th>
        <th><?php echo __('Created'); ?></th>
        <th><?php echo __('Modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
      </tr>
      <?php foreach ($project['Task'] as $task): ?>
        <tr>
          <td><?php echo h($task['name']); ?>&nbsp;</td>
          <td><?php echo $this->Time->nice(h($task['expected_start_date'])); ?>&nbsp;</td>
          <td><?php echo $this->Time->nice(h($task['expected_deadline'])); ?>&nbsp;</td>
          <td><?php echo $this->Time->nice(h($task['start_date'])); ?>&nbsp;</td>
          <td><?php echo $this->Time->nice(h($task['finish_date'])); ?>&nbsp;</td>
          <td><?php echo h($task['status']); ?>&nbsp;</td>
          <td><?php echo $this->Time->nice(h($task['created'])); ?>&nbsp;</td>
          <td><?php echo $this->Time->nice(h($task['modified'])); ?>&nbsp;</td>
          <td class="actions">
            <?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
            <?php if (AuthComponent::user('role') == 'admin') { ?>
              <?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
              <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array(), __('Are you sure you want to delete # %s?', $task['id'])); ?>
            <?php } ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <strong>No Related Tasks</strong>
  <?php endif; ?>
</div>
