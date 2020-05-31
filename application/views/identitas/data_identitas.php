<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="card">
	<div class="card-header">
		Add User
	</div>
	<div class="card-body table-responsive">
		<?= form_open_multipart(base_url('identitas/edit_identitas'),'',array('id'=>$identitas->id_identitas,'foto_db'=>$identitas->logo));?>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">Nama Desa</label>
					<input type="text" class="form-control " name="nama_desa" value="<?= $identitas->nama_desa ?>"
						autocomplete="off">
					<?= form_error('nama_desa','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">kecamatan</label>
					<input type="text" class="form-control " name="kecamatan" value="<?= $identitas->kecamatan ?>"
						autocomplete="off">
					<?= form_error('kecamatan','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">kota/kabupaten</label>
					<input type="text" class="form-control " name="kota" value="<?= $identitas->kabupaten_kota ?>"
						autocomplete="off">
					<?= form_error('kota','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">Provinsi</label>
					<input type="text" class="form-control " name="provinsi" value="<?= $identitas->provinsi ?>"
						autocomplete="off">
					<?= form_error('provinsi','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">alamat</label>
					<input type="text" class="form-control " name="alamat" value="<?= $identitas->alamat ?>"
						autocomplete="off">
					<?= form_error('alamat','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">kode pos</label>
					<input type="text" class="form-control " name="kode_pos" value="<?= $identitas->kode_pos ?>"
						autocomplete="off">
					<?= form_error('kode_pos','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">Nomor Telepon</label>
					<input type="text" class="form-control " name="no_telepon" value="<?= $identitas->no_telepon ?>"
						autocomplete="off">
					<?= form_error('no_telepon','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">no fax</label>
					<input type="text" class="form-control " name="no_fax" value="<?= $identitas->no_fax ?>"
						autocomplete="off">
					<?= form_error('no_fax','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">email</label>
					<input type="text" class="form-control " name="email" value="<?= $identitas->email ?>"
						autocomplete="off">
					<?= form_error('email','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">Website</label>
					<input type="text" class="form-control " name="website" value="<?= $identitas->website ?>"
						autocomplete="off">
					<?= form_error('website','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">Format Waktu Untuk Wilayah</label>
					<input type="text" class="form-control " name="format_waktu" value="<?= $identitas->format_waktu ?>"
						autocomplete="off">
					<?= form_error('format_waktu','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="exampleInputEmail1">Jenis Kecamatan</label>
					<select class="form-control custom-select" name="jenis_kecamatan"
						value="<?=set_value('jenis_kecamatan')?>">
						<option value="">-- Pilih Jenis Kecamatan --</option>
						<option <?= $identitas->jenis_kecamatan=="Kecamatan"?"selected":"" ?>>Kecamatan</option>
						<option <?= $identitas->jenis_kecamatan=="Distrik"?"selected":"" ?>>Distrik</option>
						<option <?= $identitas->jenis_kecamatan=="Walinagari"?"selected":"" ?>>Walinagari</option>
					</select>
					<?= form_error('jenis_kecamatan','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="judul">Foto</label>
					<input type="file" class="form-control-file" name="foto">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="exampleInputEmail1">Jenis Pemerintahan</label>
					<select class="form-control custom-select" name="jenis_pemerintahan"
						value="<?=set_value('jenis_pemerintahan')?>">
						<option value="">-- Pilih Pemerintahan --</option>
						<option <?= $identitas->jenis_pemerintahan=="Kabupaten"?"selected":"" ?>>Kabupaten</option>
						<option <?= $identitas->jenis_pemerintahan=="Kota"?"selected":"" ?>>Kota</option>
					</select>
					<?= form_error('jenis_pemerintahan','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="exampleInputEmail1">Jenis Pemerintahan Desa</label>
					<select class="form-control custom-select" name="jenis_desa" value="<?=set_value('jenis_desa')?>">
						<option value="">-- Pilih Pemerintahan Desa --</option>
						<option <?= $identitas->jenis_pemerintahan_desa=="Desa"?"selected":"" ?>>Desa</option>
						<option <?= $identitas->jenis_pemerintahan_desa=="Kampung"?"selected":"" ?>>Kampung</option>
						<option <?= $identitas->jenis_pemerintahan_desa=="Lembang"?"selected":"" ?>>Lembang</option>
					</select>
					<?= form_error('jenis_desa','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="judul">Lokasi</label>
					<input type="text" class="form-control " name="lokasi" value="<?=  $identitas->lokasi ?>"
						autocomplete="off">
					<?= form_error('lokasi','<small class="text-danger pl-1">','</small>') ?>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
