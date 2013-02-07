<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>E hoje? quanto gastei?</title>

<?php 
                echo $this->Html->css('cake.generic');
                
                echo $this->Html->css('ie7');
                echo $this->Html->css('ie8');
                echo $this->Html->css('style');
                
                echo $this->Html->script('plugins/jquery-1.7.min');
                echo $this->Html->script('plugins/jquery-ui-1.8.16.custom.min');
                echo $this->Html->script('plugins/jquery.flot.min');
                echo $this->Html->script('plugins/jquery.flot.resize.min');
                echo $this->Html->script('plugins/jquery.validate.min');
                echo $this->Html->script('plugins/ui.spinner');
                
                //echo $this->Html->script('custom/tables');
                echo $this->Html->script('custom/general');
                echo $this->Html->script('custom/form');
                echo $this->Html->script('jquery-functions');
                
                echo $this->Html->script('https://www.google.com/jsapi');
                
                
                echo $this->fetch('meta');
                echo $this->fetch('css');
                echo $this->fetch('script');

?>
</head>
<?php if ( $this->Session->read('user')  || strpos( $_SERVER['REQUEST_URI'] , '/usuarios/cadastro' ) !== false ){ ?>
    <body class="loggedin">
<?php        
} else { ?>
    <body class="login">
<?php        
} ?>
        
        <?php if ( $this->Session->read('user') ) { ?>
	<!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">
            <a href="">
                <?php echo $this->Html->image('logo-header.png'); ?> 
            </a>
            &nbsp; v1.0.0
            <div class="headright">
            
            <div id="notiPanel" class="headercolumn" style="display:none;">
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
                        <?php $user = $this->Session->read( 'user.nome' ); ?>
                        <?php $email = $this->Session->read('user.email'); ?>
                        <?php  
                            if (file_exists('img/users/'.$user.'.jpg') ) {
                                echo $this->Html->image('users/'.$user.'.jpg', array('class' => 'radius2', 'width' => '25px', 'height' => '25px'));
                            } else {
                                echo $this->Html->image('avatar.png', array('class' => 'radius2'));
                            }
                        ?>     
                        <span><strong><?php echo $user ?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><?php echo $this->Html->link( 'Sair', '/usuarios/logout'); ?></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
           
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<div class="leftmenu">
                    
                    <?php 
                        $currentDespesas = strpos( $_SERVER['REQUEST_URI'] , '/despesas/nova' ) !== false ? 'current' : '';        
                        $currentReceitas = strpos( $_SERVER['REQUEST_URI'] , '/receitas/' ) !== false || strpos( $_SERVER['REQUEST_URI'] , '/receitas/nova_receita' ) !== false || strpos( $_SERVER['REQUEST_URI'] , '/receitas/listar/' ) !== false ? 'current' : '';
                        $currentRelatorios = strpos( $_SERVER['REQUEST_URI'] , '/despesas/relatorio' ) !== false ? 'current' : '';
                        $currentInvestimentos = strpos( $_SERVER['REQUEST_URI'] , '/despesas/investimento/' ) !== false ? 'current' : '';
                    ?>
                    <ul>
                        <li class="<?php echo $currentDespesas; ?>">
                            <a href="#" class="tables menudrop false"><span>Despesas</span></a>                        	
                            <ul>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Adicionar despesa'),'/despesas/nova/',array('class'=>'tables','escape'=>false)); ?></li>   
                                <!--<li><?php //echo $this->Html->link($this->Html->tag('span','Listar despesas'),'/despesas/listar/',array('class'=>'tables','escape'=>false)); ?></li> -->  
                            </ul>
                        </li>
                        
                        <li class="<?php echo $currentReceitas; ?>">
                            <a href="#" class="widgets menudrop false"><span>Receitas</span></a>                        	
                            <ul>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Nova receita'),'/receitas/nova/',array('class'=>'tables','escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Listar receitas'),'/receitas/listar/',array('class'=>'tables','escape'=>false)); ?></li>
                            </ul>
                        </li>
                        
                        <li class="<?php echo $currentInvestimentos; ?>">
                            <a href="#" class="elements menudrop false"><span>Investimentos</span></a>                        	
                            <ul>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Novo investimento'),'/despesas/investimento/',array('class'=>'tables','escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Listar investimentos'),'/despesas/listar_investimentos/',array('class'=>'tables','escape'=>false)); ?></li>
                            </ul>
                        </li>
                        
                        <li class="<?php echo $currentRelatorios; ?>">
                            <a href="#" class="charts menudrop false"><span>Relatórios</span></a>                        	
                            <ul>
                                <li><?php echo $this->Html->link($this->Html->tag('span','Relatório geral'),'/despesas/relatorio/',array('class'=>'tables','escape'=>false)); ?></li> 
                            </ul>
                        </li>
                    </ul>
                        
                </div><!--leftmenu-->
                
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        
        <div class="maincontent noright">  
            <div class="maincontentinner">
                <div class="content">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?> 
                </div><!--content-->

            </div><!--maincontentinner-->
            
            <div class="footer">
                <p>Criado por Andre Cardoso</p>
            </div><!--footer-->
            
        </div><!--maincontent-->
                        
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    <?php } else { ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>         
    <?php } ?>            
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>