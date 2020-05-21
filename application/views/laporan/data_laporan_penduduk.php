<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Laporan Penduduk</h3>
		</div>
		<?=form_open('');?>
		<div class="card-body">
			<!-- Date range -->
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						</span>
					</div>
					<input type="text" class="form-control float-right" name="tanggal" id="reservation">
				</div>
				<!-- /.input group -->
			</div>
			<!-- /.form group -->
			<div class="form-group">
				<select name="status" class="form-control custom-select">
					<option value="">-- Pilih Status --</option>
					<option value="Semua">Semua</option>
					<option value="Tetap">Tetap</option>
					<option value="Pendatang">Pendatang</option>
				</select>
				<?= form_error('status','<small class="text-danger pl-1">','</small>') ?>
			</div>
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-primary"><i class="far fa fa-print"></i> Cetak</button>
			</form>
		</div>
	</div>
	<!-- /.card -->
</div>
