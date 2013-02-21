<center>
<h1>Bem vindo(a) ao E hoje?</h1>
<br clear="all" />
<h4>Para utilizar nosso sistema basta informar seu nome, email e senha. Uso gratuíto!</h4>

<br clear="all"/><br />
<h3>Seja o próximo a utilizar, já somos <?php echo number_format($usuarios,0,'','.'); ?>!</h3>
<br />

                    
<br />
                    
<?php echo $this->Form->create('Usuario', array('class' => 'stdform', 'enctype' => 'multipart/form-data')); ?>

    <p>
       <?php echo $this->Form->input('nome', array('maxlength' => 255, 'class' => 'smallinput')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('email', array('maxlength' => 255, 'class' => 'smallinput', 'type' => 'email')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('senha', array('type' => 'password',  'class' => 'smallinput')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('verifica_senha', array('type' => 'password', 'label' => 'Repita a senha',  'class' => 'smallinput')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('avatar', array('type' => 'file', 'label' => 'Imagem (Seu avatar)')); ?>
    </p>
    <br clear="all" />
    <p class="stdformbutton">
            <button class="submit radius2">Finalizar cadastro</button>
    </p>

<?php echo $this->Form->end(); ?>  
    
    <font color="red">*</font> Todos os campos são de preenchimento obrigatório.                  
                  
<br clear="all" /><br />
</center>
