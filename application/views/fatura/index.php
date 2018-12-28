<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Faturas</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fatura/add'); ?>" class="btn btn-success btn-sm">Nova Fatura</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Cód. da Fatura</th>
						<th>Cliente</th>
                        <th>Data de Emissao</th>
                        <th>Data de Vencimento</th>
                        <th>Moeda</th>
                        <th>Total</th>
                        <th>Total Pendente</th>
						<th>Status</th>
						<th></th>
                    </tr>
                    <?php foreach($fatura as $f){ 
                        if($f['status_fatura']==0)
                        {
                            $e_status = "Pendente";
                        }
                        elseif($f['status_fatura']==1)
                        {
                            $e_status = "Pago";
                        }
                        elseif($f['status_fatura']==2)
                        {
                            $e_status = "Em Atraso";
                        }
                        ?>
                    <tr>
						<td><?php echo $f['id_fatura']; ?></td>
						<td><?php echo $f['nome']; ?></td>
                        <td><?php echo $f['data_emissao']; ?></td>
                        <td><?php echo $f['data_vencimento']; ?></td>
                        <td><?php echo $f['moeda']; ?></td>
                        <td><?php echo $f['total_fatura']; ?></td>
                        <td><?php echo $f['total_pendente']; ?></td>
                        <td hidden><?php echo $f['status_fatura']; ?></td>
						<td><?php echo $e_status; ?></td>

						<td>
                            <a href="<?php echo site_url('fatura/edit/'.$f['id_fatura']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
                            <a href="<?php echo site_url('fatura/remove/'.$f['id_fatura']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
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
