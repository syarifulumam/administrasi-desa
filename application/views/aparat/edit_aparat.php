<div class="card">
	<div class="card-header">
		Add Aparat
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$aparat->id_aparat,'foto_db'=>$aparat->foto));?>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" class="form-control " name="nama_lengkap" value="<?= $aparat->nama_lengkap ?>"
				autocomplete="off">
			<?= form_error('nama_lengkap','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>NIAP</label>
			<input type="text" class="form-control " name="niap" value="<?= $aparat->niap ?>" autocomplete="off">
			<?= form_error('niap','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>NIP</label>
			<input type="text" class="form-control " name="nip" value="<?= $aparat->nip ?>" autocomplete="off">
			<?= form_error('nip','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Jenis Kelamin</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="pria" name="jenis_kelamin" value="1"
					<?= $aparat->jenis_kelamin == "1"? "checked":'' ?>>
				<label for="pria">Laki - Laki
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="wanita" name="jenis_kelamin" value="2"
					<?= $aparat->jenis_kelamin == "2"? "checked":'' ?>>
				<label for="wanita">Perempuan
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" class="form-control " name="tempat_lahir" value="<?= $aparat->tempat_lahir ?>"
				autocomplete="off">
			<?= form_error('tempat_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_lahir" value="<?= $aparat->tanggal_lahir ?>" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Agama</label>
			<select class="form-control custom-select" name="agama" value="<?=set_value('agama')?>">
				<option value="">-- Pilih Agama --</option>
				<option <?= $aparat->agama == "Islam"? "selected":'' ?>>Islam</option>
				<option <?= $aparat->agama == "Kristen"? "selected":'' ?>>Kristen</option>
				<option <?= $aparat->agama == "Hindu"? "selected":'' ?>>Hindu</option>
				<option <?= $aparat->agama == "Budha"? "selected":'' ?>>Budha</option>
			</select>
			<?= form_error('agama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pangkat</label>
			<input type="text" class="form-control " name="pangkat" value="<?= $aparat->pangkat ?>" autocomplete="off">
			<?= form_error('pangkat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jabatan</label>
			<input type="text" class="form-control " name="jabatan" value="<?= $aparat->jabatan ?>" autocomplete="off">
			<?= form_error('jabatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pendidikan Terakhir</label>
			<select class="form-control custom-select" name="pendidikan">
				<option value="">-- Pilih Pendidikan --</option>
				<option <?= $aparat->pendidikan_terakhir == "SD"? "selected":'' ?>>SD</option>
				<option <?= $aparat->pendidikan_terakhir == "SMP"? "selected":'' ?>>SMP</option>
				<option <?= $aparat->pendidikan_terakhir == "SMA"? "selected":'' ?>>SMA</option>
				<option <?= $aparat->pendidikan_terakhir == "DIPLOMA"? "selected":'' ?>>DIPLOMA</option>
				<option <?= $aparat->pendidikan_terakhir == "SARJANA"? "selected":'' ?>>SARJANA</option>
			</select>
			<?= form_error('pendidikan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Pengangkatan</label>
			<input type="text" class="form-control " name="nomor_pengangkatan"
				value="<?= $aparat->nomor_pengangkatan ?>" autocomplete="off">
			<?= form_error('nomor_pengangkatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pengangkatan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pengangkatan" value="<?= $aparat->tanggal_pengangkatan ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
					data-mask>
			</div>
			<?= form_error('tanggal_pengangkatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Pemberhentian</label>
			<input type="text" class="form-control " name="nomor_pemberhentian"
				value="<?= $aparat->nomor_pemberhentian ?>" autocomplete="off">
			<?= form_error('nomor_pemberhentian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pemberhentian</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pemberhentian" value="<?= $aparat->tanggal_pemberhentian ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
					data-mask>
			</div>
			<?= form_error('tanggal_pemberhentian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Keaktifan</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="aktif" name="keaktifan" value="1"
					<?= $aparat->keaktifan == "1"? "checked":'' ?>>
				<label for="aktif">Aktif
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak_aktif" name="keaktifan" value="0"
					<?= $aparat->keaktifan == "0"? "checked":'' ?>>
				<label for="tidak_aktif">Tidak Aktif
				</label>
			</div>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $aparat->keterangan ?></textarea>
		</div>
		<div class="form-group">
			<label for="judul">Foto</label>
			<input type="file" class="form-control-file" name="foto">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('aparat')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
