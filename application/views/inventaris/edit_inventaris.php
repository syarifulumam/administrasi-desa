<div class="card">
	<div class="card-header">
		Edit Inventaris
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$inventaris->id_inventaris)) ?>
		<div class="form-group">
			<label>Nama Barang</label>
			<input type="text" class="form-control " name="nama_barang" value="<?= $inventaris->nama_barang ?>"
				autocomplete="off">
			<?= form_error('nama_barang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Asal Barang</label>
			<input type="text" class="form-control " name="asal_barang" value="<?= $inventaris->asal_barang ?>"
				autocomplete="off">
			<?= form_error('asal_barang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Keadaan Awal Tahun</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="baik" name="keadaan_awal_tahun" value="Baik"
					<?= $inventaris->keadaan_awal_tahun == "Baik"? 'checked':'' ?>>
				<label for="baik">Baik
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="rusak" name="keadaan_awal_tahun" value="Rusak"
					<?= $inventaris->keadaan_awal_tahun == "Rusak"? 'checked':'' ?>>
				<label for="rusak">Rusak
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Jumlah Kondisi Baik</label>
			<input type="number" min="0" class="form-control " name="jumlah_kondisi_baik" value="<?=$inventaris->jumlah_kondisi_baik  ?>" autocomplete="off">
			<?= form_error('jumlah_kondisi_baik','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah Kondisi Rusak</label>
			<input type="number" min="0" class="form-control " name="jumlah_kondisi_rusak" value="<?=$inventaris->jumlah_kondisi_rusak ?>" autocomplete="off">
			<?= form_error('jumlah_kondisi_rusak','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah Penghapusan Yang Rusak</label>
			<input type="number" min="0" class="form-control " name="jumlah_penghapusan_rusak" value="<?=$inventaris->jumlah_penghapusan_rusak?>" autocomplete="off">
			<?= form_error('jumlah_penghapusan_rusak','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah Penghapusan Yang Dijual</label>
			<input type="number" min="0" class="form-control " name="jumlah_penghapusan_dijual" value="<?=$inventaris->jumlah_penghapusan_dijual?>" autocomplete="off">
			<?= form_error('jumlah_penghapusan_dijual','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah Penghapusan Yang Disumbangkan</label>
			<input type="number" min="0" class="form-control " name="jumlah_penghapusan_disumbangkan" value="<?=$inventaris->jumlah_penghapusan_disumbangkan?>" autocomplete="off">
			<?= form_error('jumlah_penghapusan_disumbangkan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Penghapusan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_penghapusan" value="<?= date('d-m-Y', strtotime($inventaris->tanggal_penghapusan)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('tanggal_penghapusan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Keadaan Barang Akhir Tahun</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="baik2" name="keadaan_barang_akhir_tahun" value="Baik"
					<?= $inventaris->keadaan_awal_tahun == "Baik"? 'checked':'' ?>>
				<label for="baik2">Baik
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="rusak2" name="keadaan_barang_akhir_tahun" value="Rusak"
					<?= $inventaris->keadaan_awal_tahun == "Rusak"? 'checked':'' ?>>
				<label for="rusak2">Rusak
				</label>
			</div>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $inventaris->keterangan?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('inventaris')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
