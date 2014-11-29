<div class="projectsTasks view">
<h2><?php echo __('Projects Task'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectsTask['ProjectsTask']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectsTask['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectsTask['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectsTask['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $projectsTask['Task']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projects Task'), array('action' => 'edit', $projectsTask['ProjectsTask']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Projects Task'), array('action' => 'delete', $projectsTask['ProjectsTask']['id']), array(), __('Are you sure you want to delete # %s?', $projectsTask['ProjectsTask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects Tasks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projects Task'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
