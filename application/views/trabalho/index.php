<!-- ########################################################################################### -->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Entradas de Trabalho</h3>
            	<div class="box-tools">

<!-- ########################################################################################### -->

            		<!-- Button trigger modal -->
					<button type="button" href="<?php echo site_url('trabalho/add'); ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd">
					  Iniciar
					</button>

                    <a href="<?php echo site_url('trabalho/add'); ?>" class="btn btn-success btn-sm">Novo</a> 
                </div>
            </div>

<!-- ########################################################################################### -->

            <div class="box-body" id="trabalho_table">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Projeto</th>
						<th>Tarefa</th>
						<th>Nota</th>
						<th>Início</th>
						<th>Final</th>
						<th>Horas</th>
						<th hidden>HoraInt</th>
						<th>Moeda</th>
						<th>Rendimento</th>
						<th hidden>Faturado</th>
						<th hidden>Fatura Id</th>
						<th></th>
                    </tr>
                    <?php foreach($trabalhos as $i){ ?>
                    <tr>
						<td><?php echo $i['id_trabalho']; ?></td>
						<td><?php echo $i['nome_projeto']; ?></td>
						<td><?php echo $i['nome_tarefa']; ?></td>
						<td><?php echo $i['nota']; ?></td>
						<td><?php echo $i['data_inicio']; ?></td>
						<td><?php echo $i['data_final']; ?></td>
						<td><?php echo $i['horas']; ?></td>
						<td hidden><?php echo $i['horaInt']; ?></td>
						<td><?php echo $i['moeda']; ?></td>
						<td><?php echo $i['rendimento']; ?></td>
						<td hidden><?php echo $i['faturado']; ?></td>
						<td hidden><?php echo $i['fatura_id']; ?></td>
						<td>
                            <a href="<?php echo site_url('trabalho/edit/'.$i['id_trabalho']); ?>" data-toggle="modal" data-target="#modalEdit" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> <!-- editar -->
                            <a href="<?php echo site_url('trabalho/remove/'.$i['id_trabalho']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a> <!-- deletar -->
                        </td>
						
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>

<!-- <?php echo site_url('trabalho/edit/'.$i['id_trabalho']); ?> -->

<!-- ########################################################################################### -->

<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
<!-- ################################## MODAL ADICIONAR ######################################## -->
<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
        
<!-- ########################################################################################### -->
<!-- Modal configs -->
<!-- ########################################################################################### -->

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     

    </div>
  </div>
</div>


<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
<!-- #################################### MODAL EDITAR ######################################### -->
<!-- ########################################################################################### -->
<!-- ########################################################################################### -->


<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">CronoTimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!-- ########################################################################################### -->


<!-- ########################################################################################### -->

      </div>
      <div class="modal-footer">
				<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Salvar
            	</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Salvar</button> -->
      
      </div>
    </div>
  </div>
</div>


<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
<!-- ####################################### SCRIPT ############################################ -->
<!-- ########################################################################################### -->
<!-- ########################################################################################### -->

<!-- <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var itenstrabalho = $(this).attr("id_trabalho");  
           $.ajax({  
                url:'<?php echo site_url('trabalho/edit/'.$i['id_trabalho']); ?>',  
                method:"POST",  
                data:{id_trabalho:id_trabalho},  
                dataType:"json",  
                success:function(data){  
                     $('#projeto_id').val(data.projeto_id);  
                     $('#tarefa_id').val(data.tarefa_id);  
                     $('#nota').val(data.nota);
                     $('#data_inicio').val(data.data_inicio);
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

     				// 'projeto_id' => $this->input->post('projeto_id'),
					// 'tarefa_id' => $this->input->post('tarefa_id'),
					// 'nota' => $this->input->post('nota'),
					// 'data_inicio' => $inicio_t,
					// 'data_final' => $final_t,
					// 'inicio' => $this->input->post('inicio'),
					// 'final' => $this->input->post('final'),
					// 'horas' => $this->input->post('horas'),
					// 'horaInt' => $this->input->post('horaInt'),
					// 'moeda' => $this->input->post('moeda'),
					// 'rendimento' => $this->input->post('rendimento'),
                }  
           });  
      });  
      // $('#insert_form').on("submit", function(event){  
      //      event.preventDefault();  
      //      if($('#name').val() == "")  
      //      {  
      //           alert("Name is required");  
      //      }  
      //      else if($('#address').val() == '')  
      //      {  
      //           alert("Address is required");  
      //      }  
      //      else if($('#designation').val() == '')  
      //      {  
      //           alert("Designation is required");  
      //      }  
      //      else if($('#age').val() == '')  
      //      {  
      //           alert("Age is required");  
      //      }  
      //      else  
      //      {  
      //           $.ajax({  
      //                url:"insert.php",  
      //                method:"POST",  
      //                data:$('#insert_form').serialize(),  
      //                beforeSend:function(){  
      //                     $('#insert').val("Inserting");  
      //                },  
      //                success:function(data){  
      //                     $('#insert_form')[0].reset();  
      //                     $('#add_data_Modal').modal('hide');  
      //                     $('#trabalho_table').html(data);  
      //                }  
      //           });  
      //      }  
      // });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
      $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' }); 
 });  
 </script> -->

<script type="text/javascript">

$( ".btn-detalhes" ).click(function() {

    var id = $(this).data('id_trabalho');
    $.get('<?php echo site_url('trabalho/edit/') ?>'+id, function(html){
        $('#modalEdit .modal-body').html(html);
        $('#modalEdit').modal('show', {backdrop: 'static'});
    });

}); 

$.ajax({
         url: '<?php echo base_url('Modal')?>',
         type: 'post',
         success:function(){
            $('#render_modal').html(data);
            $('a[data-target="cart_modal"]').click(function(){
                $('#myModal').modal('show');
            });
         }
      });

</script>