<div class="users view">
  <h2><?php echo __('Dashboard'); ?></h2>
  <div class="related bottom30">
    <h3><?php echo __('Your Recent Activity'); ?></h3>
    <?php
    if (!empty($user['ActivityOwned'])):
      $activitiesTypes = unserialize(_ACTIVITIES_TYPES);
      ?>
      <table cellpadding = "0" cellspacing = "0">
        <tr>
          <th><?php echo __('What'); ?></th>
          <th><?php echo __('When'); ?></th>
          <th><?php echo __('From'); ?></th>
        </tr>
        <?php foreach ($user['ActivityOwned'] as $activity): ?>
          <tr>
            <td>
              <?php
              echo $activitiesTypes[$activity['type']];
              if (!is_null($activity[0]['TaskName'])) {
                echo ' "' . $this->Html->link($activity[0]['TaskName'], array('controller' => 'tasks', 'action' => 'view', $activity['model_id'])) . '"';
              }
              ?>
            </td>
            <td><?php echo $this->Time->nice($activity['created']); ?></td>
            <td><?php echo $activity['from']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

      <a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'activities', AuthComponent::user('id'))); ?>">View more Activities</a>
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
        <?php
        foreach ($user['Taskto'] as $task):
          $statusList = unserialize(_TASK_STATUS);
          ?>
          <tr>
            <td><?php echo $task['name']; ?></td>
            <td><?php echo $this->Time->nice($task['expected_start_date']); ?></td>
            <td><?php echo $this->Time->nice($task['expected_deadline']); ?></td>
            <td><?php echo $statusList[$task['status']]; ?></td>
            <td class="actions">
              <?php echo $this->Html->link(__('More Details'), array('controller' => 'tasks', 'action' => 'view', $task['id']), array('class' => 'btn btn-info')); ?> 
              <?php
              if ($task['status'] == _TASK_STATUS_RUNNING) {
                echo $this->Form->postLink('Pause', array('controller' => 'tasks', 'action' => 'pause', $task['id']), array('class' => 'btn btn-danger'), 'Are You Sure?');
              } else {
                echo $this->Form->postLink('Work on it', array('controller' => 'tasks', 'action' => 'start', $task['id']), array('class' => 'btn btn-success'), 'Are You Sure?');
              }
              ?>


            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'tasks', 'index', AuthComponent::user('id'))); ?>">View more Tasks</a>
    <?php else: ?>
      <strong>No Tasks Assigned to User</strong>
    <?php endif; ?>
  </div>
</div>