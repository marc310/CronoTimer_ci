<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Itenspagamento Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('itenspagamento/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Pagamento</th>
						<th>Fatura Id</th>
						<th>Valor Pago</th>
						<th>Tipo Pagamento</th>
						<th>Descricao Pagamento</th>
						<th>Data Pagamento</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($itenspagamento as $i){ ?>
                    <tr>
						<td><?php echo $i['id_pagamento']; ?></td>
						<td><?php echo $i['fatura_id']; ?></td>
						<td><?php echo $i['valor_pago']; ?></td>
						<td><?php echo $i['tipo_pagamento']; ?></td>
						<td><?php echo $i['descricao_pagamento']; ?></td>
						<td><?php echo $i['data_pagamento']; ?></td>
						<td>
                            <a href="<?php echo site_url('itenspagamento/edit/'.$i['id_pagamento']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('itenspagamento/remove/'.$i['id_pagamento']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
