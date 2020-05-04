<?php
include('koneksi.php');
$produk = mysqli_query($koneksi,"select * from negara");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['negara'];
	
	$query = mysqli_query($koneksi,"select sum(total_sembuh) as total_sembuh from covid where id_negara='".$row['id_negara']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['total_sembuh'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 600px;height: 600px">
		<canvas id="myChart"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_produk); ?>,
				datasets: [{
					label: 'Grafik Kenaikan Positif',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	</script>
</body>
</html>