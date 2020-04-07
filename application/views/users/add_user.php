<div class="card">
	<div class="card-header">
		Add User
	</div>
	<div class="card-body">
		<?= form_open_multipart('');?>
		<div class="form-group">
			<label for="judul">Nama</label>
			<input type="text" class="form-control " name="nama" value="<?= set_value('judul') ?>" autocomplete="off">
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Level User</label>
			<select class="form-control custom-select" name="level_user" value="<?=set_value('jenis_kelamin')?>">
				<option value="">-- Pilih Level --</option>
				<option>Admin</option>
				<option>Operator</option>
			</select>
			<?= form_error('level_user','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Username</label>
			<input type="text" class="form-control " name="username" value="<?=set_value('url')?>" autocomplete="off">
			<?= form_error('username','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Password</label>
			<input type="password" class="form-control " name="password" value="<?=set_value('url')?>"
				autocomplete="off">
			<?= form_error('password','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Foto</label>
			<input type="file" class="form-control-file" name="foto">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('users')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
