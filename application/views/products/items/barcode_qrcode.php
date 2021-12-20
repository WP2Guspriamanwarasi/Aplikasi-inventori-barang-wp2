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
          <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
          <li class="active">Items</li>
        </ol>
      </div>
    </div>
  </div>
</section>


<section class="content">
	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h5 class="box-title">Barcode Generator</h5>
			<div class="float-sm-right">
				<a href="<?=site_url('items')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a> 
			</div>
		</div>
		<div class="box-body">
		    <?php 
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
        ?>
        <br>
        <?=$row->barcode?>
		</div>
	</div>
</section>
