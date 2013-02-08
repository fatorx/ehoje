<center>
<h1>Bem vindo(a) ao E hoje?</h1>
<h4>Sistema de controle de finanças pessoais</h4>
<br /><br />
<h4>Para utilizar nosso sistema basta informar seu nome, email e senha. Uso gratuíto!</h4>

<br clear="all"/><br /><br />

                    
<br />
                    
<?php echo $this->Form->create('Usuario', array('class' => 'stdform', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return validaNewUser();')); ?>

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
        <?php echo $this->Form->input('avatar', array('type' => 'file', 'label' => 'Imagem (Seu avatar)',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Finalizar cadastro</button>
    </p>

<?php echo $this->Form->end(); ?>  
    
    <font color="red">*</font> Todos os campos são de preenchimento obrigatório.                  
                  
<br clear="all" /><br />
</center>

<script>
    function validaNewUser(){
        if ( jQuery("#UsuarioNome").val() == "") {
            alert("Por favor preencha o seu nome");
            jQuery("#UsuarioNome").focus();
            return false;
        } 
        
        if ( jQuery("#UsuarioEmail").val() == "") {
            alert("Por favor preencha o seu email");
            jQuery("#UsuarioEmail").focus();
            return false;
        } else {
            
        }
        
        if ( jQuery("#UsuarioSenha").val() == "" ) {
            alert("Por favor defina sua senha");
            jQuery("#UsuarioSenha").focus();
            return false;
        } else {
            if ( jQuery("#UsuarioSenha").val() != jQuery("#UsuarioVerificaSenha").val() ) {
                alert("As senhas informadas não conferem");
                jQuery("#UsuarioVerificaSenha").focus();
                return false;
            }
        }
        
    
}
</script>