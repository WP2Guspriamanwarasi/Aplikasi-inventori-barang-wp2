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
          <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-user">Items</i></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!--main content-->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h5 class="box-title"><?=ucfirst($page)?> Items</h5>
			<div class="float-sm-right">
				<a href="<?=site_url('items')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a> 
			</div>
		</div>

		<div class="box-body">
			<table class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=site_url('items/process')?>" method="post">
						<div class="form-group">
							<label>Barcode *</label>
							<input type="hidden" name="id" value="<?=$row->items_id?>">
							<input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="product_name">products Name *</label>
							<input type="text" name="product_name" id="product_name" value="<?=$row->name?>" class="form-control" required>
						</div>
						<div class="form_group">
							<label>Categories *</label>
							<select name="categories" class="form-control" required>
								<option value="">- Pilih -</option>
								<?php foreach($categories->result() as $key => $data) { ?>
									<option value="<?=$data->categories_id?>" <?=$data->categories_id == $row->categories_id ? "selected" : null?>><?=$data->name?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Units *</label>
							<?php echo form_dropdown('units' ,$units, $selectedunits,
								['class' => 'form-control','required' => 'required']) ?>
						</div>
						<div class="form-group">
							<label for="product_name">Price *</label>
							<input type="number" name="price" id="product_name" value="<?=$row->price?>" class="form-control" required>
						</div>

						<div class="card-body">
							<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i>Save
							</button>
							<button type="Reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</table>
		</div>
	</div>
</section>
