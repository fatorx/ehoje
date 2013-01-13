<div class="relatorio index">
    <h2>Aqui será exibido um relatório</h2>
    
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Adicionar receita'), array('controller' => 'receitas',  'action' => 'adicionar')); ?></li>
                <li><?php echo $this->Html->link(__('Adicionar despesa'), array('controller' => 'despesas',  'action' => 'adicionar')); ?></li>
	</ul>
</div>
