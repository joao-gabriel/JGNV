<div class="users view">
  <h2><?php echo __('Dashboard'); ?></h2>


  <div class="related bottom30">
    <h3><?php echo __('Your Recent Activity'); ?></h3>
    <?php
    if (!empty($user['Activity'])):
      $activitiesTypes = unserialize(_ACTIVITIES_TYPES);
      ?>
      <table cellpadding = "0" cellspacing = "0">
        <tr>
          <th><?php echo __('What'); ?></th>
          <th><?php echo __('When'); ?></th>
          <th><?php echo __('From'); ?></th>
        </tr>
        <?php foreach ($user['Activity'] as $activity): ?>
          <tr>
            <td><?php echo $activitiesTypes[$activity['type']]; ?></td>
            <td><?php echo $this->Time->nice($activity['created']); ?></td>
            <td><?php echo $activity['from']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

      <a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'activities', 'index', AuthComponent::user('id'))); ?>">View more Activities</a>
    <?php else: ?>
      <strong>No Recent Activities</strong>
    <?php endif; ?>
  </div>

  <div class="related bottom30 wall">
    <h3><?php echo __('Last Tasks assigned to You'); ?></h3>
    <?php if (!empty($user['Taskto'])): ?>
      <table cellpadding = "0" cellspacing = "0">
        <tr>
          <th><?php echo __('Name'); ?></th>
          <th><?php echo __('Expected Start Date'); ?></th>
          <th><?php echo __('Expected Deadline'); ?></th>
          <th><?php echo __('Status'); ?></th>
          <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($user['Taskto'] as $task): ?>
          <tr>
            <td><?php echo $task['name']; ?></td>
            <td><?php echo $this->Time->nice($task['expected_start_date']); ?></td>
            <td><?php echo $this->Time->nice($task['expected_deadline']); ?></td>
            <td><?php echo $task['status']; ?></td>
            <td class="actions">
              <?php echo $this->Html->link(__('More Details'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?> |
              <a class="task_start_btn" href="javascript:void(0);" data-id='<?php echo $task['id']; ?>'>Work on it</a>

            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'tasks', 'index', AuthComponent::user('id'))); ?>">View more Tasks</a>
    <?php else: ?>
      <strong>No Tasks Assigned to User</strong>
    <?php endif; ?>
  </div>