<div class="contenttitle">
    <h2 class="form"><span>Editando receita nº <?php echo $this->request->data['Receita']['id']; ?></span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Receita', array('class' => 'stdform')); ?>

    <p>
       <?php echo $this->Form->input('tipo', array('label' => 'Tipo de receita', 'type' => 'select', 'options' => $receitas, 'default' => $this->request->data['Receita']['id_categoria_receita'])); ?>
    </p>

    <p>
        <?php echo $this->Form->input('data', array( 'type' => 'text', 'label' => 'Data',  'class' => 'smallinput', 'id' => 'datepicker', 'value' => date('m/d/Y', strtotime($this->request->data['Receita']['data'])))); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('type' => 'text', 'label' => 'Valor',  'class' => 'smallinput', 'value' => number_format($this->request->data['Receita']['valor'],2,',','.'))); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('descricao', array('label' => 'Descrição',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Gravar alterações</button>
    </p>

<?php echo $this->Form->end(); ?>  
    
    Os campos com <font color="red">*</font> são de preenchimento obrigatório.                  
                  
<br clear="all" /><br />