<div class="contenttitle radiusbottom0">
        <h2 class="table"><span>Listando seus investimentos já cadastrados</span></h2>
</div><!--contenttitle-->
<table cellpadding="0" cellspacing="0" border="0" class="stdtable">
    <thead>
        <tr>
            <th class="head1"><?php echo $this->Paginator->sort('data'); ?></th>
            <th class="head0"><?php echo $this->Paginator->sort('valor'); ?></th>
            <th class="head1">Tipo</th>
            <th class="head1"><?php echo $this->Paginator->sort('descricao',   'Descrição'); ?></th>
            <th class="head0">Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="head1"><?php echo $this->Paginator->sort('data'); ?></th>
            <th class="head0"><?php echo $this->Paginator->sort('valor'); ?></th>
            <th class="head1">Tipo</th>
            <th class="head1"><?php echo $this->Paginator->sort('descricao',   'Descrição'); ?></th>
            <th class="head0">Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
            foreach ($investimento as $investimento): 
                foreach($categoriaInvestimentos as $categ) {
                    if ( $categ['CategoriasInvestimento']['id'] ==  $investimento['Investimento']['id_categoria_investimento']) {
                        $tipoInvestimento = $categ['CategoriasInvestimento']['nome'];
                    }
                } ?>
            <tr>
                <td><?php echo date('d/m/Y', strtotime($investimento['Investimento']['data'])); ?>&nbsp;</td>
                <td><?php echo 'R$ '.number_format($investimento['Investimento']['valor'],2,',','.'); ?>&nbsp;</td>
                <td><?php echo $tipoInvestimento; ?>&nbsp;</td>
                <td><?php echo h($investimento['Investimento']['descricao']); ?>&nbsp;</td>
                <td>
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'editar_investimento', $investimento['Investimento']['id'])); ?>
                        &nbsp;|&nbsp;
                        <?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete_investimento', $investimento['Investimento']['id']), null, __('Deseja realmente remover este investimento?')); ?>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Página {:page} de {:pages}, exibindo {:current} de {:count} registros encontrados, iniciando em {:start}, finalizando em {:end}')
));
?>	</p>

<div class="paging">
<?php
        echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>

