<div class="contenttitle">
    <h2 class="form"><span>Informe os dados abaixo</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Investimento', array('class' => 'stdform')); ?>

    <p>
        <?php echo $this->Form->input('tipo', array('type' => 'select', 'options' => $investimentos, 'label' => 'Tipo de invesitmento <font color="red">*</font>')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('data', array('label' => 'Data <font color="red">*</font>', 'type' => 'text', 'class' => 'smallinput', 'id' => 'datepicker')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('label' => 'Valor <font color="red">*</font>', 'type' => 'text',  'class' => 'smallinput')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('descricao', array('label' => 'Descrição',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Registrar despesa</button>
    </p>

<?php echo $this->Form->end(); ?>  

Os campos com <font color="red">*</font> são de preenchimento obrigatório.                
                    
<br clear="all" /><br />
