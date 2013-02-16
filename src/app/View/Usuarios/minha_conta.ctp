<div class="contenttitle">
    <h2 class="form"><span>Olá, <?php echo $this->request->data['Usuario']['nome']; ?>. Aqui você pode editar suas informações</span></h2>
</div><!--contenttitle-->
<br clear="all" />

<?php echo $this->Form->create('Usuario', array('class' => 'stdform', 'type' => 'file')); ?>
<?php echo $this->Form->input('nome'); ?>
<?php echo $this->Form->input('email'); ?>


<label>Avatar atual </label>
<?php
    $avatar = 'Não há imagem cadastrada';
    if ( strlen($this->request->data['Usuario']['avatar']) > 4 && file_exists('img/users/'.$this->request->data['Usuario']['avatar']) ) {
        $avatar = $this->Html->image('users/'.$this->request->data['Usuario']['avatar'], array('style' => 'width: 128px;'));
    }
?>
<?php echo $avatar; ?>
<br /><br />

<label>Trocar avatar</label>
<?php echo $this->Form->input('avatar', array('type' => 'file', 'label' => '')); ?>

<br clear="all"/>
<?php echo $this->Form->input('senha', array('type' => 'password', 'value' => '', 'label' => 'Alterar senha')); ?>

<br clear="all"/>
<p class="stdformbutton">
            <button class="submit radius2">Gravar alterações</button>
    </p>

<?php echo $this->Form->end(); ?>