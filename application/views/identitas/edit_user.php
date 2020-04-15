<div class="card">
	<div class="card-header">
		Edit User
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$user->id_user,'foto_db'=>$user->foto));?>
		<div class="form-group">
			<label for="judul">Nama</label>
			<input type="text" class="form-control " name="nama" value="<?= $user->nama ?>" autocomplete="off">
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Level User</label>
			<select class="form-control custom-select" name="level_user">
				<option value="">-- Pilih Level --</option>
				<option <?= $user->level == 'Admin' ? 'selected':''; ?>>Admin</option>
				<option <?= $user->level == 'Operator' ? 'selected':''; ?>>Operator</option>
			</select>
			<?= form_error('level_user','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Username</label>
			<input type="text" class="form-control " name="username" value="<?= $user->username ?>" autocomplete="off">
			<?= form_error('username','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Status</label>
			<select class="form-control custom-select" name="status">
				<option <?= $user->status == '1' ? 'selected':''; ?> value="1">Aktif</option>
				<option <?= $user->status == '0' ? 'selected':''; ?> value="0">Non Aktif</option>
			</select>
			<?= form_error('level_user','<small class="text-danger pl-1">','</small>') ?>
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
