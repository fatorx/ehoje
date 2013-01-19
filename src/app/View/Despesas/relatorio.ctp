<div class="contenttitle">
            <h2 class="chart"><span>Proporcao de gastos</span></h2>
        </div><!--contenttitle-->
       
       
        
        <?php 
        
            /*
             * 0 fixas
             * 1 Variaveis
             * 2 extras
             * 3 investimentos
             * 
             */
        
        
            $pieContent = "['Proporção de gastos', 0],";
            
            if ( @$proporcao['0'] ) {
                $pieContent .= "['Despesas fixas', ".$proporcao['0']."],";
            } 
            
            if ( @$proporcao['1'] ) {
                $pieContent .= "['Despesas variáveis', ".$proporcao['1']."],";
            }
            
            if ( @$proporcao['2'] ) {
                $pieContent .= "['Despesas extras', ".$proporcao['2']."],";
            }
            
            if ( @$proporcao['3'] ) {
                $pieContent .= "['Investimentos', ".$proporcao['3']."],";
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
        <div id="chart_div_pie" style="width: 900px; height: 300px;"></div>
    
        <br />
        <br />
        <br />
        <br />



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
        
        <div id="chart_div_vendas" style="width: 1024px; height: 300px;"></div>                 
    
        <br />
        <br />
        <br />
        <br />
