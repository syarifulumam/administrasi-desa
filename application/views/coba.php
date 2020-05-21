<div class="row">
	<!-- /.col (LEFT) -->
	<div class="col-md-6">
		<!-- BAR CHART -->
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">Bar Chart</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove"><i
							class="fas fa-times"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="chart">
					<canvas id="barChart"
						style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col (RIGHT) -->
</div>
<!-- /.row -->


<!-- jQuery -->
<script src="<?=base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets/adminlte/')?>plugins/chart.js/Chart.min.js"></script>
<script>
	$(function () {
		/* ChartJS
		 * -------
		 * Here we will create a few charts using ChartJS
		 */

		//--------------
		//- AREA CHART -
		//--------------

		// Get context with jQuery - using jQuery's .get() method.
		var areaChartCanvas = $('#barChart').get(0).getContext('2d')

		var areaChartData = {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
					label: 'Digital Goods',
					backgroundColor: 'rgba(60,141,188,0.9)',
					borderColor: 'rgba(60,141,188,0.8)',
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: 'rgba(60,141,188,1)',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data: [2, 4, 4, 3, 8, 7, 9, 3, 5, 6, 8, 2]
				},
				{
					label: 'Electronics',
					backgroundColor: 'rgba(210, 214, 222, 1)',
					borderColor: 'rgba(210, 214, 222, 1)',
					pointRadius: false,
					pointColor: 'rgba(210, 214, 222, 1)',
					pointStrokeColor: '#c1c7d1',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(220,220,220,1)',
					data: [5, 9, 8, 2, 6, 5, 4, 8, 4, 6, 8, 2]
				},
			]
		}

		//-------------
		//- BAR CHART -
		//-------------
		var barChartCanvas = $('#barChart').get(0).getContext('2d')
		var barChartData = jQuery.extend(true, {}, areaChartData)
		var temp0 = areaChartData.datasets[0]
		var temp1 = areaChartData.datasets[1]
		barChartData.datasets[0] = temp1
		barChartData.datasets[1] = temp0

		var barChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false
		}

		var barChart = new Chart(barChartCanvas, {
			type: 'bar',
			data: barChartData,
			options: barChartOptions
		})


	})

</script>
