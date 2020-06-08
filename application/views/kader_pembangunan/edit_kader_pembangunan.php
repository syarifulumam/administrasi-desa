<div class="card">
	<div class="card-header">
		Edit Kader Pembangunan
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$kader_pembangunan->id_kader_pembangunan,'file'=>$kader_pembangunan->foto));?>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" class="form-control " name="nama_lengkap" value="<?= $kader_pembangunan->nama ?>"
				autocomplete="off">
			<?= form_error('nama_lengkap','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Jenis Kelamin</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="laki" name="kelamin" value="Laki-Laki"
					<?= $kader_pembangunan->jenis_kelamin=="Laki-Laki"?'checked':'' ?>>
				<label for="laki">Laki - Laki
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak" name="kelamin" value="Wanita"
					<?= $kader_pembangunan->jenis_kelamin=="Wanita"?'checked':'' ?>>
				<label for="tidak">Wanita
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" class="form-control " name="tempat_lahir" value="<?= $kader_pembangunan->tempat_lahir ?>"
				autocomplete="off">
			<?= form_error('tempat_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($kader_pembangunan->tanggal_lahir)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('tanggal_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pendidikan Terakhir</label>
			<select class="form-control custom-select" name="pendidikan">
				<option value="">-- Pilih Pendidikan --</option>
				<option <?= $kader_pembangunan->pendidikan_terakhir=="SD"?'selected':''?>>SD</option>
				<option <?= $kader_pembangunan->pendidikan_terakhir=="SMP"?'selected':'' ?>>SMP</option>
				<option <?= $kader_pembangunan->pendidikan_terakhir=="SMA"?'selected':'' ?>>SMA</option>
				<option <?= $kader_pembangunan->pendidikan_terakhir=="DIPLOMA"?'selected':'' ?>>DIPLOMA</option>
				<option <?= $kader_pembangunan->pendidikan_terakhir=="SARJANA"?'selected':'' ?>>SARJANA</option>
			</select>
			<?= form_error('pendidikan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pekerjaan</label>
			<select class="form-control custom-select" name="pekerjaan">
				<option value="">-- Pilih Pekerjaan --</option>
				<option <?= $kader_pembangunan->pekerjaan=="Kepala Proyek"?'selected':'' ?>>Kepala Proyek</option>
				<option <?= $kader_pembangunan->pekerjaan=="Tukang"?'selected':'' ?>>Tukang</option>
				<option <?= $kader_pembangunan->pekerjaan=="Tenaga Ahli"?'selected':'' ?>>Tenaga Ahli</option>
			</select>
			<?= form_error('pekerjaan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Bidang</label>
			<input type="text" class="form-control " name="bidang" value="<?= $kader_pembangunan->bidang ?>"
				autocomplete="off">
			<?= form_error('bidang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Alamat</label>
			<textarea class="form-control" rows="3" name="alamat"><?= $kader_pembangunan->alamat ?></textarea>
			<?= form_error('alamat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $kader_pembangunan->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kader_pembangunan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
