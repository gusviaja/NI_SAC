<?php
function carregaComboOpcoes(){

    $ci = get_instance();
   
    if($ci->session->has_userdata('usuario_logado') and $ci->session->userdata('usuario_logado')['nivel_id'] ==="3"):
        $sideBar = $ci->load->view('sidebar/admin',TRUE);
        return $sideBar;
    endif;


}

function carregaDadosUser(){
    $ci = get_instance();
    $ci->load->model('LoginModel');
    if ($ci->session->has_userdata('usuario_logado')):
        $usuarioLogado = $ci->session->userdata('usuario_logado');
        $email = $usuarioLogado['email'];
        $dados['usuariostored'] = $ci->LoginModel->buscaUserUsandoEmail($email);
    else:
        $dados['usuariostored'] = array('name'=>"visitante",'urlFotoPerfil'=>'src/img/perfil/anonimo.png');
    endif;    

    return $dados['usuariostored'];
}