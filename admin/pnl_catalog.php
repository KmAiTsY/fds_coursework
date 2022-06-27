<?php
session_start();
include ('../db.php');

if(!isset($_SESSION["sess_id"])) {
	header ('location: ../index');
} else {
	if ($_SESSION["sess_status"] != 'admin') {
		header ('location: ../index');
	} 
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../favicon.ico">
	<title>Меню адмін</title>
	<link rel="stylesheet" href="../bootstrap/css/all.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
</head>
<body>

	<div class="container">
		
		<div class="row p-4">
			<div class="col">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item"><a href="pnl_user">Користувачі</a></li>
					<li class="list-group-item"><a href="pnl_order">Замовлення</a></li>
					<li class="list-group-item active"><a href="pnl_catalog" class="text-white">Каталог</a></li>
					<li class="list-group-item"><a href="../action?act=lgout" class="text-danger">Вихід</a></li>
				</ul>
			</div>
		</div>

		<div class="row p-4">
			<div class="col">
				<h2>Список всіх каталогів</h2>
				<table class="table">
					<tr>
						<th>no.</th>
						<th>Зображення</th>
						<th>Ім'я</th>
						<th>Ціна</th>
						<th>Опис</th>
						<th>Ім'я магазину</th>
					</tr>

					<?php
					$query = "SELECT * from fds_ctlog";
					$result = mysqli_query($conn, $query);
					$count = 1;

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)){

							echo '<tr>';
							echo '<td>' . $count++ . '</td>';
							echo '<td><img class="img-fluid" width="150" src="../img/menu/'. $row['ctlog_img'] .'" alt="no image"></td>';
							echo '<td>' . $row['ctlog_nme'] . '</td>';
							echo '<td>' . $row['ctlog_prc'] . '</td>';
							echo '<td>' . $row['ctlog_desc'] . '</td>';
							echo '<td>' . $row['ctlog_shp'] . '</td>';
						}
					}

					?>
				</table>
			</div>
		</div>

	</div>

</body>
</html>