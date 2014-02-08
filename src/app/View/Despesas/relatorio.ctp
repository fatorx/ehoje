<?php
    $classNotification = 'msginfo';
    if ( $saldo <= 0 ) {
       $classNotification = 'msgerror'; 
    } 
?>
<div class="notification <?php echo $classNotification; ?>">
    <a class="close"></a>
    <p style="font-size: 20px;">Saldo atual: R$ <?php echo number_format(($saldo/100),2,',','.'); ?></p>
</div><!-- notification msginfo -->

<div class="contenttitle">
    <h2 class="chart"><span>Proporcao de gastos</span></h2>
</div><!--contenttitle-->

<?php echo $this->Form->create('Despesa'); ?>
    <?php 
        echo '<br />Mês base&nbsp;&nbsp;';
        $options = array(
            '01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', 
            '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', 
            '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro',
            '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro',
            );
        echo $this->Form->input('mes', array('type' => 'select', 'options' => $options, 'default' => date('m'), 'label' => false, 'class' => 'radius3', 'div' => false)); 
        echo '&nbsp;&nbsp;';
    ?>
    <div style="display: none;">
        <?php echo $this->Form->end(array('label' => 'Consultar', 'value' => 'Consultar', 'div' => false, 'id' => 'submitMonth'));  ?>
    </div>
<?php 
    

    $pieContent = "['Proporção de gastos', ''],";

    if ( @$proporcao[FIXA] ) {
        $pieContent .= "['".Configure::read('TiposDespesas.fixa')."', ".$proporcao['0']."],";
    } 

    if ( @$proporcao[VARIAVEL] ) {
        $pieContent .= "['".Configure::read('TiposDespesas.variavel')."', ".$proporcao['1']."],";
    }

    if ( @$proporcao[EXTRA] ) {
        $pieContent .= "['".Configure::read('TiposDespesas.extra')."', ".$proporcao['2']."],";
    }

    if ( @$proporcao[INVESTIMENTO] ) {
        $pieContent .= "['".Configure::read('TiposDespesas.investimento')."', ".$proporcao['3']."],";
    }

?>
        
<script>
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChartPie);
    function drawChartPie() {

        mes = jQuery("#mes").val();
        var dataPie = google.visualization.arrayToDataTable([
          <?php echo $pieContent; ?>
        ]);

        var options = {title: 'Demonstrativo de gastos com os tipos de despesas do mês de '+mes};

        var chart = new google.visualization.PieChart(document.getElementById('chart_div_pie'));
        chart.draw(dataPie, options);

    }

</script>
        
<div id="chart_div_pie" style="width: 900px; height: 250px;"></div>

<div class="contenttitle">
    <h2 class="chart"><span>Receitas x Despesas</span></h2>
</div><!--contenttitle-->

<input type="hidden" id="mes" value="<?php echo $mesAtual; ?>" />

<script>
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChartVendas);
    function drawChartVendas() {

        var dataVendas = google.visualization.arrayToDataTable([
          ['Gastos','Receitas','Despesas','Saldo'],
          ['Jan', <?php echo $janeiro['receita']; ?>, <?php echo $janeiro['despesa']; ?>, <?php echo ($janeiro['receita'] - $janeiro['despesa']); ?>],
          ['Fev', <?php echo $fevereiro['receita']; ?>, <?php echo $fevereiro['despesa']; ?>,<?php echo ($fevereiro['receita'] - $fevereiro['despesa']); ?>],
          ['Mar', <?php echo $marco['receita']; ?>, <?php echo $marco['despesa']; ?>,<?php echo ($marco['receita'] - $marco['despesa']); ?>],
          ['Abr', <?php echo $abril['receita']; ?>, <?php echo $abril['despesa']; ?>,<?php echo ($abril['receita'] - $abril['despesa']); ?>],
          ['Mai', <?php echo $maio['receita']; ?>, <?php echo $maio['despesa']; ?>,<?php echo ($maio['receita'] - $maio['despesa']); ?>],
          ['Jun', <?php echo $junho['receita']; ?>, <?php echo $junho['despesa']; ?>,<?php echo ($junho['receita'] - $junho['despesa']); ?>],
          ['Jul', <?php echo $julho['receita']; ?>, <?php echo $julho['despesa']; ?>,<?php echo ($julho['receita'] - $julho['despesa']); ?>],
          ['Ago', <?php echo $agosto['receita']; ?>, <?php echo $agosto['despesa']; ?>,<?php echo ($agosto['receita'] - $agosto['despesa']); ?>],
          ['Set', <?php echo $setembro['receita']; ?>, <?php echo $setembro['despesa']; ?>,<?php echo ($setembro['receita'] - $setembro['despesa']); ?>],
          ['Out', <?php echo $outubro['receita']; ?>, <?php echo $outubro['despesa']; ?>,<?php echo ($outubro['receita'] - $outubro['despesa']); ?>],
          ['Nov', <?php echo $novembro['receita']; ?>, <?php echo $novembro['despesa']; ?>,<?php echo ($novembro['receita'] - $novembro['despesa']); ?>],
          ['Dez', <?php echo $dezembro['receita']; ?>, <?php echo $dezembro['despesa']; ?>,<?php echo ($dezembro['receita'] - $dezembro['despesa']); ?>],
        ]);

        var options = {};

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_vendas'));
        chart.draw(dataVendas, options);

    }
</script>
        
<div id="chart_div_vendas" style="width: 980px; height: 500px;"></div>                 
    
<br /><br /><br /><br />

<script>
    $("#DespesaMes").change(function(){
       $("#submitMonth").click();
    });
</script>