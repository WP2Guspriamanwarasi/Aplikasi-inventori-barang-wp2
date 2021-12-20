
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users
          <small>penguna</small>
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
			<h3 class="box-title"> Edit Users</h3>
			<div class="float-sm-right">
				<a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a> 
			</div>
		</div>

		<div class="box-body">
			<table class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="" method="post">
						<div class="form-group <?=form_error('fullname') ? 'has-error': null?>">
							<label>Name *</label>
							<input type="hidden" name="user_id" value="<?=$row->user_id?>">
							<input type="text" name="fullname" value="<?=$this->input->post('fullname') ?? $row->name?>"  class="form-control">
							<?=form_error('fullname')?>
						</div>

						<div class="form-group <?=form_error('username') ? 'has-error': null?>">
							<label>Username*</label>
							<input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>"  class="form-control">
							<?=form_error('username')?>
						</div>

						<div class="form-group <?=form_error('password') ? 'has-error': null?>">
							<label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
							<input type="Password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
							<?=form_error('password')?>
						</div>

						<div class="form-group <?=form_error('passconf') ? 'has-error': null?>">
							<label>Password confirmation</label>
							<input type="Password" name="passconf" value="<?=$this->input->post('passconf')?>"   class="form-control">
							<?=form_error('passconf')?>
						</div>

						<div class="form-group">
							<label>Address</label>
							<textarea name="address" class="form-control"><?=$this->input->post('address') ?? $row->address?></textarea>
							<?=form_error('address')?> 
						</div>

						<div class="form-group <?=form_error('level') ? 'has-error' :null?>">
							<label>Level *</label>
							<select name="level" class="form-control">

								<?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
								<option value="1">Admin</option>
								<option value="2" <?=$level == 2? 'selected' : null?>>Kasir</option>
							</select>
							<?=form_error('level')?> 
						</div>
						<div class="card-body">
							<button type="submit" class="btn btn-success btn-flat">
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
