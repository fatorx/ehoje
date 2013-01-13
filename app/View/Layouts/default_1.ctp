<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Sistema de gestao financeira pessoal.');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
                echo $this->Html->css('style');
               
                
                echo $this->Html->script('plugins/jquery-1.7.min');
                echo $this->Html->script('plugins/jquery-ui-1.8.16.custom.min');
                echo $this->Html->script('plugins/jquery.flot.min');
                echo $this->Html->script('plugins/jquery.flot.resize.min');
                echo $this->Html->script('plugins/jquery.validate.min');
                echo $this->Html->script('plugins/ui.spinner');
                
                
                echo $this->Html->script('custom/general');
                echo $this->Html->script('custom/form');
                echo $this->Html->script('jquery-functions');
                

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
 <?php if ( !$this->Session->read('user') ) { ?>  
    <body class="login">
 <?php } else { ?>
    <body class="loggedin">    

    
    <!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">
            <a href="">
                <?php echo $this->Html->image('starlight_admin_template_logo_small.png'); ?>
            </a>
            <div class="headright">Notificatio
            
            <div id="notiPanel" class="headercolumn">
                    <div class="notiwrapper">
                        <a href="ajax/messages.php" class="notialert radius2">2</a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current" style="width:100%"><a href="#" class="msg">Pendências (2)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="noticonten">
                                teste
                            </div><!--noticontent-->
                        </div><!--notibox-->
                    </div><!--notiwrapper-->
                </div><!--headercolumn--> 
                
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                        <?php echo $this->Html->image('avatar.png', array('class' => 'radius2')); ?>
                        <?php $user = $this->Session->read( 'user.nome' ); ?>
                        <span><strong><?php echo $user ?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><?php echo $this->Html->link( 'Configurações', '/configuracoes/'); ?></li>
                            <li><?php echo $this->Html->link( 'Sair', '/usuarios/logout'); ?></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
    <?php } ?>
        <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
        
        <?php if ( $this->Session->read('user') ) { ?>    
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<div class="leftmenu">
                    
                    <?php 
                        $currentDespesas = strpos( $_SERVER['REQUEST_URI'] , '/despesas/nova' ) !== false || strpos( $_SERVER['REQUEST_URI'] , '/despesas/relatorio' ) !== false ? 'current' : '';        
                        $currentReceitas = strpos( $_SERVER['REQUEST_URI'] , '/receitas/' ) !== false || strpos( $_SERVER['REQUEST_URI'] , '/receitas/nova_receita' ) !== false ? 'current' : '';
                    ?>
                    <ul>
                        <li class="<?php echo $currentDespesas; ?>">
                            <a href="#" class="tables menudrop false"><span>Despesas</span></a>                        	
                            <ul>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Relatório'),'/despesas/relatorio/',array('class'=>'tables','escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Adicionar despesa'),'/despesas/nova/',array('class'=>'tables','escape'=>false)); ?></li>   
                            </ul>
                        </li>
                        
                        <li class="<?php echo $currentReceitas; ?>">
                            <a href="#" class="widgets menudrop false"><span>Receitas</span></a>                        	
                            <ul>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Nova receita'),'/receitas/nova/',array('class'=>'tables','escape'=>false)); ?></li>
                                
                            </ul>
                        </li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        <?php } ?>
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
        </div>
            
		<div class="footer">
                    <p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="">ThemePixels.com</a></p>
                </div><!--footer-->
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
