<div class="contenttitle radiusbottom0">
        <h2 class="table"><span>Listando Usuários cadastrados</span></h2>
</div><!--contenttitle-->
<table cellpadding="0" cellspacing="0" border="0" class="stdtable">
    <thead>
        <tr>
            <th class="head1"><?php echo $this->Paginator->sort('id'); ?></th>
            <th class="head0"><?php echo $this->Paginator->sort('nome'); ?></th>
            <th class="head0"><?php echo $this->Paginator->sort('email'); ?></th>
            <th class="head1">Avatar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="head1"><?php echo $this->Paginator->sort('id'); ?></th>
            <th class="head0"><?php echo $this->Paginator->sort('nome'); ?></th>
            <th class="head0"><?php echo $this->Paginator->sort('email'); ?></th>
            <th class="head1">Avatar</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
	foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nome']); ?>&nbsp;</td>
                <td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
		<td><?php
                    $imagem = $usuario['Usuario']['avatar'];
                    $avatar = $this->Html->image('avatar.png', array('class' => 'radius2'));
                            if (file_exists('img/users/'.$imagem) ) {
                                $avatar = $this->Html->image('users/'.$imagem, array('class' => 'radius2', 'width' => '48px'));
                            }
                            echo $avatar;
                    ?>        
                </td>
	</tr>
<?php endforeach; ?>
    </tbody>
</table>    

<p>
    <?php
        echo $this->Paginator->counter(array(
        'format' => __('Página {:page} de {:pages}, exibindo {:current} de {:count} usuários, iniciando em {:start}, finalizando em {:end}')
        ));
    ?>	
</p>

<div class="paging">
<?php
        echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>

