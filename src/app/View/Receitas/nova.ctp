<?php echo $this->Html->link('Visualizar gastos','/despesas/relatorio'); ?>
<div class="contenttitle">
    <h2 class="form"><span>Informe os dados da receita</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Receita', array('class' => 'stdform')); ?>

    <p>
       <?php echo $this->Form->input('tipo', array('label' => 'Tipo de receita <font color="red">*</font>', 'type' => 'select', 'options' => $receitas)); ?>
    </p>

    <p>
        <?php echo $this->Form->input('data', array( 'type' => 'text', 'label' => 'Data <font color="red">*</font>',  'class' => 'smallinput', 'id' => 'datepicker', 'value' => date('d/m/Y'))); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('type' => 'text', 'label' => 'Valor <font color="red">*</font>',  'class' => 'smallinput')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('descricao', array('label' => 'Descrição',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Registrar receita</button>
    </p>

<?php echo $this->Form->end(); ?>  
    
    Os campos com <font color="red">*</font> são de preenchimento obrigatório.                  
                  
<br clear="all" /><br />