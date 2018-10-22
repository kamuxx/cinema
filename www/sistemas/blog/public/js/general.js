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

	let selectFormato = $("<select/>",{
		"name":"formato",
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

function addCalidadMovie(){
	let tabla = $("#tbl_calidad");

	let tr = $("<tr/>",{
		"id":+$("select[name=calidad]").val()
	});

	let td_calidad = $("<td/>",{
		"text": $("select[name=calidad] option:selected").text()
	});
	let td_resolucion = $("<td/>",{
		"text": $("input[name='resolucion']").val()
	});

	let td_size = $("<td/>",{
		"text": $("input[name='size']").val()
	});

	let td_formato = $("<td/>",{
		"text": $("select[name=formato] option:selected").text()
	});

	tr.append(td_calidad).append(td_resolucion).append(td_size).append(td_formato).appendTo(tabla);
}

function saveCalidadMovie(){
	let tabla = $("#tbl_calidad");
	var calidad="";
	tabla.find("tr").each(function(){
		let fila  =$(this);
		if(calidad==""){
			calidad = fila.attr("id");
			fila.find("td").each(function(){
				calidad+="-"+$(this).text();
			});
			calidad+="|";
		}else{
			if(calidad=="undefined|"){
				calidad = fila.attr("id");
				fila.find("td").each(function(){
					calidad+="-"+$(this).text();
				});
				calidad+="|";
				alert(calidad);
			}else{
				calidad += fila.attr("id");
				fila.find("td").each(function(){
					calidad+="-"+$(this).text();
				});
				calidad+="|";
			}
		}
	});
	$("input[name='hdn_calidad']").val(calidad);
}