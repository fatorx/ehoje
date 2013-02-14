<div class="contenttitle">
    <h2 class="form"><span>Seja bem vindo(a)! Informe os dados abaixo e nos ajude a melhorar o Ehoje.</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Contato', array('class' => 'stdform')); ?>
<?php echo $this->Form->input('usuario_id', array('type' => 'hidden', 'value' => $this->Session->read('user.id'))); ?>

    <p>
        <?php
            $options = array(   'sugestao' => 'Sugestão',
                                'elogio' => 'Elogio',
                                'duvida' => 'Dúvida',
                                'reclamacao' => 'Reclamação',);
        
        ?>
        <?php echo $this->Form->input('motivo', array('class' => 'smallinput', 'type' => 'select', 'options' => $options)); ?>
    </p>

    <p>
        <?php echo $this->Form->input('descricao', array('label' => 'Descrição', 'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Enviar contato</button>
    </p>

<?php echo $this->Form->end(); ?>  

Os campos com <font color="red">*</font> são de preenchimento obrigatório.                
                    
<br clear="all" /><br />
