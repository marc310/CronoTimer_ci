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
    //
    $("#iniciaCronometro").click(function(){
    	//
    	if( document.getElementById('data_inicio').value === '' )
	    {
	      //alert('empty');
	        $('#Datainicio').datetimepicker({
			 format : 'DD/MM/YYYY HH:mm:ss',
	         date: new Date()
	     	});
	     	dataInicioInfo();
	    }
    	//
		else if( document.getElementById('data_final').value === '' )
	    {
	    	$('#Datafinal').datetimepicker({
			 format : 'DD/MM/YYYY HH:mm:ss',
	         date: new Date()
	     	});
	     	dataFinalInfo();
	    }
    });
    //
    $("#resetCron").click(function(){
	    $('#data_inicio, #data_final').val("").datetimepicker('setDate', null);
		});
    //
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