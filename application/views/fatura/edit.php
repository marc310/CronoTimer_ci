<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Fatura Edit</h3>
            </div>
			<?php echo form_open('fatura/edit/'.$fatura['id_fatura']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="cliente_fatura" class="control-label">Cliente</label>
						<div class="form-group">
							<select name="cliente_fatura" class="form-control">
								<option value="">select cliente</option>
								<?php 
								foreach($all_clientes as $cliente)
								{
									$selected = ($cliente['id_cliente'] == $fatura['cliente_fatura']) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['id_cliente'].'" '.$selected.'>'.$cliente['nome'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status_fatura" class="control-label">Status</label>
						<div class="form-group">
							<select name="status_fatura" class="form-control">
								<option value="">select</option>
								<?php 
								$status_values = array(
									'0'=>'Pendente',
									'1'=>'Pago',
									'2'=>'Em Atraso',
								);

								foreach($status_values as $value => $display_text)
								{
									$selected = ($value == $fatura['status']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_emissao" class="control-label">Data Emissao</label>
						<div class="form-group">
							<input type="text" name="data_emissao" value="<?php echo ($this->input->post('data_emissao') ? $this->input->post('data_emissao') : $fatura['data_emissao']); ?>" class="has-datepicker form-control" id="data_emissao" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_vencimento" class="control-label">Data Vencimento</label>
						<div class="form-group">
							<input type="text" name="data_vencimento" value="<?php echo ($this->input->post('data_vencimento') ? $this->input->post('data_vencimento') : $fatura['data_vencimento']); ?>" class="has-datepicker form-control" id="data_vencimento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="moeda" class="control-label">Moeda</label>
						<div class="form-group">
							<input type="text" name="moeda" value="<?php echo ($this->input->post('moeda') ? $this->input->post('moeda') : $fatura['moeda']); ?>" class="form-control" id="moeda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="valor_hora" class="control-label">Valor Hora</label>
						<div class="form-group">
							<input type="text" name="valor_hora" value="<?php echo ($this->input->post('valor_hora') ? $this->input->post('valor_hora') : $fatura['valor_hora']); ?>" class="form-control" id="valor_hora" />
							<span class="text-danger"><?php echo form_error('valor_hora');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_fatura" class="control-label"><span class="text-danger">*</span>Total Fatura</label>
						<div class="form-group">
							<input type="text" name="total_fatura" value="<?php echo ($this->input->post('total_fatura') ? $this->input->post('total_fatura') : $fatura['total_fatura']); ?>" class="form-control" id="total_fatura" />
							<span class="text-danger"><?php echo form_error('total_fatura');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_pendente" class="control-label">Total Pendente</label>
						<div class="form-group">
							<input type="text" name="total_pendente" value="<?php echo ($this->input->post('total_pendente') ? $this->input->post('total_pendente') : $fatura['total_pendente']); ?>" class="form-control" id="total_pendente" />
							<span class="text-danger"><?php echo form_error('total_pendente');?></span>
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