<?php
	require 'list_function.php';
	$con = koneksi();
	echo "<script>console.log('Connected to DB!')</script>";

	$data_transaksi = retrive_query("SELECT * FROM transaksi");

	if(isset($_POST['delete-button'])) {
		$id = $_POST['id'];

		query("DELETE FROM detil_transaksi WHERE id_transaksi = '$id'");
		query("DELETE FROM transaksi WHERE id_transaksi = '$id'");
		header("Refresh:0");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.php">
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800" rel="stylesheet">
	<title></title>
</head>
<body>
	<div id="main-container">
		<div id="dom-con" style="display: none;">
			<form method="POST" id="form-con">
				<button id="dom-delete-btn" name="delete-button">delete</button>
			</form>
		</div>
		<div id="top-container">
			<div id="top-back">
				<span class="wrap-column-center" onclick="goBackPage()">
					<img id="back-arrow" class="wrap-circle" src="dum-img/left_arrow.png">
					<!-- <h2 style="padding: 0; margin: 5px;">Kembali</h2> -->
				</span>
			</div>
			<div id="top-search">
				<span class="wrap-row-center">
					<button class="clean-btn" style="margin-right: 10px;">Search</button>
					<input style="height: 27px; width: 100%; border-radius: 10px;
					border: none; width: 30%; min-width: 150px; " type="text" name="">
				</span>
			</div>
		</div>
		<div id="content-container">
			<div id="top-content">
				
			</div>
			<div id="mid-content">
				<div id="table-header" class="table-outer">
					<div class="table-header-content">
						<div class="table-wrapper-1">
							<div class="table-header-text" id="filter-date">
								<p style="margin: 0px 15px 0px 10px; font-size: 19px;">Date</p>
							</div>
						</div>
						<div class="table-wrapper-2">
							<div class="table-header-text" id="filter-id">
								<p style="margin: 0px 15px 0px 10px; font-size: 19px;">ID</p>
							</div>
						</div>
						<div class="table-wrapper-3">
							<div class="table-header-text" id="filter-total">
								<p style="margin: 0px 15px 0px 10px; font-size: 19px;">Total</p>
							</div>	
						</div>
					</div>
				</div>
				<div id="content-table-wrapper" class="table-outer">

					<?php $i = 1; foreach($data_transaksi as $tr):?>

					<div class="table-content" onclick="open_detail(this)">
						<div class="table-wrapper-1">
							<?= $tr['tanggal_transaksi']; ?>
						</div>
						<div class="table-wrapper-2">
							<?= $tr['id_transaksi']; ?>
						</div>
						<div class="table-wrapper-3">
							<?= $tr['total_transaksi']; ?>
						</div>
					</div>
						<?php
							$id = $tr['id_transaksi'];
							$detil_transaksi = retrive_query("SELECT * FROM detil_transaksi WHERE id_transaksi = '$id'");
						?>

					<div class="table-info-more">

						<div class="table-more-left">
							
							<?php $i = 1; foreach($detil_transaksi as $dtr):?>
							
							<div class="table-more-inner-layout"><?= $dtr['isbn']; ?></div>
							
							<?php endforeach;?>
							<button class="btn-delete-id" onclick="delete_data(this)">Delete</button>
						</div>
						<div class="table-more-mid">
							
							<?php $i = 1; foreach($detil_transaksi as $dtr):?>

							<div class="table-more-inner-layout">x&nbsp;<?= $dtr['jumlah_detail']; ?></div>

							<?php endforeach;?>

						</div>
						<div class="table-more-right">
							
							<?php $i = 1; foreach($detil_transaksi as $dtr):?>

							<div class="table-more-inner-layout">Rp.&nbsp;<?= $dtr['sub_total']; ?></div>
							
							<?php endforeach;?>
							
						</div>
					</div>

					<?php endforeach;?>
				</div>
			</div>
			<div id="bot-content">
				
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function goBackPage() {
			window.location.href = '../index.php';
		}

		function open_detail(elem) {
			target_elem = elem.nextElementSibling;
			check = check_detail_opened(elem);
			if (check == 0) return '';
			target_elem.classList.add('open-table-more');
			elem.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
		}

		function check_detail_opened(cur_elem) {
			elem = document.getElementsByClassName('open-table-more');
			if(elem.length != 0) {
				if(elem[0].previousElementSibling === cur_elem) {
					document.querySelector('.open-table-more').classList.remove('open-table-more');
					return '0';
				}
				document.querySelector('.open-table-more').classList.remove('open-table-more');
				return 1;
			}
			return 1;
		}

		deletion_ids = [];

		function delete_data(elem) {
			id = elem.parentElement.parentElement.previousElementSibling.childNodes[3].innerText;
			create_dom_con(id);
			document.getElementById('dom-delete-btn').click();
		}

		function create_dom_con(id) {
			parent = document.getElementById('form-con');

			input = document.createElement('INPUT');
			input.setAttribute('type', 'text');
			input.name = 'id';
			input.value = id;

			parent.appendChild(input);
		}
	</script>
</body>
</html>