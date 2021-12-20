
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Barang Masuk / Pembelian</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
          <li class="active">Transaction Stock In</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!--main content-->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h5 class="box-title"> Data Stock In</h5>
			<div class="float-sm-right">
				<a href="<?=site_url('stock/in/add')?>" class="btn btn-primary btn-flat"><i class="fas fa-edit"></i> Add Stock In
				</a> 
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>NO</th>
						<th>Barcode</th>
						<th>Product Items</th>
						<th>Qty</th>
						<th>Date</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>	
					<?php $no =1;
					foreach($row as $key => $data) { ?>
					<tr>
						<td style="width:5%"><?=$no++?>.</td>
						<td><?=$data->barcode?></td>
						<td><?=$data->items_name?></td>
						<td class="text-right"><?=$data->qty?></td>
						<td class="text-center"><?=indo_date($data->date)?></td>
						<td class="text-center" width="160px">
							<a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('Action', '<?=site_url('stock/in/del/'.$data->stock_id.'/'.$data->items_id)?>')" class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>Delete
							</a>
						</td>
					</tr>
					<?php
					} ?> 
				</tbody>
			</table>
		</div>
	</div>
</section>

<div class="modal fade" id="modalDelete" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Yakin akan menghapus data ini</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-footer">
        <form id="formDelete" action="" method="post">
          <button class="btn btn-default" data-dissmiss="modal">Tidak</button>
          <button class="btn btn-danger" type="submit">Hapus</button>
        </form>
      </div>       
    </div>
 </div> 
</div> 