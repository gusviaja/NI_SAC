<?php

function gerarCodigo($lastCode = null, $data){
	$codigoNovo = 0;

    //recebe uma data e pode receber o chamado mais recente (de onde ira puxar o codigo) 
    //
	// quem invocar deve antes puxar o chamado mais recentemente criado no banco
	// no if valida, se o chamado mais recente foi criado hj, cria um codigo novo acrescen
	// tando ++, caso contrario cria um novo codigo baseado na data de hj + 1
	
	if($lastCode[0]['codigo']!= null):
		 $codigoNovo = intval($lastCode[0]['codigo']); 
		 $codigoNovo ++;
		 return $codigoNovo;
	else:
		$dataHj= explode("-", $data);

		$codigoNovo = $dataHj[0].$dataHj[1].$dataHj[2]."1";
		
	
	endif;	
	
	return $codigoNovo;

}

?>