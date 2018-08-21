
<div class='container'>
    <div class="row">
        <ol class="breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li><a href="http://www.sacnisistemas.com.br/index.php/administrar/categorias">Administrar Categorias</a></li>
		</ol>
        <div class="col-md-7">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Categorias no sistema</h3>
                 </div>
                <div class="panel-body">
                    <?php         
                    
                    if (!isset($categorias_gerentes)):
                        // $msg = SEM_CATEGORIA;
                        echo alerta(SEM_CATEGORIA);
                       
                    else:
                        // var_dump($categorias_gerentes);
                    ?>
                        <table class="table table-responsive table-striped">
                            <thead class='table-light'>
                                <th>Status</th>
                                <th>Nome cat.</th>
                                <th>Gerente Responsável</th>
                                <th>Quant. atd. ativos</th>
                                <th>Status</th>
                                
                            </thead>
                            <tbody id='tbody'><?php
                           
                            foreach ($categorias_gerentes as $cat):
                          
                            ?>
                                 <tr>
                                    <td id='status'><?=$cat['ativa']?></td>
                                    <td id='nomecat'><a href='<?=base_url("index.php/editar-categoria/{$cat['id']}")?>'> <?=$cat['name_categoria'];?></a></td>
                                    <td><a href='<?=base_url("index.php/edita-dados-usuario/{$cat['gerente_id']}")?>'><?=$cat['name']?></a></td>
                                    
                                    <td id='atAtivos'><?=$cat['qtdAt']?></td>
                                             
                                
                                 
                               <td><a class='btn btn-info' id='deletarCat' href='<?= base_url("index.php/ativa-desativa-categoria/".$cat['id'])?>' rel='no-follow'><i class="material-icons">
loop
</i></a></td> 
                              
                                </tr><?php
                            endforeach; ?>   
                                
                                
                            </tbody>    
                        </table>
                    <?php endif;?>
                </div>
            </div>
 
        </div>

        <div class="col-md-1"></div>
        <div class="col-md-4">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Criação de categorias</h3>
                    </div>
                    <div class="panel-body">
                                            <?php 	

                        echo validation_errors(); 
                        echo form_open("cria-categoria");

                        // echo form_input(array(

                        //         'type'  => 'hidden',
                        //         'name'  => 'id',
                        //         'id'    => 'id',
                        //         'value'=> ''

                        //         ));?>



                        <div class="form-group">
                            
                            <?php echo form_label("(*) Nome da categoria","name_categoria",array(

                            ));

                        echo form_input(array(

                                'type'  => 'text',
                                'name'  => 'name_categoria',
                                'id'    => 'name_categoria',
                                'class'=>'form-control',
                                'value'=> set_value('nome_categoria'),
                                'required'=>'TRUE',
                                'maxlength'=>'30'

                                ));?></div>

                                <div class="form-group">
                            
                            <?php echo form_label("Gerente Responsável","gerente_id",array(

                            ));
                            
                           
                            $gerentes_ativos=array();
                            foreach ($array_gerentes_ativos as $gte) {
                                $gerentes_ativos[$gte['id']]=$gte['name'];
                            }
                            
                            
                            echo form_dropdown('gerente_id', $gerentes_ativos,'',array(
                                'class'=>'form-control',
                                'required'=>'true'
                            ));?></div>


                        <?php

                        echo form_button(array(
                                'class'=>'btn btn-success',
                                'id'=>'btnEnviar',
                                'content'=>'<i class="material-icons">
                                forward
                                </i>',
                                'type'=>'submit'

                        ));
                        echo form_close();

                        ?>
                    </div>
                    
                </div>


        </div>        
        
    </div>
</div>    
<script src="<?=base_url('src/js/adminCategorias.js')?>" ></script>