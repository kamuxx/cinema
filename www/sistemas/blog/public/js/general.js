let resolucionValue ="";
function addInputResolucion(option){
	let resoluciones = $("#resoluciones");
	let input = $("<input/>",{
		"name":"resolucion",
		"class":"form-control",
		"placeholder":"Ej: 1280x720",
		"data-movie-id":option.value,
		"onblur":"saveResolucion(this)"
	});
	
	if($("input[name='resolucion']").length==0){
		input.appendTo(resoluciones);
	}else{
		let inputVacio = false;
		let indice;
		$("input[name='resolucion']").each(function(){
			if(ValidarInputVacio($(this))){
				indice = $(this).index();
				inputVacio = true;
				return false;
			}
		});

		if(!inputVacio){
			input.appendTo(resoluciones);
		}else{
			alert("Indique la resolucion para el formato seleccionado");
			$("select[name='calidad'] option").each(function(){
				if($(this).val()==$("input[name='resolucion']").eq(indice).attr("data-movie-id")){
					$(this).prop("selected",true);
					$(option).prop("selected",false);
					$("input[name='resolucion']").eq(indice).focus();
					resolucionValue ="";
					let hdnRes = $("input[name='hdn_resolucion']");
					hdnRes.val(hdnRes.val());
					return false;
				}
			});
		}
	}
}

function ValidarInputVacio(input){
	return input.val().length===0;
}



function saveResolucion(input){
	let hdnRes = $("input[name='hdn_resolucion']");
	if(resolucionValue==""){
		resolucionValue ="";
		resolucionValue = $(input).attr("data-movie-id")+"-" +$(input).val();
	}else{
		resolucionValue += "|"+ $(input).attr("data-movie-id")+"-"+$(input).val();
	}
	hdnRes.val(resolucionValue);
}