

<div class='container'>
    <div class="row">
        <ol class="breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li><a href="http://www.sacnisistemas.com.br/index.php/administrar/categorias">Administrar Categorias</a></li>
                    <li><a href="#">Editar Categoria</a></li>
		</ol>
        <div class="col-md-2"></div>

        <div class='col-md-8'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Editando categoria <strong><?=$categoria->name_categoria?></strong></h3>
                </div>
                <div class="panel-body">
                   <?= form_open("CategoriaController/mudaNomeCategoria")?>
                        <div class="form-group row">
                            <label for="novoNome" class="col-md-3" >Novo Nome</label>
                            <div class="col-md-6">
                            <input type="hidden" name="id" value=<?= $categoria->id?>></input>
                                 <input type="text" name="nome" class="form-control" maxlength="60" required='true' id="novoNome" value="<?=$categoria->name_categoria?> ">
                            </div>  
                            <div class="col-md-3">
                                <button class='btn btn-info' id='btnMudarNomeCat' type='submit' rel='no-follow'>
                                <i class="material-icons">loop</i></button>
                            
                            
                            </div>   
                        </div>
                    <?= form_close(); ?>    
                        <div class="form-group row">
                            <label for="gerenteAtual" class="col-md-3" >Gerente atual</label>
                            <div class="col-md-6">
                            <span class="breadcrumb"><?=$categoria->name_gerente?></span>
                            </div>  
                             
                        </div>
                        <div class="form-group row">
                        <?= form_open("CategoriaController/mudaGerenteCategoria")?>
                        <input type="hidden" name="id" value=<?= $categoria->id?>></input>
                                <label for="mudarPara" class="col-md-3" >Mudar para</label>
                                    <div class="col-md-6">
                                                <?php 
                                                    $gerentes_ativos=array();
                                                    foreach ($gerentesAtivos as $gte) {
                                                        $gerentes_ativos[$gte['id']]=$gte['name'];
                                                    }
                                                ?>
                                            
                                            <?php
                                                echo form_dropdown('mudarPara', $gerentes_ativos,'',array(
                                                    'class'=>'form-control',
                                                    'required'=>'true',
                                                    'name'=>'gerente'
                                                ));?>
                                    </div>

                            <div class="col-md-3">
                                <button class='btn btn-info' type="submit"  
                                rel='no-follow'><i class="material-icons">loop</i></button>
                            </div> 
                        <?= form_close()?>
                        </div>     
                        
                         <div class="form-group row">
                            <label for="atendentesAtivos" class="col-md-3" >Atendentes ativos</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                <?php echo form_open("categoriaController/desativaAtendentesSeleccionados");?>
                                    <label for="desativarAt">Seleccione e desative-os no botão ao lado</label>
                                   <input name = "cat" type="hidden" value="<?=$this->uri->segment(2);?>"></input>
                                    <select class="form-control" id="desativarAt" name="desativarAt[]" multiple="multiple">
                                        <?php
                                            foreach ($atendentesAtivosCategoria as $aA) {?>
                                                <option value= "<?=$aA['id']?>"> <?=$aA['name']?> </option>
                                        <?php }                       ?>                     
                                            
                                        
                                        
                                        
                                    </select>
                                    <br>
                                    <p class="texto-pequeno">* Ctrl + click selecciona o usuario</p>
                                </div>
                            </div> 
                            <div class="col-md-3">
                                    <?php echo form_button(array(
                                        'class'=>'btn btn-info',
                                        'id'=>'deletarCat',
                                        'content'=>' <i class="material-icons">loop</i>',
                                        'type'=>'submit'

                                )); ?>
                            
                            </div> <?= form_close();?> 

                        </div>
                        </div>

                       
                    </form>    
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>
        
    </div>
</div>                