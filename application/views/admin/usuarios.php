<div class="container">
    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="http://www.sacnisistemas.com.br/index.php/administrar/usuarios">Administrar Usuarios</a></li>
    </ol>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-primary marginBottomVintepx" href="<?=base_url('index.php/usuario/formulario')?>">Criar novo usuario</a>
        </div>
        <div class="col-md-10"</div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">    
            <table id="lista" class="display table table-dark table-responsive table-bordered table-striped">
                    <thead class="thead-usuarios">
                        <tr>
                            <th>id</th>
                            <th>ativo</th>
                            <th>name</th>
                            <th>email</th>
                            <th>urlFotoPerfil</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Perfil do Usuario</th>
                            <th>Ativar/Desativar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>ativo</th>
                            <th>name</th>
                            <th>email</th>
                            <th>urlFotoPerfil</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Perfil do Usuario</th>
                            <th>Ativar/Desativar</th>
                        </tr>
                    </tfoot>
                
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url('src/js/adminUsuDataTable.js')?>" ></script>
<script src="<?=base_url('src/js/adminUsuarios.js')?>" ></script>
