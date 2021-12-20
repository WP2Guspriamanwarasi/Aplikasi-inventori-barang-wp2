<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>units
          <small>Barang</small>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-user">Units</i></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!--main content-->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h5 class="box-title"><?=ucfirst($page)?> units</h5>
			<div class="float-sm-right">
				<a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a> 
			</div>
		</div>

		<div class="box-body">
			<table class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=site_url('units/process')?>" method="post">
						<div class="form-group">
							<label>Units Name *</label>
							<input type="hidden" name="id" value="<?=$row->units_id?>">
							<input type="text" name="units_name" value="<?=$row->name?>" class="form-control" required>
						</div>

						<div class="card-body">
							<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i>save
							</button>
							<button type="Reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</table>
		</div>
	</div>
</section>
