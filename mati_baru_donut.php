<?php
include('koneksi.php');
$produk = mysqli_query($koneksi,"select * from negara");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['negara'];
	
	$query = mysqli_query($koneksi,"select sum(mati_baru) as mati_baru from covid where id_negara='".$row['id_negara']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['mati_baru'];
}
?>
<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div id="canvas-holder" style="width:40%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)',
					'rgba(80, 99, 120, 0.2)','rgba(100, 120, 233, 0.2)','rgba(120, 87, 111, 0.2)','rgba(100, 20, 200, 0.2)',
					'rgba(78, 122, 65, 0.2)','rgba(150, 87, 190, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)',
					'rgba(80, 99, 120, 1)','rgba(100, 120, 233, 1)','rgba(120, 87, 111, 1)','rgba(100, 20, 200, 1)',
					'rgba(78, 122, 65, 1)','rgba(150, 87, 190, 1)'
					],
					label: 'Presentase Covid',
				}],
				labels: <?php echo json_encode($nama_produk); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>
