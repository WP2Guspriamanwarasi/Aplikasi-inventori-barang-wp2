
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Items
          <small> Data Barang</small>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="nav-icon">Items</i></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!--main content-->
<section class="content">
	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h5 class="float-left"> Data products items</h5>
			<div class="float-sm-right">
				<a href="<?=site_url('items/add')?>" class="btn btn-primary btn-flat"><i class="fas fa-edit"></i>Create products items
				</a> 
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="tables">
				<thead>
					<tr>
						<th>No</th>
						<th>Barcode</th>
						<th>Name</th>
						<th>Categories</th>
						<th>Units</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%;"><?=$no++?>.</td>
						<td>
							<?=$data->barcode?><br>
							<a href="<?=site_url('items/barcode_qrcode/'.$data->items_id)?>" class="btn btn-default btn-xs"> 
								Generator <i class="fa fa-barcode"></i>
							</a>
						</td>
						<td><?=$data->name?></td>
						<td><?=$data->categories_name?></td>
						<td><?=$data->units_name?></td>
						<td><?=$data->price?></td>
						<td><?=$data->stock?></td>
						<td class="text-center" width="160px">
							<a href="<?=site_url('items/edit/'.$data->items_id)?>" class="btn btn-primary btn-xs">
								<i class="fa fa-pencil"></i>Update
								</a> 

							<!-- <a href="<?=site_url('items/del/'.$data->items_id)?>"  onclick="return confirm('Apakah anda yakin menghapus data')" class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>Delete
							</a> --> 

							<a href="#modalDelete" data-toggle="modal"  onclick="$('#modalDelete #formDelete').attr('Action', '<?=site_url('items/del/'.$data->items_id)?>')" class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>Delete
							</a>
							</form>
						</td>
					</tr>
					<?php 
					}?>	 
				</tbody>
			</table>
		</div>
	</div>
</section>


<script>
	$(document).ready(function) {
		$('#table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?=site_url('items/get_ajax')?>",
				"type": "POST"
			},
			"culumnDefs": [
				{
					"targets": [5, 6],
					"className": 'text-right'
				},
				{
					"targets": [7, -1],
					"className": 'text-center'
				},
				{
					"targets": [0, 7, -1],
					"orderable": false
				},
			]
			"order": []

		})
	}
</script>



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

