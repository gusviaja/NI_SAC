<?php

function alerta($constante){

   $htmlAlerta = '<div class="alert alert-danger" role="alert"> <i class="material-icons">
   info
   </i> <span>'.$constante.'</span></div>';
    return $htmlAlerta;

}
function sucesso($constante){

    $htmlSucesso = '<div class="alert alert-success" role="alert"> <i class="material-icons">
    info
    </i> <span>'.$constante.'</span></div>';
     return $htmlSucesso;
 
 }
