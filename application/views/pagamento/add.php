<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pagamento Add</h3>
            </div>
            <?php echo form_open('pagamento/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="fatura_id" class="control-label">Fatura</label>
						<div class="form-group">
							<select name="fatura_id" class="form-control">
								<option value="">select fatura</option>
								<?php 
								foreach($all_fatura as $fatura)
								{
									$selected = ($fatura['id_fatura'] == $this->input->post('fatura_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$fatura['id_fatura'].'" '.$selected.'>'.$fatura['id_fatura'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_pagamento" class="control-label">Tipo Pagamento</label>
						<div class="form-group">
							<select name="tipo_pagamento" class="form-control">
								<option value="">select</option>
								<?php 
								$tipo_pagamento_values = array(
									'0'=>'Em Dinheiro',
									'1'=>'Depósito',
									'2'=>'Boleto',
								);

								foreach($tipo_pagamento_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tipo_pagamento')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="valor_pago" class="control-label">Valor Pago</label>
						<div class="form-group">
							<input type="text" name="valor_pago" value="<?php echo $this->input->post('valor_pago'); ?>" class="form-control" id="valor_pago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="descricao_pagamento" class="control-label">Descricao Pagamento</label>
						<div class="form-group">
							<input type="text" name="descricao_pagamento" value="<?php echo $this->input->post('descricao_pagamento'); ?>" class="form-control" id="descricao_pagamento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_pagamento" class="control-label">Data Pagamento</label>
						<div class="form-group">
							<input type="text" name="data_pagamento" value="<?php echo $this->input->post('data_pagamento'); ?>" class="has-datepicker form-control" id="data_pagamento" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>