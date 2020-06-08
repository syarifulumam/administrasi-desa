<div class="card">
	<div class="card-header">
		Edit Anggota BPD
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$anggota_bpd->id_anggota_bpd));?>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" class="form-control " name="nama_lengkap" value="<?= $anggota_bpd->nama ?>"
				autocomplete="off">
			<?= form_error('nama_lengkap','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Anggota</label>
			<input type="number" min="0" class="form-control " name="nomor_anggota" value="<?= $anggota_bpd->nomor_anggota  ?>" autocomplete="off">
			<?= form_error('nomor_anggota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>NIP</label>
			<input type="number" min="0" class="form-control " name="nip" value="<?= $anggota_bpd->nip ?>" autocomplete="off">
			<?= form_error('nip','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Jenis Kelamin</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="pria" name="jenis_kelamin" value="Laki - Laki"
					<?= $anggota_bpd->jenis_kelamin=="Laki - Laki"?"checked":"" ?>>
				<label for="pria">Laki - Laki
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="wanita" name="jenis_kelamin" value="Perempuan"
					<?= $anggota_bpd->jenis_kelamin=="Perempuan"?"checked":"" ?>>
				<label for="wanita">Perempuan
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" class="form-control " name="tempat_lahir" value="<?= $anggota_bpd->tempat_lahir ?>"
				autocomplete="off">
			<?= form_error('tempat_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($anggota_bpd->tanggal_lahir)) ?>" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Agama</label>
			<select class="form-control custom-select" name="agama" value="<?=set_value('agama')?>">
				<option value="">-- Pilih Agama --</option>
				<option <?= $anggota_bpd->agama=="Islam"?"selected":"" ?>>Islam</option>
				<option <?= $anggota_bpd->agama=="Kristen"?"selected":"" ?>>Kristen</option>
				<option <?= $anggota_bpd->agama=="Hindu"?"selected":"" ?>>Hindu</option>
				<option <?= $anggota_bpd->agama=="Budha"?"selected":"" ?>>Budha</option>
			</select>
			<?= form_error('agama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pangkat</label>
			<input type="text" class="form-control " name="pangkat" value="<?= $anggota_bpd->pangkat ?>"
				autocomplete="off">
			<?= form_error('pangkat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jabatan</label>
			<input type="text" class="form-control " name="jabatan" value="<?= $anggota_bpd->jabatan ?>"
				autocomplete="off">
			<?= form_error('jabatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pendidikan Terakhir</label>
			<select class="form-control custom-select" name="pendidikan" value="<?=set_value('pendidikan')?>">
				<option value="">-- Pilih Pendidikan --</option>
				<option <?= $anggota_bpd->pendidikan_terakhir=="SD"?"selected":"" ?>>SD</option>
				<option <?= $anggota_bpd->pendidikan_terakhir=="SMP"?"selected":"" ?>>SMP</option>
				<option <?= $anggota_bpd->pendidikan_terakhir=="SMA"?"selected":"" ?>>SMA</option>
				<option <?= $anggota_bpd->pendidikan_terakhir=="DIPLOMA"?"selected":"" ?>>DIPLOMA</option>
				<option <?= $anggota_bpd->pendidikan_terakhir=="SARJANA"?"selected":"" ?>>SARJANA</option>
			</select>
			<?= form_error('pendidikan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pengangkatan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pengangkatan" value="<?= date('d-m-Y', strtotime($anggota_bpd->tanggal_pengangkatan)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('tanggal_pengangkatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Pengangkatan</label>
			<input type="number" min="0" class="form-control " name="nomor_pengangkatan" value="<?=  $anggota_bpd->nomor_pengangkatan  ?>" autocomplete="off">
			<?= form_error('nomor_pengangkatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pemberhentian</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pemberhentian" value="<?= date('d-m-Y', strtotime($anggota_bpd->tanggal_pemberhentian)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('tanggal_pemberhentian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Pemberhentian</label>
			<input type="number" min="0" class="form-control " name="nomor_pemberhentian" value="<?= $anggota_bpd->nomor_pemberhentian ?>" autocomplete="off">
			<?= form_error('nomor_pemberhentian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Keaktifan</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="aktif" name="keaktifan" value="1"
					<?= $anggota_bpd->keaktifan==1?"checked":"" ?>>
				<label for="aktif">Aktif</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak_aktif" name="keaktifan" value="0"
					<?= $anggota_bpd->keaktifan==0?"checked":"" ?>>
				<label for="tidak_aktif">Tidak Aktif</label>
			</div>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $anggota_bpd->keterangan?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('anggota_bpd')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
