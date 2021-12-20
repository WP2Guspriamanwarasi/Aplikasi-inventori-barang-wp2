
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Units
          <small> Satuan Barang</small>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="nav-icon">Units</i></a></li>
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
			<h5 class="float-left"> Data units</h5>
			<div class="float-sm-right">
				<a href="<?=site_url('units/add')?>" class="btn btn-primary btn-flat"><i class="fas fa-edit"></i>Create
				</a> 
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%;"><?=$no++?>.</td>
						<td><?=$data->name?></td>
						<td class="text-center" width="160px">

							<a href="<?=site_url('units/edit/'.$data->units_id)?>" class="btn btn-primary btn-xs">
								<i class="fa fa-pencil"></i>Update
								</a> 

							<!-- <a href="<?=site_url('units/del/'.$data->units_id)?>"  onclick="return confirm('Apakah anda yakin menghapus data')" class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>Delete
							</a> --> 

							<a href="#modalDelete" data-toggle="modal"  onclick="$('#modalDelete #formDelete').attr('Action', '<?=site_url('units/del/'.$data->units_id)?>')" class="btn btn-danger btn-xs">
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