$(document).ready(function() {
        
        let dataTable = $('#lista').DataTable({
            
        
            "responsive": true,

            "language":{
                "decimal":        "",
                "emptyTable":     "Sem info disponivel na tabela",
                "info":           "Mostrando _START_ ate _END_ de _TOTAL_ resultados",
                "infoEmpty":      "Mostrando 0 ate 0 de 0 resultados",
                "infoFiltered":   "(de um total de _MAX_ resultados)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Mostrar _MENU_ resultados",
                "loadingRecords": "Carregando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "Sem registros encontrados",
                "paginate": {
                    "first":      "Primeiro",
                    "last":       "Ultimo",
                    "next":       "Proximo",
                    "previous":   "Anterior"
                }},
            
            "columnDefs": [
                { targets: [0,1,5,6], visible: false},
                { "orderable": false,"targets": 4},
                { "orderable": false,"targets": 7},
            ],
            "order": [[ 2, "asc" ]],
            "ajax": {
            "url": 'http://www.sacnisistemas.com.br/index.php/administrar/usuariosajax',
            "dataSrc": 'data',
            
        },
            "columns": [
                { "data": "id" },
                { "data": "ativo" },
                { "data": "name" },
                { "data": "email" },
                { "data": "urlFotoPerfil" },
                { "data": "created_at" },
                { "data": "updated_at" },
                { "data": "nameNivel" },
                { "data": "AtivarDesativar" }
                
            ],

            "createdRow": function ( row, data, index ) {
                // console.log(data['ativo']);
                if(data['ativo'] == "0"){
                    console.log("ativo email: "+data['email'])
                    $(row).css("background","rgb(240,205,205)");
                }else{console.log("inativo"); $(row).css("background","rgb(222,245,200)")}
                // console.log(row);
                // if ( data["ativo"].text() = "0" ) {
                //     $('td', row).eq(5).addClass('highlight');
                // }
            }


         });

         
            
       
    });        
