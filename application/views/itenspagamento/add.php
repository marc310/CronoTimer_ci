<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Itenspagamento Add</h3>
            </div>
            <?php echo form_open('itenspagamento/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="fatura_id" class="control-label">Fatura Id</label>
						<div class="form-group">
							<input type="text" name="fatura_id" value="<?php echo $this->input->post('fatura_id'); ?>" class="form-control" id="fatura_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="valor_pago" class="control-label">Valor Pago</label>
						<div class="form-group">
							<input type="text" name="valor_pago" value="<?php echo $this->input->post('valor_pago'); ?>" class="form-control" id="valor_pago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_pagamento" class="control-label">Tipo Pagamento</label>
						<div class="form-group">
							<input type="text" name="tipo_pagamento" value="<?php echo $this->input->post('tipo_pagamento'); ?>" class="form-control" id="tipo_pagamento" />
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