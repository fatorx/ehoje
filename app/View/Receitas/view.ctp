<div class="receitas view">
<h2><?php  echo __('Receita'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($receita['Receita']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($receita['Receita']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($receita['Receita']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($receita['Receita']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Receita'), array('action' => 'edit', $receita['Receita']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Receita'), array('action' => 'delete', $receita['Receita']['id']), null, __('Are you sure you want to delete # %s?', $receita['Receita']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Receitas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Receita'), array('action' => 'add')); ?> </li>
	</ul>
</div>
