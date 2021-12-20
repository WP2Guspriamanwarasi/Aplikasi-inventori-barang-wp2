
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users
          <small>pengguna</small>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-user">Users</i></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!--main content-->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="float-left"> Data Users</h3>
			<div class="float-sm-right">
				<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat"><i class="fas fa-edit"></i>Create
				</a> 
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>NO</th>
						<th>Username</th>
						<th>Name</th>
						<th>Address</th>
						<th>Level</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%;"><?=$no++?>.</td>
						<td><?=$data->username?></td>
						<td><?=$data->name?></td>
						<td><?=$data->address?></td>
						<td><?=$data->level == 1 ? "Admin" : "Kasir"?></td>
						<td class="text-center" width="160px">
							<form action="<?=site_url('user/del')?>" method="post">
								<a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-pancil"></i>Update
								</a>
								<input type="hidden" name="user_id" value="<?=$data->user_id?>">
								<button onclick="return confirm('apa kamu yakin menghapusnya?')" class="btn btn-danger btn-xs">
									<i class="fa fa-trash"></i>Delete
								</button> 
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