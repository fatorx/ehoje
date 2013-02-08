<div class="loginbox radius3">
	<div class="loginboxinner radius3">
    	<div class="loginheader">
            <h1 class="bebas">Realize seu login</h1>
            <div class="logo" style="right:115px;top:15px;">
                <?php echo $this->Html->image('logo-simples.png', array('width' => '150px')); ?>
            </div>
    	</div><!--loginheader-->
        
        
        <div class="loginform">
            <div class="loginerror" <?php if ( @$erroLogin ) echo "style='display:block;'"; ?>><p>Dados de login inválidos, por favor verifique!</p></div>
            <?php echo $this->Form->create('Usuario', array('id' => 'login')); ?>
            <p>
                <?php echo $this->Form->input( 'email', array('maxlength' => 255, 'class' => 'radius2') ); ?>
            </p>
            <p>
                <?php echo $this->Form->input( 'senha', array('maxlength' => 255, 'type' => 'password', 'class' => 'radio2') ); ?>
            </p>
            <p>
                    <button class="radius3 bebas">Entrar</button>
                    <?php echo $this->Form->end(); ?>
            </p>
            <p>
                <?php echo $this->Html->link('Realizar cadastro', '/usuarios/cadastro'); ?>&nbsp;
            </p>
            v<?php echo EHOJE_VERSION ; ?>
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->

