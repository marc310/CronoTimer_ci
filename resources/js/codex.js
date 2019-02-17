    // INICIAR CRONOMETRO
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
	    iniciaCronoTimer();
	    dataInicioInfo();
 		document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Parar';
	    }
    	//
		else // PARAR CRONOMETRO
	    {
	    var $ele = $("#Datafinal");
		var date = new Date();
		var datePickerObject = $ele.data("DateTimePicker");
			//document.getElementById("iniciaCronometro").disabled = true;
			$('#iniciaCronometro').removeClass('btn-danger');
            $('#iniciaCronometro').addClass('btn-secondary');
            $('#cleanCronometro').removeClass('hide');
            $('#cancelaCron').removeClass('btn-secondary');
            $('#cancelaCron').addClass('btn-danger');
            //
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
	  var final = document.forms["form-cronotimer"]["data_final"].value;
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
	  else if (final == "")
	  {
	  	alert("Atenção, o timer ainda está sendo executado.");
	    return false;
	  }
	}
	//
	// LIMPAR TIMER
	$("#cleanCronometro").click(function(){
		clearInfo();
		$('#iniciaCronometro').removeClass('btn-secondary');
        $('#iniciaCronometro').addClass('btn-success');
        $('#cleanCronometro').addClass('hide');
        $('#cancelaCron').removeClass('btn-danger');
        $('#cancelaCron').addClass('btn-secondary');
     	document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Iniciar';
		$('#data_inicio, #data_final').val('').datetimepicker('update');
		});
	//
    // CANCELAR CRONOMETRO
    $("#cancelaCron").click(function(){
	    location.reload()
		});
    //
    // CONTADOR DE TEMPO
    function iniciaCronoTimer()
    {
    	// Set the date we're counting down to
    	// var i = document.getElementById("data_inicio").value;
		// var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();
		var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get todays date and time
		  var now = new Date().getTime();
		    
		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
		    
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		    
		  // Output the result in an element with id="contador_main"
		  document.getElementById("contador").innerHTML = "<label>" + days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s " + "</label>";

		  document.getElementById("contador_main").innerHTML = '<a class="logo">' + days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s " + "</a>";
		    
		  // If the count down is over, write some text 
		  if (distance < 0) {
		    clearInterval(x);
		    document.getElementById("contador").innerHTML = "EXPIRED";
		  }
		}, 1000);
		// ** fim do cronoTimer
    }
    //
    // INFO CRONOMETRAGEM
    function dataInicioInfo()
    {
	  var i = document.getElementById("data_inicio").value;
	  document.getElementById("detalhes_work").innerHTML += "Data de Início: " + i;
	}
	function dataFinalInfo()
    {
	  var f = document.getElementById("data_final").value;
	  document.getElementById("detalhes_work").innerHTML += "<br>" + "Data Final: " + f;
	}
	function clearInfo()
	{
		document.getElementById("detalhes_work").innerHTML = "";
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