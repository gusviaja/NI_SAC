
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li><a href="http://www.sacnisistemas.com.br/index.php/administrar/usuarios">Administrar Usuarios</a></li>                  
                                <li><a href="#">Editar dados do Usuario</a></li>
        </ol>

        <div class="col-md-2"></div>

        <div class="col-md-4">
            <div class="text-center cracha">
                    <img class="img-rounded img-responsive" src="<?=base_url($usuario->urlFotoPerfil)?>" alt="Card image cap"></img>
                        <div class="cracha-body">
                        
                            <h4 class="cracha-titulo"> <?php $nome = $usuario->name; $nome = character_limiter($nome,12,"..."); echo $nome ?>
                                </h4>
                            <h5 class="cracha-subtitulo mb-2 text-muted">Cargo: Gerente</h5>
                            
                        </div> <!-- END CRACHA BODY-->
            </div>

         </div>  <!--END COL -->       
        <div class="col-md-4">
            
                    <div class="form-group">
                            
                            <?php echo form_label("Nome e Sobrenome","name",array(
                
                            ));
                
                    echo form_input(array(
                
                                'type'  => 'text',
                                'name'  => 'name',
                                'id'    => 'name',
                                'class'=>'form-control',
                                'value'=> $usuario->name,
                                'required'=>'TRUE',
                                'maxlength'=>'60'
                
                                ));?>
                    </div>
                
                
                    
                
                    <div class="form-group"><?php
                     echo form_label("Email:","email",array(
                            ));
                    echo form_input(array(
                
                                'type'  => 'email',
                                'name'  => 'email',
                                'class'=>'form-control',
                                'id'    => 'email',
                                'value'=> $usuario->email,
                                'required'=>'TRUE'
                
                                ));
                
                    ?></div>
                
                
                
                <div class="form-group">
                        

                    <div class="row">
                        <div class="col-md-6"><?php
                        for ($i=0; $i < count($niveis); $i++) { 
                            $options[$i] = $niveis[$i]['nameNivel'];
                        }
                        
                        echo form_label("Nivel: ","nivel_id",array());
                            echo form_dropdown('nivel_id', $options,$options[0],array("class"=>"form-control") );?>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label("Pass atual","txtPass")?>
                   
                                <input name = "txtPass"  value="Senhainicial12"></input>
                            </div>	
                        </div>
                    </div><!--END ROW-->
                </div><!--END FORM GOUP-->
        </div> <!--END COL-->       

        <div class="col-md-4">

                <div class="form-group"> 
                    <?php echo form_label("Novo Password","password",array(

                    )); 

                    echo form_input(array(

                        'type'  => 'password',
                        'name'  => 'password',
                        'id'    => 'password',
                        'placeholder' => '*********',
                        'required'=>'TRUE',
                        'class' => 'form-control',
                        'maxlength'=>'255'

                        ));?>
                </div> 

               <?php

               echo form_button(array(
                       'class'=>'btn btn-success',
                       'id'=>'Enviar',
                       'content'=>'Carregar',
                       'type'=>'submit'

               ));
               echo form_close();
               
               ?>
                                
        </div> <!-- END COL DIREITA-->
        
        <div class="col-md-2"></div>
    </div>
</div>	