<div class="card">
	<div class="card-header">
		Edit TKD
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$tkd->id_tkd,'file'=>$tkd->file_dokumen));?>
		<div class="form-group">
			<label>Asal TMD /TKD/TKK</label>
			<input type="text" class="form-control " name="asal_tkd" value="<?= $tkd->asal_tkd ?>" autocomplete="off">
			<?= form_error('asal_tkd','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Sertifikat/ Leter C/ Persil</label>
			<input type="text" class="form-control " name="nomor_sertifikat" value="<?= $tkd->nomor_sertifikat ?>"
				autocomplete="off">
			<?= form_error('nomor_sertifikat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Luas (HA)</label>
			<input type="text" class="form-control " name="luas_ha" value="<?= $tkd->luas ?>" autocomplete="off">
			<?= form_error('luas_ha','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kelas</label>
			<input type="text" class="form-control " name="kelas" value="<?= $tkd->klas ?>" autocomplete="off">
			<?= form_error('kelas','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Asli Milik Desa/ Kampung/ Kelurahan</label>
			<input type="text" class="form-control " name="asli_milik" value="<?= $tkd->pemilik ?>" autocomplete="off">
			<?= form_error('asli_milik','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Perolehan AMD</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_perolehan_amd" value="<?= $tkd->tanggal_amd ?>" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_perolehan_amd','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Bantuan Pemerintah</label>
			<input type="text" class="form-control " name="bantuan_pemerintah" value="<?= $tkd->bantuan_pemerintah ?>"
				autocomplete="off">
			<?= form_error('bantuan_pemerintah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Perolehan Bantuan Pemerintah</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_perolehan_bantuan_pemerintah"
					value="<?= $tkd->tanggal_bantuan_pemerintah ?>" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_perolehan_bantuan_pemerintah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Bantuan Provinsi</label>
			<input type="text" class="form-control " name="bantuan_provinsi" value="<?= $tkd->bantuan_provinsi ?>"
				autocomplete="off">
			<?= form_error('bantuan_provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Perolehan Bantuan Provinsi</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_perolehan_bantuan_provinsi"
					value="<?= $tkd->tanggal_bantuan_provinsi ?>" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_perolehan_bantuan_provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Bantuan Kabupaten Kota</label>
			<input type="text" class="form-control " name="bantuan_kabupaten" value="<?= $tkd->bantuan_kabupaten ?>"
				autocomplete="off">
			<?= form_error('bantuan_kabupaten','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Perolehan Bantuan Kabupaten Kota</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_perolehan_bantuan_kabupaten"
					value="<?= $tkd->tanggal_bantuan_kabupaten ?>" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_perolehan_bantuan_kabupaten','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Bantuan Lain - Lain</label>
			<input type="text" class="form-control " name="bantuan_lain" value="<?= $tkd->lain_lain ?>"
				autocomplete="off">
			<?= form_error('bantuan_lain','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Perolehan Bantuan Lain - Lain</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_perolehan_bantuan_lain" value="<?= $tkd->tanggal_bantuan_lain ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
					data-mask>
			</div>
			<?= form_error('tanggal_perolehan_bantuan_lain','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah TKD Sawah</label>
			<input type="text" class="form-control " name="jumlah_tkd_sawah" value="<?= $tkd->jumlah_tkd_sawah ?>"
				autocomplete="off">
			<?= form_error('jumlah_tkd_sawah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah TKD Tegalan</label>
			<input type="text" class="form-control " name="jumlah_tkd_tegalan" value="<?= $tkd->jumlah_tkd_tegalan ?>"
				autocomplete="off">
			<?= form_error('jumlah_tkd_tegalan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah TKD Kebun</label>
			<input type="text" class="form-control " name="jumlah_tkd_kebun" value="<?= $tkd->jumlah_tkd_tegalan ?>"
				autocomplete="off">
			<?= form_error('jumlah_tkd_kebun','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah TKD Tambak Kolam</label>
			<input type="text" class="form-control " name="jumlah_tkd_tambak_kolam"
				value="<?= $tkd->jumlah_tkd_tambak ?>" autocomplete="off">
			<?= form_error('jumlah_tkd_tambak_kolam','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah TKD Tanah Kering Darat</label>
			<input type="text" class="form-control " name="jumlah_tkd_darat" value="<?= $tkd->jumlah_tkd_tanah ?>"
				autocomplete="off">
			<?= form_error('jumlah_tkd_darat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Patok Tanda Batas</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="ada" name="patok" value="Ada"
					<?= $tkd->patok_tanda_batas=='Ada'?'checked':'' ?>>
				<label for="ada">Ada
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak" name="patok" value="Tidak Ada"
					<?= $tkd->patok_tanda_batas=='Tidak Ada'?'checked':'' ?>>
				<label for="tidak">Tidak Ada
				</label>
			</div>
		</div>
		<div class="form-group clearfix">
			<label>Papan Nama</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="ada2" name="papan" value="Ada" <?= $tkd->papan_nama=='Ada'?'checked':'' ?>>
				<label for="ada2">Ada
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak2" name="papan" value="Tidak Ada"
					<?= $tkd->papan_nama=='Tidak Ada'?'checked':'' ?>>
				<label for="tidak2">Tidak Ada
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Lokasi</label>
			<input type="text" class="form-control " name="lokasi" value="<?= $tkd->lokasi ?>" autocomplete="off">
			<?= form_error('lokasi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Peruntukan</label>
			<input type="text" class="form-control " name="peruntukan" value="<?= $tkd->peruntukan ?>"
				autocomplete="off">
			<?= form_error('peruntukan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kepdes')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
