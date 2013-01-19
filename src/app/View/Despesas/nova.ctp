<div class="contenttitle">
    <h2 class="form"><span>Informe os dados da despesa</span></h2>
</div><!--contenttitle-->
                    
<br />
                    
<?php echo $this->Form->create('Despesa', array('class' => 'stdform')); ?>

    <p>
        <label>Tipo de despesa <font color="red">*</font></label>
        <span class="smallinput">

            <select name="data[Despesa][tipo]">
                <option value="">Selecione uma opção</option>
                <optgroup label="DESPESAS FIXAS">
                    <?php 
                        if ( @$despesasFixas ) {
                            foreach ( $despesasFixas as $despesasFixas ) {
                                echo "<option value='f;".$despesasFixas['CategoriasDespesasFixa']['id']."'>" . $despesasFixas['CategoriasDespesasFixa']['nome'] . "</option>";
                            }
                        } ?>
                </optgroup>
                <optgroup label="DESPESAS VARIÁVEIS">
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
        </span>
    </p>

    <p>
        <?php echo $this->Form->input('data', array('label' => 'Data <font color="red">*</font>',  'class' => 'smallinput', 'id' => 'datepicker')); ?>
    </p>

    <p>
        <?php echo $this->Form->input('valor', array('label' => 'Valor <font color="red">*</font>',  'class' => 'smallinput')); ?>
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
