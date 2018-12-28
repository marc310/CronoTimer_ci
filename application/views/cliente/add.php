<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Cliente Add</h3>
            </div>
            <?php echo form_open('cliente/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="moeda" class="control-label">Moeda</label>
						<div class="form-group">
							<select name="moeda_id" class="form-control">
								<option value="">select moeda</option>
								<?php 
								foreach($all_moedas as $moeda)
								{
									$selected = ($moeda['id_moeda'] == $this->input->post('moeda_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$moeda['id_moeda'].'" '.$selected.'>'.$moeda['simbolo'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<select name="status" class="form-control">
								<option value="">Selecione</option>
								<?php 
								$status_values = array(
									'0'=>'Ativo',
									'1'=>'Inativo',
								);

								foreach($status_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('status')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nome" class="control-label"><span class="text-danger">*</span>Nome</label>
						<div class="form-group">
							<input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
							<span class="text-danger"><?php echo form_error('nome');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="telefone" class="control-label">Telefone</label>
						<div class="form-group">
							<input type="text" name="telefone" value="<?php echo $this->input->post('telefone'); ?>" class="form-control" id="telefone" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="text" name="celular" value="<?php echo $this->input->post('celular'); ?>" class="form-control" id="celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="preco_hora" class="control-label">Preco Hora</label>
						<div class="form-group">
							<input type="text" name="preco_hora" value="<?php echo $this->input->post('preco_hora'); ?>" class="form-control" id="preco_hora" />
							<span class="text-danger"><?php echo form_error('preco_hora');?></span>
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="data_cadastro" class="control-label">Data Cadastro</label>
						<div class="form-group">
							<input type="text" name="data_cadastro" value="<?php echo $this->input->post('data_cadastro'); ?>" class="has-datepicker form-control" id="data_cadastro" />
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