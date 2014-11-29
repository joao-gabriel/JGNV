<div class="teamsUsers view">
<h2><?php echo __('Teams User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($teamsUser['TeamsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teamsUser['Team']['name'], array('controller' => 'teams', 'action' => 'view', $teamsUser['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teamsUser['User']['name'], array('controller' => 'users', 'action' => 'view', $teamsUser['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Teams User'), array('action' => 'edit', $teamsUser['TeamsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Teams User'), array('action' => 'delete', $teamsUser['TeamsUser']['id']), array(), __('Are you sure you want to delete # %s?', $teamsUser['TeamsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teams User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
