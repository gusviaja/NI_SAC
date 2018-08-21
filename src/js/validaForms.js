


function comparaCamposPassword(){

		$("#btnEnviar").click(function(){

			console.log("me clicaram");
			event.preventDefault();
			var txtPass1 = $("#txtNovoPassword");
			var txtPass2 =  $("#txtNovoPassword2");
			var form = $("form");
			if(txtPass1.val() != txtPass2.val()){
				alert("Os campos Senha e Repetir senha devem conter valores iguais");
			}else{
				form.submit();
			}
			

		});


}
