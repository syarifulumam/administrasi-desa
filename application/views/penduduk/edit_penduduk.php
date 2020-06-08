<div class="card">
	<div class="card-header">
		Edit Penduduk
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$penduduk->id_penduduk,'foto_db'=>$penduduk->foto));?>
		<div class="form-group clearfix">
			<label>Status Penduduk</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tetap" name="status_penduduk" value="Tetap"
					<?= $penduduk->status_penduduk == 'Tetap' ? 'checked':''?>>
				<label for="tetap">tetap
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="pendatang" name="status_penduduk" value="Pendatang"
					<?= $penduduk->status_penduduk == 'Pendatang' ? 'checked':''?>>
				<label for="pendatang">pendatang
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Nomor KK</label>
			<input type="number" min="0" class="form-control " name="nomor_kk" value="<?= $penduduk->no_kk ?>" autocomplete="off">
			<?= form_error('nomor_kk','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Status Pernikahan</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="belumkawin" name="status_pernikahan" value="Belum Menikah"
					<?= $penduduk->status_perkawinan == 'Belum Menikah' ? 'checked':''?>>
				<label for="belumkawin">belumkawin
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="sudahkawin" name="status_pernikahan" value="Sudah Menikah"
					<?= $penduduk->status_perkawinan == 'Sudah Menikah' ? 'checked':''?>>
				<label for="sudahkawin">sudahkawin
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="cerai" name="status_pernikahan" value="Cerai"
					<?= $penduduk->status_perkawinan == 'Cerai' ? 'checked':''?>>
				<label for="cerai">cerai
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Nomor KTP / NIK</label>
			<input type="number" min="0" class="form-control " name="nomor_ktp" value="<?= $penduduk->nik ?>" autocomplete="off">
			<?= form_error('nomor_ktp','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control " name="nama" value="<?= $penduduk->nama_lengkap ?>"
				autocomplete="off">
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" class="form-control " name="tempat_lahir" value="<?= $penduduk->tempat_lahir ?>"
				autocomplete="off">
			<?= form_error('tempat_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($penduduk->tanggal_lahir)) ?>" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Jenis Kelamin</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="pria" name="jenis_kelamin" value="Laki - Laki"
					<?= $penduduk->jenis_kelamin == 'Laki - Laki' ? 'checked':''?>>
				<label for="pria">Laki - Laki
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="wanita" name="jenis_kelamin" value="Perempuan"
					<?= $penduduk->jenis_kelamin == 'Perempuan' ? 'checked':''?>>
				<label for="wanita">Perempuan
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Agama</label>
			<select class="form-control custom-select" name="agama" value="<?=set_value('agama')?>">
				<option value="">-- Pilih Agama --</option>
				<option <?= $penduduk->agama == 'Islam' ? 'selected':''?>>Islam</option>
				<option <?= $penduduk->agama == 'Kristen' ? 'selected':''?>>Kristen</option>
				<option <?= $penduduk->agama == 'Hindu' ? 'selected':''?>>Hindu</option>
				<option <?= $penduduk->agama == 'Budha' ? 'selected':''?>>Budha</option>
			</select>
			<?= form_error('agama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Status Dalam Keluarga</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="Ayah" name="status_dalam_keluarga" value="Ayah"
					<?= $penduduk->status_dalam_keluarga == 'Ayah' ? 'checked':''?>>
				<label for="Ayah">Ayah
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="Ibu" name="status_dalam_keluarga" value="Ibu"
					<?= $penduduk->status_dalam_keluarga == 'Ibu' ? 'checked':''?>>
				<label for="Ibu">Ibu
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="Anak" name="status_dalam_keluarga" value="Anak"
					<?= $penduduk->status_dalam_keluarga == 'Anak' ? 'checked':''?>>
				<label for="Anak">Anak
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Pekerjaan</label>
			<input type="text" class="form-control " name="pekerjaan" value="<?= $penduduk->pekerjaan ?>"
				autocomplete="off">
			<?= form_error('pekerjaan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kewarga Negaraan</label>
			<input type="text" class="form-control " name="negaraan" value="<?= $penduduk->kewarganegaraan ?>"
				autocomplete="off">
			<?= form_error('negaraan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Provinsi</label>
			<select class="form-control select2" style="width: 100%;" name="provinsi" id="provinsi">
				<option value="">-- Pilih Provinsi --</option>
				<?php foreach ($provinsi as $key):?>
				<option value="<?= $key->id_provinsi ?>" <?= $key->id_provinsi == $penduduk->provinsi ? 'selected':''?>>
					<?= $key->nama_provinsi?>
				</option>
				<?php endforeach; ?>
			</select>
			<?= form_error('provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kota</label>
			<select class="form-control select2" style="width: 100%;" name="kota" id="kota">
				<option value="<?= $penduduk->kota ?>"><?= $penduduk->nama_kota ?></option>
			</select>
			<?= form_error('kota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kecamatan</label>
			<select class="form-control select2" style="width: 100%;" name="kecamatan" id="kecamatan">
				<option value="<?= $penduduk->kecamatan ?>"><?= $penduduk->nama_kecamatan ?></option>
			</select>
			<?= form_error('kecamatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kelurahan</label>
			<select class="form-control select2" style="width: 100%;" name="kelurahan" id="kelurahan">
				<option value="<?= $penduduk->kelurahan ?>"><?= $penduduk->nama_kelurahan ?></option>
			</select>
			<?= form_error('kelurahan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Dusun</label>
			<select class="form-control select2" style="width: 100%;" name="dusun" id="dusun">
				<option value="<?= $penduduk->dusun ?>"><?= $penduduk->nama_dusun ?></option>
			</select>
			<?= form_error('dusun','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="row pb-2">
			<div class="col">
				<label>RT</label>
				<input type="number" min="0" class="form-control " name="rt" value="<?= $penduduk->rt ?>" autocomplete="off">
				<?= form_error('rt','<small class="text-danger pl-1">','</small>') ?>
			</div>
			<div class="col">
				<label>RW</label>
				<input type="number" min="0" class="form-control " name="rw" value="<?= $penduduk->rw ?>" autocomplete="off">
				<?= form_error('rw','<small class="text-danger pl-1">','</small>') ?>
			</div>
		</div>
		<div class="form-group">
			<label for="judul">Alamat</label>
			<textarea class="form-control" rows="3" name="alamat"><?=$penduduk->alamat?></textarea>
			<?= form_error('alamat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Kode Pos</label>
			<input type="number" min="0" class="form-control " name="kode_pos" value="<?=$penduduk->kode_pos?>"
				autocomplete="off">
			<?= form_error('kode_pos','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Nomor Telepon</label>
			<input type="number" min="0" class="form-control " name="nomor_telepon" value="<?=$penduduk->no_telepon?>"
				autocomplete="off">
			<?= form_error('nomor_telepon','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Nama Ibu</label>
			<input type="text" class="form-control " name="nama_ibu" value="<?=$penduduk->nama_ibu?>"
				autocomplete="off">
			<?= form_error('nama_ibu','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Nama Ayah</label>
			<input type="text" class="form-control " name="nama_ayah" value="<?=$penduduk->nama_bapak?>"
				autocomplete="off">
			<?= form_error('nama_ayah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pendidikan Terakhir</label>
			<select class="form-control custom-select" name="pendidikan" value="<?=set_value('pendidikan')?>">
				<option value="">-- Pilih Pendidikan --</option>
				<option <?= $penduduk->pendidikan_terakhir == 'SD' ? 'selected':''?>>SD</option>
				<option <?= $penduduk->pendidikan_terakhir == 'SMP' ? 'selected':''?>>SMP</option>
				<option <?= $penduduk->pendidikan_terakhir == 'SMA' ? 'selected':''?>>SMA</option>
				<option <?= $penduduk->pendidikan_terakhir == 'DIPLOMA' ? 'selected':''?>>DIPLOMA</option>
				<option <?= $penduduk->pendidikan_terakhir == 'SARJANA' ? 'selected':''?>>SARJANA</option>
			</select>
			<?= form_error('pendidikan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Foto</label>
			<input type="file" class="form-control-file" name="foto">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('penduduk')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
