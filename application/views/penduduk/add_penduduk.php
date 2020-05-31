<div class="card">
	<div class="card-header">
		Add Penduduk
	</div>
	<div class="card-body">
		<?= form_open_multipart('');?>
		<div class="form-group clearfix">
			<label>Status Penduduk</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tetap" name="status_penduduk" value="Tetap" checked>
				<label for="tetap">tetap
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="pendatang" name="status_penduduk" value="Pendatang">
				<label for="pendatang">pendatang
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Nomor KK</label>
			<input type="number" min="0" class="form-control " name="nomor_kk" value="<?= set_value('nomor_kk') ?>"
				autocomplete="off">
			<?= form_error('nomor_kk','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Status Pernikahan</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="belumkawin" name="status_pernikahan" value="Belum Menikah" checked>
				<label for="belumkawin">Belum Kawin
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="sudahkawin" name="status_pernikahan" value="Sudah Menikah">
				<label for="sudahkawin">Sudah Kawin
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="cerai" name="status_pernikahan" value="Cerai">
				<label for="cerai">Cerai
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Nomor KTP / NIK</label>
			<input type="number" min="0" class="form-control " name="nomor_ktp" value="<?= set_value('nomor_ktp') ?>"
				autocomplete="off">
			<?= form_error('nomor_ktp','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control " name="nama" value="<?= set_value('nama') ?>" autocomplete="off">
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
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
					data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_lahir','<small class="text-danger pl-1">','</small>') ?>
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
		<div class="form-group clearfix">
			<label>Status Dalam Keluarga</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="Ayah" name="status_dalam_keluarga" value="Ayah" checked>
				<label for="Ayah">Ayah
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="Ibu" name="status_dalam_keluarga" value="Ibu">
				<label for="Ibu">Ibu
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="Anak" name="status_dalam_keluarga" value="Anak">
				<label for="Anak">Anak
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Pekerjaan</label>
			<input type="text" class="form-control " name="pekerjaan" value="<?= set_value('pekerjaan') ?>"
				autocomplete="off">
			<?= form_error('pekerjaan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kewarga Negaraan</label>
			<input type="text" class="form-control " name="negaraan" value="<?= set_value('negaraan') ?>"
				autocomplete="off">
			<?= form_error('negaraan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Provinsi</label>
			<select class="form-control select2" style="width: 100%;" name="provinsi" id="provinsi">
				<option value="">-- Pilih Provinsi --</option>
				<?php foreach ($provinsi as $key):?>
				<option value="<?= $key->id_provinsi ?>"><?= $key->nama_provinsi ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kota</label>
			<select class="form-control select2" style="width: 100%;" name="kota" id="kota">
				<option value="">-- Pilih Kota --</option>
			</select>
			<?= form_error('kota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kecamatan</label>
			<select class="form-control select2" style="width: 100%;" name="kecamatan" id="kecamatan">
				<option value="">-- Pilih Kecamatan --</option>
			</select>
			<?= form_error('kecamatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kelurahan</label>
			<select class="form-control select2" style="width: 100%;" name="kelurahan" id="kelurahan">
				<option value="">-- Pilih Kelurahan --</option>
			</select>
			<?= form_error('kelurahan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Dusun</label>
			<select class="form-control select2" style="width: 100%;" name="dusun" id="dusun">
				<option value="">-- Pilih Dusun --</option>
			</select>
			<?= form_error('dusun','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="row pb-2">
			<div class="col">
				<label>RT</label>
				<input type="number" min="0" class="form-control " name="rt" value="<?=set_value('rt')?>" autocomplete="off">
				<?= form_error('rt','<small class="text-danger pl-1">','</small>') ?>
			</div>
			<div class="col">
				<label>RW</label>
				<input type="number" min="0"  class="form-control " name="rw" value="<?=set_value('rw')?>" autocomplete="off">
				<?= form_error('rw','<small class="text-danger pl-1">','</small>') ?>
			</div>
		</div>
		<div class="form-group">
			<label for="judul">Alamat</label>
			<textarea class="form-control" rows="3" name="alamat"><?=set_value('alamat')?></textarea>
			<?= form_error('alamat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Kode Pos</label>
			<input type="number" min="0" class="form-control " name="kode_pos" value="<?=set_value('kode_pos')?>"
				autocomplete="off">
			<?= form_error('kode_pos','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Nomor Telepon</label>
			<input type="number" min="0" class="form-control " name="nomor_telepon" value="<?=set_value('nomor_telepon')?>"
				autocomplete="off">
			<?= form_error('nomor_telepon','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Nama Ibu</label>
			<input type="text" class="form-control " name="nama_ibu" value="<?=set_value('nama_ibu')?>"
				autocomplete="off">
			<?= form_error('nama_ibu','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Nama Ayah</label>
			<input type="text" class="form-control " name="nama_ayah" value="<?=set_value('nama_ayah')?>"
				autocomplete="off">
			<?= form_error('nama_ayah','<small class="text-danger pl-1">','</small>') ?>
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
			<label for="judul">Foto</label>
			<input type="file" class="form-control-file" name="foto">
		</div>
	</div>
</div>

<div class="card card-warning">
	<div class="card-header">
		Isi Form ini jika status penduduk pindahan / pendatang
	</div>
	<div class="card-body">
		<div class="form-group">
			<label for="exampleInputEmail1">Tanggal Pindahan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask name="tanggal_pindahan">
			</div>
		</div>
		<div class="form-group">
			<label for="judul">Alamat Sebelumnya</label>
			<textarea class="form-control" rows="3" name="alamat_sebelumnya"></textarea>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"></textarea>
		</div>
		<div class="form-group">
			<label for="judul">Kode Pos</label>
			<input type="number" min="0" class="form-control " name="kode_pos_sebelumnya"
				value="<?= set_value('kode_pos_sebelumnya') ?>" autocomplete="off">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('penduduk')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
