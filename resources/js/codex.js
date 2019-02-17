    // START CRONOMETRO
    $("#iniciaCronometro").click(function(){
    	//
    	if( document.getElementById('data_inicio').value === '' )
	    {
	    //
	    var $ele = $("#Datainicio");
		var date = new Date();
		var datePickerObject = $ele.data("DateTimePicker");
			$('#iniciaCronometro').removeClass('btn-success');
            $('#iniciaCronometro').addClass('btn-danger');
			if (typeof datePickerObject !== "undefined")
			{
			  // it's already been Initialize . Just update the date.
			  datePickerObject.date(date);
			}
			else 
			{
			  // it hasn't been initialized yet. Initialize it with the date.
			  $ele.datetimepicker({
			  format : 'DD/MM/YYYY HH:mm:ss',
			  date: date
			  });
			}
	    dataInicioInfo();
 		document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Parar';
	    }
    	//
		else
	    {
	    var $ele = $("#Datafinal");
		var date = new Date();
		var datePickerObject = $ele.data("DateTimePicker");
			//document.getElementById("iniciaCronometro").disabled = true;
			$('#iniciaCronometro').removeClass('btn-danger');
            $('#iniciaCronometro').addClass('btn-secondary');
            $('#continuaCronometro').removeClass('hide');
            //
			if (typeof datePickerObject !== "undefined")
			{
			  // it's already been Initialize . Just update the date.
			  datePickerObject.date(date);
			}
			else 
			{
			    //$('#btn-start-stop').removeClass('btn-success');
                //$('#btn-start-stop').addClass('btn-danger');
                //$('#navbar_timer').removeClass('hide');
			  // it hasn't been initialized yet. Initialize it with the date.
			  $ele.datetimepicker({
			  format : 'DD/MM/YYYY HH:mm:ss',
			  date: date
			  });
			}

     	dataFinalInfo();
     	document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Parar';
     	//
	    }
    });
    //
    // VALIDAÇÃO DO FORMULARIO
    function validaForm() {
	  var tarefa = document.forms["form-cronotimer"]["tarefa_id"].value;
	  var projeto = document.forms["form-cronotimer"]["projeto_id"].value;
	  if (tarefa == "")
	  {
	    alert("Por Favor, Selecione a Tarefa");
	    return false;
	  }
	  else if (projeto == "")
	  {
	  	alert("Por Favor, Selecione o Projeto");
	    return false;
	  }
	}
	//
    // CANCELAR CRONOMETRO
    $("#resetCron").click(function(){
	    location.reload()
		});
    //
    // INFO CRONOMETRAGEM
    function dataInicioInfo()
    {
	  var i = document.getElementById("data_inicio").value;
	  document.getElementById("detalhes_work").innerHTML = "Data de Início: " + i;
	}
	function dataFinalInfo()
    {
	  var f = document.getElementById("data_final").value;
	  document.getElementById("detalhes_work").innerHTML += "<br>" + "Data Final: " + f;
	}
	//
    // função calcular horas
    // pega o valor de inicio e o valor final e coloca em duas variaveis
    // converte o valor pra numero q possa ser calculado
    // exibe esse valor nos detalhes e calcula * o valor cobrado por hora
    // *** o valor por hora deve estar estocado em um input hidden
 	// function myFunction()
 	// {
	//   var x = document.getElementById("data_inicio").value;
	//   document.getElementById("detalhes_work").innerHTML = "Data de Início " + x;
	// }
	//

		//
	// function startCronometro(element){
	//     //
	//     if( document.getElementById('data_inicio').value === '' )
	//     {
	//       //alert('empty');
	//         $('#Datainicio').datetimepicker({
	// 		 format : 'DD/MM/YYYY HH:mm:ss',
	//          date: new Date()
	//      	});
	//      	dataInicioInfo();
	//     }
	//     else if( document.getElementById('data_final').value === '' )
	//     {
	//     	$('#Datafinal').datetimepicker({
	// 		 format : 'DD/MM/YYYY HH:mm:ss',
	//          date: new Date()
	//      	});
	//      	dataFinalInfo();
	//     }
	//     //
 //    }