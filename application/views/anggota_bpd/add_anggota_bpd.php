<div class="card">
	<div class="card-header">
		Add Anggota BPD
	</div>
	<div class="card-body">
		<?= form_open_multipart('');?>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" class="form-control " name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>"
				autocomplete="off">
			<?= form_error('nama_lengkap','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Anggota</label>
			<input type="text" class="form-control " name="nomor_anggota" value="<?= set_value('nomor_anggota') ?>"
				autocomplete="off">
			<?= form_error('nomor_anggota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>NIP</label>
			<input type="text" class="form-control " name="nip" value="<?= set_value('nip') ?>" autocomplete="off">
			<?= form_error('nip','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Jenis Kelamin</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="pria" name="jenis_kelamin" value="Laki - Laki" checked>
				<label for="pria">Laki - Laki
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="wanita" name="jenis_kelamin" value="Perempuan">
				<label for="wanita">Perempuan
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" class="form-control " name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>"
				autocomplete="off">
			<?= form_error('tempat_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_lahir" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Agama</label>
			<select class="form-control custom-select" name="agama" value="<?=set_value('agama')?>">
				<option value="">-- Pilih Agama --</option>
				<option>Islam</option>
				<option>Kristen</option>
				<option>Hindu</option>
				<option>Budha</option>
			</select>
			<?= form_error('agama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pangkat</label>
			<input type="text" class="form-control " name="pangkat" value="<?= set_value('pangkat') ?>"
				autocomplete="off">
			<?= form_error('pangkat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jabatan</label>
			<input type="text" class="form-control " name="jabatan" value="<?= set_value('jabatan') ?>"
				autocomplete="off">
			<?= form_error('jabatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pendidikan Terakhir</label>
			<select class="form-control custom-select" name="pendidikan" value="<?=set_value('pendidikan')?>">
				<option value="">-- Pilih Pendidikan --</option>
				<option>SD</option>
				<option>SMP</option>
				<option>SMA</option>
				<option>DIPLOMA</option>
				<option>SARJANA</option>
			</select>
			<?= form_error('pendidikan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pengangkatan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pengangkatan" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_pengangkatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Pengangkatan</label>
			<input type="text" class="form-control " name="nomor_pengangkatan"
				value="<?= set_value('nomor_pengangkatan') ?>" autocomplete="off">
			<?= form_error('nomor_pengangkatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pemberhentian</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pemberhentian" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_pemberhentian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Pemberhentian</label>
			<input type="text" class="form-control " name="nomor_pemberhentian"
				value="<?= set_value('nomor_pemberhentian') ?>" autocomplete="off">
			<?= form_error('nomor_pemberhentian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Keaktifan</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="aktif" name="keaktifan" value="1" checked>
				<label for="aktif">Aktif
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak_aktif" name="keaktifan" value="0">
				<label for="tidak_aktif">Tidak Aktif
				</label>
			</div>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Foto</label>
			<input type="file" class="form-control-file" name="foto">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('anggota_bpd')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
