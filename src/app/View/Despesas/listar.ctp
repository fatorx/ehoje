<ul class="maintabmenu multipletabmenu">
    <li class="current links showFixas"><a href="#">Despesas fixas</a></li>
    <li class="showVariaveis links"><a href="#" >Despesas variáveis</a></li>
    <li class="showExtras links"><a href="#" >Despesas extras</a></li>
</ul><!--maintabmenu-->

<br clear="all"/>

<div class="contenttitle radiusbottom0">
    <h2 class="table"><span>Listando suas últimas 50 despesas cadastradas</span></h2>
</div><!--contenttitle-->
<table cellpadding="0" cellspacing="0" border="0" class="stdtable fixas despesas">
    <thead>
        <tr>
            <th class="head1">Data</th>
            <th class="head0">Valor</th>
            <th class="head1">Tipo</th>
            <th class="head1">Descrição</th>
            <th class="head0">Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="head1">Data</th>
            <th class="head0">Valor</th>
            <th class="head1">Tipo</th>
            <th class="head1">Descrição</th>
            <th class="head0">Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
            foreach ($despesasFixas as $despesa): 
                //debug($despesa);
                foreach($categoriasFixas as $categ) {
                    if ( $categ['CategoriasDespesasFixa']['id'] ==  $despesa['DespesasFixa']['id_categoria_despesa_fixa']) {
                        $tipoDespesa = $categ['CategoriasDespesasFixa']['nome'];
                    }
                } ?>
            <tr>
                <td><?php echo date('d/m/Y', strtotime($despesa['DespesasFixa']['data'])); ?>&nbsp;</td>
                <td><?php echo 'R$ '.number_format($despesa['DespesasFixa']['valor'],2,',','.'); ?>&nbsp;</td>
                <td><?php echo $tipoDespesa; ?>&nbsp;</td>
                <td><?php echo h($despesa['DespesasFixa']['descricao']); ?>&nbsp;</td>
                <td>
                        <?php echo $this->Html->link('Editar', '/despesas/editar/'.$despesa['DespesasFixa']['id'].'/f'); ?>
                        &nbsp;|&nbsp;
                        <?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete_fixa', $despesa['DespesasFixa']['id']), null, __('Deseja realmente remover esta despesa fixa?')); ?>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<table cellpadding="0" cellspacing="0" border="0" class="stdtable variaveis despesas" style="display:none;">
    <thead>
        <tr>
            <th class="head1">Data</th>
            <th class="head0">Valor</th>
            <th class="head1">Tipo</th>
            <th class="head1">Descrição</th>
            <th class="head0">Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="head1">Data</th>
            <th class="head0">Valor</th>
            <th class="head1">Tipo</th>
            <th class="head1">Descrição</th>
            <th class="head0">Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
            foreach ($despesasVariaveis as $despesa): 
                foreach($categoriasVariaveis as $categ) {
                    if ( $categ['CategoriasDespesasVariavei']['id'] ==  $despesa['DespesasVariavei']['id_categoria_despesa_variavel']) {
                        $tipoDespesa = $categ['CategoriasDespesasVariavei']['nome'];
                    }
                } ?>
            <tr>
                <td><?php echo date('d/m/Y', strtotime($despesa['DespesasVariavei']['data'])); ?>&nbsp;</td>
                <td><?php echo 'R$ '.number_format($despesa['DespesasVariavei']['valor'],2,',','.'); ?>&nbsp;</td>
                <td><?php echo $tipoDespesa; ?>&nbsp;</td>
                <td><?php echo h($despesa['DespesasVariavei']['descricao']); ?>&nbsp;</td>
                <td>
                        <?php echo $this->Html->link('Editar', '/despesas/editar/'.$despesa['DespesasVariavei']['id'].'/v'); ?>
                        &nbsp;|&nbsp;
                        <?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete_variavel', $despesa['DespesasVariavei']['id']), null, __('Deseja realmente remover esta despesa variável?')); ?>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<table cellpadding="0" cellspacing="0" border="0" class="stdtable extras despesas" style="display:none;">
    <thead>
        <tr>
            <th class="head1">Data</th>
            <th class="head0">Valor</th>
            <th class="head1">Tipo</th>
            <th class="head1">Descrição</th>
            <th class="head0">Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="head1">Data</th>
            <th class="head0">Valor</th>
            <th class="head1">Tipo</th>
            <th class="head1">Descrição</th>
            <th class="head0">Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
            foreach ($despesasExtras as $despesa): 
                //debug($despesa);
                foreach($categoriasExtras as $categ) {
                    if ( $categ['CategoriasDespesasExtra']['id'] ==  $despesa['DespesasExtra']['id_categoria_despesa_extra']) {
                        $tipoDespesa = $categ['CategoriasDespesasExtra']['nome'];
                    }
                } ?>
            <tr>
                <td><?php echo date('d/m/Y', strtotime($despesa['DespesasExtra']['data'])); ?>&nbsp;</td>
                <td><?php echo 'R$ '.number_format($despesa['DespesasExtra']['valor'],2,',','.'); ?>&nbsp;</td>
                <td><?php echo $tipoDespesa; ?>&nbsp;</td>
                <td><?php echo h($despesa['DespesasExtra']['descricao']); ?>&nbsp;</td>
                <td>
                        <?php echo $this->Html->link('Editar', '/despesas/editar/'.$despesa['DespesasExtra']['id'].'/e'); ?>
                        &nbsp;|&nbsp;
                        <?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete_extra', $despesa['DespesasExtra']['id']), null, __('Deseja realmente remover esta despesa extra?')); ?>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>


