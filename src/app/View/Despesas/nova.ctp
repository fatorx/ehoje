<?php echo $this->Html->link('Visualizar gastos','/despesas/relatorio'); ?>
<div class="contenttitle">
    <h2 class="form"><span>Informe os dados da despesa</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Despesa', array('class' => 'stdform')); ?>

    <p>
        <label>Tipo de despesa <font color="red">*</font></label>
        <span class="smallinput tipoDespesa">

            <select name="data[Despesa][tipo]">
                <option value="">Selecione uma opção</option>
                <optgroup label="DESPESAS COM VALORES FIXOS">
                    <?php 
                        if ( @$despesasFixas ) {
                            foreach ( $despesasFixas as $despesasFixas ) {
                                echo "<option value='f;".$despesasFixas['CategoriasDespesasFixa']['id']."'>" . $despesasFixas['CategoriasDespesasFixa']['nome'] . "</option>";
                            }
                        } ?>
                </optgroup>
                <optgroup label="DESPESAS COM VALORES VARIÁVEIS">
                    <?php 
                        if ( @$despesasVariaveis ) {
                            foreach ( $despesasVariaveis as $despesasVariaveis ) {
                                echo "<option value='v;".$despesasVariaveis['CategoriasDespesasVariavei']['id']."'>" . $despesasVariaveis['CategoriasDespesasVariavei']['nome'] . "</option>";
                            }
                        }?>
                </optgroup>
                <optgroup label="DESPESAS EXTRAS">
                    <?php 
                        if ( @$despesasExtras ) {
                            foreach ( $despesasExtras as $despesasExtras) {
                                echo "<option value='e;".$despesasExtras['CategoriasDespesasExtra']['id']."'>" . $despesasExtras['CategoriasDespesasExtra']['nome'] . "</option>";
                            }
                        }?>
                </optgroup>                    
            </select>
            <br />
            <label>&nbsp;</label>
            <input type="checkbox" class="manual">
            &nbsp;Não encontrei o tipo de despesa que desejo registrar
        </span>
    </p>

    <p>
        <?php echo $this->Form->input('data', array('label' => 'Data <font color="red">*</font>',  'class' => 'smallinput', 'id' => 'datepicker', 'value' => date('d/m/Y'))); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('label' => 'Valor <font color="red">*</font>',  'class' => 'smallinput', 'onkeyup' => 'return formataPreco(this);')); ?>
    </p>
    
    <p>
        <?php echo $this->Form->input('descricao', array('label' => 'Descrição',  'class' => 'smallinput')); ?>
    </p>

    <p class="stdformbutton">
            <button class="submit radius2">Registrar despesa</button>
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


$(".manual").click(function(){
   content = "<input type='text' name='data[Despesa][tipo]' placeholder='Digite o tipo da despesa' class='smallinput'/>"; 
   $(".tipoDespesa").html(content);
});
</script>