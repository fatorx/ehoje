<?php echo $this->Html->link('Visualizar gastos','/despesas/relatorio'); ?>
<div class="contenttitle">
    <h2 class="form"><span>Informe os dados da receita</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Receita', array('class' => 'stdform')); ?>

    <p>
       <?php echo $this->Form->input('tipo', array('label' => 'Tipo de receita', 'type' => 'select', 'options' => $receitas)); ?>
    </p>

    <p>
        <?php echo $this->Form->input('data', array( 'type' => 'text', 'label' => 'Data  <font color="red">*</font>',  'class' => 'smallinput', 'id' => 'datepicker', 'value' => date('d/m/Y'))); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('type' => 'text', 'label' => 'Valor',  'class' => 'smallinput', 'onkeyup' => 'return formataPreco(this);')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('descricao', array('label' => 'Descrição',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Registrar receita</button>
    </p>

<?php echo $this->Form->end(); ?>  
    
    Os campos com <font color="red">*</font> são de preenchimento obrigatório.                  
                  
<br clear="all" /><br />
<script>
function formataPreco(obj) {
    preco = obj.value;
    // função extraída do seguinte exemplo: http://forum.imasters.com.br/topic/471025-jquery-mask-campo-float/  |contribuição de Eduardo-ca
    preco=preco.replace(/\D/g,"");//Remove tudo o que não é dígito  
    preco=preco.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões  
    preco=preco.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares  
    preco=preco.replace(/(\d)(\d{2})$/,"$1,$2");// coloca a vírgula nos dois ultimos
    
    obj.value = preco;  
}
</script>