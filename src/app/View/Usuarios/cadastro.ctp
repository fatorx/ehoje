<center>
<h1>Bem vindo(a) ao E hoje?</h1>
<br clear="all" />
<h3>Sistema de controle de finanças pessoais</h3>
<br />
<h3>Para utilizar nosso sistema basta informar seu nome, email e senha. Uso gratuíto!</h3>

<br clear="all"/><br /><br />

                    
<br />
                    
<?php echo $this->Form->create('Usuario', array('class' => 'stdform', 'enctype' => 'multipart/form-data')); ?>

    <p>
       <?php echo $this->Form->input('nome', array('maxlength' => 255, 'class' => 'smallinput')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('email', array('maxlength' => 255, 'class' => 'smallinput')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('senha', array('type' => 'password',  'class' => 'smallinput')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('verifica_senha', array('type' => 'password', 'label' => 'Repita a senha',  'class' => 'smallinput')); ?>
    </p>

    <p>
        Imagem (seu avatar)&nbsp;&nbsp;
        <a href="" onclick="javascript: $('#UsuarioAvatar').click();" class="btn btn_archive"><span>Imagem</span></a>
        <div style="display:none;">
            <?php echo $this->Form->input('avatar', array('type' => 'file', 'label' => 'Imagem (Seu avatar)')); ?>
        </div>    
    </p>
    <br clear="all" />
    <p class="stdformbutton">
            <button class="submit radius2">Finalizar cadastro</button>
    </p>

<?php echo $this->Form->end(); ?>  
    
    <font color="red">*</font> Todos os campos são de preenchimento obrigatório.                  
                  
<br clear="all" /><br />
</center>
