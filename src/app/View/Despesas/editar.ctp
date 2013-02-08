<div class="contenttitle">
    <h2 class="form"><span>Editando despesa Nº <?php echo $this->request->data['Despesa']['id']; ?></span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Despesa', array('class' => 'stdform')); ?>
    <?php echo $this->Form->input('tipo', array('type' => 'hidden', 'value' => $current.$this->request->data['Despesa']['id_categoria'])); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Despesa']['id'])); ?>
    <p>
        <?php echo $this->Form->input('data', array('label' => 'Data <font color="red">*</font>',  'class' => 'smallinput', 'id' => 'datepicker', 'value' => date('m/d/Y', strtotime($this->request->data['Despesa']['data'])))); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('label' => 'Valor <font color="red">*</font>',  'class' => 'smallinput', 'value' => number_format($this->request->data['Despesa']['valor'],2,',','.'))); ?>
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
