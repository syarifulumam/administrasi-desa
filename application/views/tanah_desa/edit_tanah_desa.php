<div class="card">
	<div class="card-header">
		Edit Tanah Desa
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$tanah_desa->id_tanah_desa));?>
		<div class="form-group">
			<label>Nama Perorangan</label>
			<input type="text" class="form-control " name="nama_perorangan" value="<?= $tanah_desa->nama_perorangan ?>"
				autocomplete="off">
			<?= form_error('nama_perorangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Badan Hukum</label>
			<input type="text" class="form-control " name="badan_hukum" value="<?= $tanah_desa->badan_hukum ?>"
				autocomplete="off">
			<?= form_error('badan_hukum','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah Luas Tanah</label>
			<input type="text" class="form-control " name="jumlah_luas_tanah"
				value="<?= $tanah_desa->jumlah_luas_tanah ?>" autocomplete="off">
			<?= form_error('jumlah_luas_tanah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Sertifikasi</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="ya" name="sertifikasi" value="Ada"
					<?= $tanah_desa->sertifikasi=="Ada"?'checked':'' ?>>
				<label for="ya">Ada
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak" name="sertifikasi" value="Tidak Ada"
					<?= $tanah_desa->sertifikasi=="Tidak Ada"?'checked':'' ?>>
				<label for="tidak">Tidak Ada
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>HM</label>
			<input type="text" class="form-control " name="hm" value="<?= $tanah_desa->hm ?>" autocomplete="off">
			<?= form_error('hm','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>HGB</label>
			<input type="text" class="form-control " name="hgb" value="<?= $tanah_desa->hgb ?>" autocomplete="off">
			<?= form_error('hgb','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>HP</label>
			<input type="text" class="form-control " name="hp" value="<?= $tanah_desa->hp ?>" autocomplete="off">
			<?= form_error('hp','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>HGU</label>
			<input type="text" class="form-control " name="hgu" value="<?= $tanah_desa->hgu ?>" autocomplete="off">
			<?= form_error('hgu','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>HPL</label>
			<input type="text" class="form-control " name="hpl" value="<?= $tanah_desa->hpl ?>" autocomplete="off">
			<?= form_error('hpl','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>MA</label>
			<input type="text" class="form-control " name="ma" value="<?= $tanah_desa->ma ?>" autocomplete="off">
			<?= form_error('ma','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>VI</label>
			<input type="text" class="form-control " name="vi" value="<?= $tanah_desa->vi ?>" autocomplete="off">
			<?= form_error('vi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>TN</label>
			<input type="text" class="form-control " name="tn" value="<?= $tanah_desa->tn ?>" autocomplete="off">
			<?= form_error('tn','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Perumahan</label>
			<input type="text" class="form-control " name="pengguna_tanah_perumahan"
				value="<?= $tanah_desa->tanah_rumah ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_perumahan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Perorangan</label>
			<input type="text" class="form-control " name="pengguna_tanah_perorangan"
				value="<?= $tanah_desa->tanah_perorangan ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_perorangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Perdagangan</label>
			<input type="text" class="form-control " name="pengguna_tanah_perdagangan"
				value="<?= $tanah_desa->tanah_perdagangan ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_perdagangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Perkantoran</label>
			<input type="text" class="form-control " name="pengguna_tanah_perkantoran"
				value="<?= $tanah_desa->tanah_perkantoran ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_perkantoran','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Industri</label>
			<input type="text" class="form-control " name="pengguna_tanah_industri"
				value="<?= $tanah_desa->tanah_industri ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_industri','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Umum</label>
			<input type="text" class="form-control " name="pengguna_tanah_umum"
				value="<?= $tanah_desa->tanah_fasilitas_umum ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_umum','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Sawah</label>
			<input type="text" class="form-control " name="pengguna_tanah_sawah" value="<?= $tanah_desa->tanah_sawah ?>"
				autocomplete="off">
			<?= form_error('pengguna_tanah_sawah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Tegalan</label>
			<input type="text" class="form-control " name="pengguna_tanah_tegalan"
				value="<?= $tanah_desa->tanah_tegalan ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_tegalan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Perkebunan</label>
			<input type="text" class="form-control " name="pengguna_tanah_perkebunan"
				value="<?= $tanah_desa->tanah_perkebunan ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_perkebunan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Pertenakan</label>
			<input type="text" class="form-control " name="pengguna_tanah_pertenakan"
				value="<?= $tanah_desa->tanah_pertenakan ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_pertenakan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Hutan</label>
			<input type="text" class="form-control " name="pengguna_tanah_hutan" value="<?= $tanah_desa->tanah_hutan ?>"
				autocomplete="off">
			<?= form_error('pengguna_tanah_hutan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pengguna Tanah Kosong</label>
			<input type="text" class="form-control " name="pengguna_tanah_kosong"
				value="<?= $tanah_desa->tanah_kosong ?>" autocomplete="off">
			<?= form_error('pengguna_tanah_kosong','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $tanah_desa->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('tanah_desa')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
