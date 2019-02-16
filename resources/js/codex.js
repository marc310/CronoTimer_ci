    //
    $("#iniciaCronometro").click(function(){
    	//
    	debugger
    	if( document.getElementById('data_inicio').value === '' )
	    {
	    //
	    var $ele = $("#Datainicio");
		var date = new Date();
		var datePickerObject = $ele.data("DateTimePicker");

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
     	document.getElementById('iniciaCronometro').innerHTML = '<i class="fa fa-check"></i> Continuar';
     	//
	    }
    });
    // cancelar cronometragem reload
    $("#resetCron").click(function(){
	    location.reload()
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