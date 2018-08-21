                        
<?php
function ValidoQtemAnexo($inputArquivo){
    $anexo = "";
    if($inputArquivo):
     // se tem arquivo Verifico que o formato do arquivo seja o aceito, para reforcar a 
        // validacao que faco no front.
        $ext = strtolower(substr($inputArquivo,-3));
        if($ext!= "zip" and $ext!= "rar"):
            $this->session->set_flashdata('danger',"Tip de arquivo nao aceito");
            redirect("./");
        else :  
        $anexo == $inputArquivo;
        endif;   
    endif;
    return $anexo;
}

function replaceNomeArquivo($nomeArquivo) {
            $novoNome = '';  
            $arrayNomeArquivo = explode('.', $nomeArquivo);
            $Items = count($arrayNomeArquivo); 
            if($Items > 2){
                $tipoArquivo = $arrayNomeArquivo[$Items-1];
                $newarray[0]='foto';
                $newarray[1]=$tipoArquivo;
                $novoNome = implode($newarray, '.');  
            }else{$novoNome = "foto.".$arrayNomeArquivo['1'];}
        return $novoNome;
    

}

function getApenasNome($nomeArquivo){

            $ultimoPonto = strrpos($nomeArquivo, "."); 
          
            
            $trocar = substr($nomeArquivo,strrpos($nomeArquivo, "."));
            return str_replace("$trocar", "", $nomeArquivo);      

}
                        