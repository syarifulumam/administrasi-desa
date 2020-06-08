<div class="card">
	<div class="card-header">
		Edit Kegiatan Pembangunan
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$kegiatan_pembangunan->id_kegiatan_pembangunan));?>
		<div class="form-group">
			<label>Sifat Proyek</label>
			<select class="form-control custom-select" name="sifat_proyek">
				<option value="">-- Pilih Sifat Proyek --</option>
				<option <?=$kegiatan_pembangunan->sifat_proyek=="Baru"?"selected":'';?>>Baru</option>
				<option <?=$kegiatan_pembangunan->sifat_proyek=="Lanjutan"?"selected":'';?>>Lanjutan</option>
			</select>
			<?= form_error('sifat_proyek','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nama Proyek</label>
			<input type="text" class="form-control " name="nama_proyek"
				value="<?= $kegiatan_pembangunan->nama_proyek ?>" autocomplete="off">
			<?= form_error('nama_proyek','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Volume</label>
			<input type="text" class="form-control " name="volume" value="<?= $kegiatan_pembangunan->volume ?>"
				autocomplete="off">
			<?= form_error('volume','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Lokasi</label>
			<input type="text" class="form-control " name="lokasi" value="<?= $kegiatan_pembangunan->lokasi ?>"
				autocomplete="off">
			<?= form_error('lokasi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Pemerintah</label>
			<input type="number" min="0" class="form-control " name="dana_pemerintah" value="<?= $kegiatan_pembangunan->sumber_dana_pemerintah ?>" autocomplete="off">
			<?= form_error('dana_pemerintah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Provinsi</label>
			<input type="number" min="0" class="form-control " name="dana_provinsi" value="<?= $kegiatan_pembangunan->sumber_dana_provinsi ?>" autocomplete="off">
			<?= form_error('dana_provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Kota</label>
			<input type="number" min="0" class="form-control " name="dana_kota" value="<?= $kegiatan_pembangunan->sumber_dana_kota ?>" autocomplete="off">
			<?= form_error('dana_kota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Swadaya</label>
			<input type="number" min="0" class="form-control " name="dana_swadaya" value="<?= $kegiatan_pembangunan->sumber_dana_swadaya ?>" autocomplete="off">
			<?= form_error('dana_swadaya','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pelaksana</label>
			<input type="text" class="form-control " name="pelaksana" value="<?= $kegiatan_pembangunan->pelaksana ?>"
				autocomplete="off">
			<?= form_error('pelaksana','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Waktu Pelaksanaan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="waktu_pelaksanaan" value="<?= date('d-m-Y', strtotime($kegiatan_pembangunan->waktu_pelaksanaan)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('waktu_pelaksanaan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3"
				name="keterangan"><?= $kegiatan_pembangunan->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kegiatan_pembangunan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
