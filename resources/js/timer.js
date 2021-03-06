// declaração de constantes mais usadas
const $i = document.getElementById("data_inicio");
const $f = document.getElementById("data_final");

const $Ti = document.getElementById("inputInicio");
const $Tf = document.getElementById("inputFinal");

(() => {

  let hours = `00`,
      minutes = `00`,
      seconds = `00`,
      chronometerDisplay = document.querySelector(`[data-chronometer]`),
      chronometerCont = document.querySelector(`[data-timer]`),
      chronometerCall

  function chronometer() {
  	// inicia contagem
    seconds ++

    if (seconds < 10) seconds = `0` + seconds

    if (seconds > 59) {
      seconds = `00`
      minutes ++

      if (minutes < 10) minutes = `0` + minutes
    }

    if (minutes > 59) {
      minutes = `00`
      hours ++

      if (hours < 10) hours = `0` + hours
    }
	//
    chronometerDisplay.textContent = `${hours}:${minutes}:${seconds}`
    chronometerCont.textContent = `${hours}:${minutes}:${seconds}`
  }
//
//*************************************************************************************************//
//
	// INICIAR O TIMER
	function iniciarTimer(){
		// CHAMA AS FUNÇÕES ENCADEADAS AO INICIAR CRONOMETRO
	    // inicia contagem do relogio
	    chronometerCall = setInterval(chronometer, 1000)
	    //
		var $ele = $("#Datainicio");
			var date = new Date();
			var dataTempo = date.getTime();
			var datePickerObject = $ele.data("DateTimePicker");

				// $('#iniciaCronometro').removeClass('btn-success');
				// $('#iniciaCronometro').addClass('btn-danger');
				
					if (typeof datePickerObject !== "undefined") {
					// it's already been Initialize . Just update the date.
					datePickerObject.date(date);
					}
					else {
					// it hasn't been initialized yet. Initialize it with the date.
					$ele.datetimepicker({
					format : 'DD/MM/YYYY HH:mm:ss',
					date: date
					});
					}
			$Ti.value = dataTempo; // insere o timestamp inicial
			// document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Parar';
	}
	//
	// PARAR O TIMER
	function pararTimer(){
		// CHAMA FUNÇÃO PARA PARAR CRONOMETRO
    	// para contagem do relogio
    	clearInterval(chronometerCall)
    	//
		var $ele = $("#Datafinal");
			
		var date = new Date();
		var dataTempo = date.getTime();

		var datePickerObject = $ele.data("DateTimePicker");
			//document.getElementById("iniciaCronometro").disabled = true;
			$('#iniciaCronometro').removeClass('btn-danger');
			$('#iniciaCronometro').addClass('btn-secondary');
			$('#cleanCronometro').removeClass('hide');
			$('#botaoSalvarTime').removeClass('hide');
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

 		$Tf.value = dataTempo; //insere o timestamp final
     	// document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Parar';
		 dataFinalInfo();
		//  calculaDiferenca();
		//  verificaItemLivre();
	}
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
	// INICIA CRONOMETRO FUNCTION
    $("#iniciaCronometro").click(function(){
		//
		if ( $i.value != ''){
			calculaDiferenca();
		}
		//
		$("#pararCronometro").removeClass('hide');
		$("#iniciaCronometro").attr("disabled", true);
		iniciarTimer();
		dataInicioInfo();
    });
	//
	//
	$("#pararCronometro").click(function(){ 
		pararTimer() 
		if ( $i.value != ''){
			calculaDiferenca();
		}
	});
	//
	// LIMPAR REGISTROS DO TIMER
	$("#cleanCronometro").click(function(){
		$("#iniciaCronometro").attr("disabled", false);
		
		clearInfo();
		// reset relogio
		clearInterval(chronometerCall)
	    chronometerDisplay.textContent = `00:00:00`

	      hours = `00`,
	      minutes = `00`,
	      seconds = `00`
        //
        chronometerCont.textContent = `00:00:00`

	      hours = `00`,
	      minutes = `00`,
	      seconds = `00`
        //
		$('#iniciaCronometro').removeClass('btn-secondary');
        $('#iniciaCronometro').addClass('btn-success');
        $('#cleanCronometro').addClass('hide');
        $('#botaoSalvarTime').addClass('hide');
        $('#cancelaCron').removeClass('btn-danger');
        $('#cancelaCron').addClass('btn-secondary');
     	document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Iniciar';
     	document.getElementById('inputFinal').value="";
		document.getElementById('inputInicio').value="";
		document.getElementById('horas').value="";
		$('#data_inicio, #data_final').val('').datetimepicker('update');
		});
	//
    // CANCELAR CRONOMETRO
    $("#cancelaCron").click(function(){
	    location.reload()
		});
    //
})()
//
//////
    // INFO CRONOMETRAGEM
    function dataInicioInfo() {
	  i = $i.value;
	  Ti = $Ti.value;

	  document.getElementById("detalhes_work").innerHTML += "Data de Início: " + i + " Timestamp Inicial de: " + Ti;
	}
	function dataFinalInfo() {
		f = $f.value;
		Tf = $Tf.value;

	  document.getElementById("detalhes_work").innerHTML += "<br>" + "Data Final: " + f + " Timestamp Final de: " + Tf;
	}
	// passa o registro de horas somadas trabalhadas para o input
	// hora do calculo, algoritimo pra saber as horas trabalhadas entre os registros 
	// do timestamp da entrada de trabalho.
	// novo coment
	
	function calculaDiferenca() {
		var difference = $Tf.value - $Ti.value;
		// console.log('Diferença: ' + difference);
		// console.log('=================================');

			var daysDifference = Math.floor(difference/1000/60/60/24);
			difference -= daysDifference*1000*60*60*24
			
			var hoursDifference = Math.floor(difference/1000/60/60);
			difference -= hoursDifference*1000*60*60

			var minutesDifference = Math.floor(difference/1000/60);
			difference -= minutesDifference*1000*60

			var secondsDifference = Math.floor(difference/1000);

		
			// TODO.. append + 1 se as horas forem maior que 24 ficando assim
			// 1.2,03 para descrever 1 dia e 2 horas...
			// gera resultado da diferença de horas em numero inteiro
			var t = hoursDifference + (minutesDifference / 60) + (secondsDifference / 1000);

			// console.log('Dias: ' + daysDifference);
			// console.log('Horas: ' + hoursDifference);
			// console.log('Minutos: ' + minutesDifference);
			// console.log('Segundos: ' + secondsDifference);
			console.log('=================================');
			console.log('total em numero inteiro: ' + t);


			
			// console.log('hora calculada: ' + horaCalculada);

		// seta total calculado no input Horas
		// document.getElementById("horas").value = horaCalculada;

	}
	// document.write('difference = ' + daysDifference + ' day/s ' + hoursDifference + ' hour/s ' + minutesDifference + ' minute/s ' + secondsDifference + ' second/s ');

	// function totalHoras(){
	// 	var Tfinal = document.getElementById("inputFinal").value;
	// 	var Tinicio = document.getElementById("inputInicio").value;
	// 	// soma dados retornados
	// 	var somaHoras = Tinicio - Tfinal;
	// 	document.getElementById("horas").value = somaHoras;
	// }
	//
	// limpa status list de detalhes de trabalho
	function clearInfo()
	{
		document.getElementById("detalhes_work").innerHTML = "";
	}
	//
	//
	//
	function changeDropProject() {
		var value = $("#projeto_id").val();
		// valor pego na alteração do dropdown
		console.log(value);
	}
	//
	// AO ALTERAR A DATA PELO INPUT
	function changeDataInicio() {
		if ($i.value != ''){
			calculaDiferenca();
		}
		var value = $("#data_inicio").val();
		// valor pego na alteração do datetime

		var date = new Date(value);
		var dataTempo = date.getTime();
		$Ti.value = dataTempo; //altera o timestamp inicial

		dataInicioInfo();
		dataInicioInfo();


		// console.log("value: " + value + " | date: " + date + " | dataTempo: " + dataTempo);
	}
	// AO ALTERAR A DATA PELO INPUT
	function changeDataFinal() {
		var value = $("#data_final").val();
		// valor pego na alteração do datetime
		
		var date = new Date(value);
		var dataTempo = date.getTime();
		$Tf.value = dataTempo; //altera o timestamp final
		
		dataFinalInfo();
		calculaDiferenca();

		// console.log("value: " + value + " | date: " + date + " | dataTempo: " + dataTempo);
	}
	//
	//
	//
	// ESCUTADORES DE EVENTO
	// estes devem informar se um cliente foi alterado na seleção da entrada de trabalho
	//
	document.getElementById("projeto_id").addEventListener("change", changeDropProject);
	
		
	$("#data_inicio").on("change paste keyup dp.change", function() { changeDataInicio(); });
	$("#data_final").on("change paste keyup dp.change", function() { changeDataFinal(); });
	
	//
	//
	//

	// function verificaItemLivre(){
	// var livre = document.getElementById("livre");
	// 	if (livre.checked == true){
	// 		livre.value = 1; // por hora
	// 	} else { 
	// 		//direciona ao valor padrao se estiver vazio
	// 		livre.value = 2; // por projeto
	// 	}
	// }

	// var activities = document.getElementById("projeto_id");
	// activities.addEventListener("click", function() {
	// 	var options = activities.querySelectorAll("option");
	// 	var count = options.length;
	// 	if(typeof(count) === "undefined" || count < 2)
	// 	{
	// 		addActivityItem();
	// 	}
	// });

	// activities.addEventListener("change", function() {
	// 	if(activities.value == "addNew")
	// 	{
	// 		addActivityItem();
	// 	}
	// 	console.log(activities.value);
	// });

	// function addActivityItem() {
	// 	alert("Adding an item");
		
	// 	var option = document.createElement("option");
	// 	option.value = "test";
	// 	option.innerHTML = "test";
		
	// 	activities.appendChild(option);
	// }

//
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
     //*********************************************************************************************//
    // CONTADOR DE TEMPO regressivo
  //   function iniciaCronoTimer()
  //   {
  //   	// Set the date we're counting down to
  //   	// var i = document.getElementById("data_inicio").value;
		// // var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();
		// var tempoInicial = getElementById('inputInicio').value;
		// var tempoFinal = getElementById('inputFinal').value;
		// // Update the count down every 1 second
		// var x = setInterval(function() {

		//   var countDownDate = tempoInicial;
		//   // Get todays date and time
		//   var now = new Date().getTime();

		//   // Find the distance between now and the count down date
		//   var distance = countDownDate - now;

		//   // Time calculations for days, hours, minutes and seconds
		//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		//   // Output the result in an element with id="contador_main"
		//   document.getElementById("contador").innerHTML = "<label>" + days + "d " + hours + "h "
		//   + minutes + "m " + seconds + "s " + "</label>";

		//   document.getElementById("contador_main").innerHTML = '<a class="logo">' + days + "d " + hours + "h "
		//   + minutes + "m " + seconds + "s " + "</a>";

		//   // If the count down is over, write some text
		//   if (distance < 0) {
		//     clearInterval(x);
		//     document.getElementById("contador").innerHTML = "EXPIRED";
		//   }
		// }, 1000);
		// // ** fim do cronoTimer
  //   }
