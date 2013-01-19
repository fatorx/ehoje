<center>
<h1>Bem vindo(a) ao SFP - Sistema de Finanças Pessoais</h1>

<h4>Para utilizar nosso sistema basta informar seu nome, email e senha. Uso gratuíto!</h4>

<br clear="all"/><br /><br />
<div class="contenttitle">
    <h2 class="form"><span>Informe seus dados para poder utilizar nosso sistema</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Usuario', array('class' => 'stdform', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return validaNewUser();')); ?>

    <p>
       <?php echo $this->Form->input('nome', array('label' => 'Nome <font color="red">*</font>', 'maxlength' => 255, 'class' => 'smallinput')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('email', array('label' => 'Email <font color="red">*</font>', 'maxlength' => 255, 'class' => 'smallinput')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('senha', array('type' => 'password', 'label' => 'Senha <font color="red">*</font>',  'class' => 'smallinput')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('verifica_senha', array('type' => 'password', 'label' => 'Repita a senha <font color="red">*</font>',  'class' => 'smallinput')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('avatar', array('type' => 'file', 'label' => 'Imagem',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Finalizar cadastro</button>
    </p>

<?php echo $this->Form->end(); ?>  
    
    Os campos com <font color="red">*</font> são de preenchimento obrigatório.                  
                  
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