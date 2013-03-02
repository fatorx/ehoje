<?php echo $this->Html->link('Visualizar gastos','/despesas/relatorio'); ?>
<div class="contenttitle">
    <h2 class="form"><span>Informe os dados do investimento</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Investimento', array('class' => 'stdform')); ?>

    <p>
        <?php echo $this->Form->input('tipo', array('type' => 'select', 'options' => $investimentos, 'label' => 'Tipo de invesitmento')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('data', array('label' => 'Data', 'type' => 'text', 'class' => 'smallinput', 'id' => 'datepicker', 'value' => date('d/m/Y'))); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('label' => 'Valor', 'type' => 'text',  'class' => 'smallinput')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('descricao', array('label' => 'Descrição',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Registrar investimento</button>
    </p>

<?php echo $this->Form->end(); ?>  

Os campos com <font color="red">*</font> são de preenchimento obrigatório.                
                    
<br clear="all" /><br />
