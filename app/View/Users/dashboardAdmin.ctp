<div class="users view">
  <h2><?php echo __('Dashboard'); ?></h2>


  <div class="related bottom30">
    <h3><?php echo __('Recent Activity'); ?></h3>
    <?php if (!empty($user['Activity'])): ?>
      <table cellpadding = "0" cellspacing = "0">
        <tr>
          <th><?php echo __('Type'); ?></th>
          <th><?php echo __('When'); ?></th>
          <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($user['Activity'] as $activity): ?>
          <tr>
            <td><?php echo $activity['type']; ?></td>
            <td><?php echo $this->Time->nice($activity['created']); ?></td>
            <td class="actions">
              <?php echo $this->Html->link(__('View'), array('controller' => 'activities', 'action' => 'view', $activity['id'])); ?>
              <?php echo $this->Html->link(__('Edit'), array('controller' => 'activities', 'action' => 'edit', $activity['id'])); ?>
              <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'activities', 'action' => 'delete', $activity['id']), array(), __('Are you sure you want to delete # %s?', $activity['id'])); ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <strong>No Recent Activities</strong>
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


  <?php if (AuthComponent::user('role') == 'admin') { ?>

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
  <?php } ?>


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

