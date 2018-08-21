<?php

		$ci = get_instance();
		$ci->load->helper('auth');
			$usuarioLogado = auth();
			$id = $usuarioLogado['id']; 
            $pathImg = getcwd(). DIRECTORY_SEPARATOR ."uploads" . DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR;
            // var_dump($pathImg);die();

            $config['upload_path']           =  $pathImg; 
            $config['allowed_types']         =  'gif|jpg|png';
            $config['max_size']              =  0; 
            $config['max_width']             =  0	; 
            $config['max_height']            =  0;