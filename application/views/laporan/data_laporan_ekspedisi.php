<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Laporan Ekspedisi</h3>
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
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-primary"><i class="far fa fa-print"></i> Cetak</button>
			</form>
		</div>
	</div>
	<!-- /.card -->
</div>
