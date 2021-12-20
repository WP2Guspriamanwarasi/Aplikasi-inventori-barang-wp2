<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


<section class="content-header">
    <div class="box">
        <div class="box-header">
            <h5 class="box-title">Add Stock Out</h5>
            <div class="float-sm-right">
                <a href="<?=site_url('stock/out')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a> 
            </div>
        </div>

        <div class="box-body">
            <table class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('stock/process_out')?>" method="post">
						<div class="form-group">
							<label>Date *</label>
							<input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control">	
						</div>

                        <div>
                            <label for="barcode">Barcode *</label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="items_id" id="items_id">
                            <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="items_name">Items Name</label>
                            <input type="text" name="items_name"  id="items_name" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="units_name"> Items units</label>
                                    <input type="text" name="units_name" id="units_name" value="-" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock"> Initial stock</label>
                                    <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Qty *</label>
                            <input type="number" name="qty" class="form-control" required>
                        </div>

						<div class="form-group">
							<button type="submit" name="out_add" class="btn btn-success btn-flat">
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


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Stock Out</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Units</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($items as $i => $data) { ?>
                            <tr>
                                <td><?=$data->barcode?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->units_name?></td>
                                <td class="text-rigth"><?=rupiah($data->price)?></td>
                                <td class="text-rigth"><?=$data->stock?></td>
                                <td class="text-rigth">
                                    <button class="btn btn-xs btn-info" id="select"
                                        data-id="<?=$data->items_id?>"
                                        data-barcode="<?=$data->barcode?>"
                                        data-name="<?=$data->name?>"
                                        data-units="<?=$data->units_name?>"
                                        data-stock="<?=$data->stock?>">
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> 
            
        </div>
    </div> 
</div> 


<script>
$(document).ready(function() {
    $(document).on('click','#select', function() {
        var items_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var units_name = $(this).data('units');
        var stock = $(this).data('stock');
        $('#items_id').val(items_id);
        $('#barcode').val(barcode);
        $('#items_name').val(name);
        $('#units_name').val(units_name);
        $('#stock').val(stock);
        $('#modal-items').modal('hide');
        
    })
})
</script>

</body>
</html>

