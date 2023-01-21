<?php
	require 'list_function.php';
	$con = koneksi();
	echo "<script>console.log('Connected to DB!')</script>";

	$data_buku = retrive_query("SELECT * FROM inventory");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.php">

	<title>
		MAIN--
	</title>
</head>
<body>
	<div id="dom-connection" style="display: none;">
		<form id="dom-connection-form">
			
			<button id="dom-connection-btn"></button>
		</form>
	</div>
	<div id="main-container">
		<div id="nav-open" onclick="open_nav()">
			<img src="dum-img/menu.png">
		</div>
		<div id="nav-container">
			<div id="nav-close" onclick="close_nav()">
				<img id="nav-close-btn" src="dum-img/left_arrow.png">
			</div>
			<div id="nav-user">
				<div id="profile-pic">
					<img src="dum-img/user.png">
				</div>
				<div id="profile-desc">
					<span>
						Selamat Datang,
					</span>
					<span>
						Guest <a href="login.php">Login!</a>
					</span>
				</div>
			</div>
			<div id="nav-content">
				<div class="nav-inner-content">
					<span><h3>CONTENT</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
				<div class="nav-inner-content">
					<span><h3>CONTENT</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
				<div class="nav-inner-content">
					<span><h3>CONTENT</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
				<div class="nav-inner-content">
					<span><h3>CONTENT</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
			</div>
			<div id="nav-cart">
				<div id="cart-content-wrapper">
					
				</div>
				<div id="cart-total-wrapper">
					<div class="cart-total-btn">
						<button>Check Out</button>
						<button>Cancel</button>
					</div>
					<div class="cart-total-inner">
						<span>TOTAL :Rp.</span>
						<span><input id="total-harga" type="text" name="" style="width: 90px; border-radius: 5px; border: none; background-color: rgba(0, 0, 0, 0); font-weight: 700; font-size: 18px; pointer-events: none;"></span>
					</div>
				</div>
			</div>
		</div>
		<div id="menu-container">
			<div id="menu-header">
				<div class="menu-header-wrapper">
					<h1>Explore</h1>
				</div>
				<div class="menu-header-wrapper">
					<img src="dum-img/search.png">
					<input id="menu-search-input" type="text" name="" placeholder="Explore the Books!">
				</div>
			</div>
			<div id="menu-books">
				 <div id="menu-books-header">
				 	<h1>Collection of Books!</h1>
				 </div>
				 <div id="menu-books-content-wrapper">

				 	<?php $i = 1; foreach($data_buku as $buku):?>

				 	<div id="<?= $buku['isbn']; ?>" class="book-content" onmouseenter="book_hover(this.children[0])" onmouseleave="book_unhover(this.children[0])">
				 		<div class="book-hover">
					 		<span class="add-chart" onclick="js_push_cart(this.parentElement.parentElement.id.slice(5), this.parentElement.nextElementSibling.childNodes[1], this.parentElement.nextElementSibling.nextElementSibling.childNodes[3].innerHTML.slice(4))"><p>Add to Chart!</p></span>
					 		<span class="buy-now"><p>Buy Now!</p></span>
					 	</div>
				 		<div class="book-image">
				 			<img src="<?= $buku['image']; ?>">
				 		</div>
				 		<div class="book-desc">
				 			<p><?= $buku['judul']; ?></p>
				 			<p style="font-weight: 600;">Rp. <?= $buku['harga']; ?></p>
				 		</div>
				 	</div>

				 	<?php endforeach;?>

				 </div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function book_hover(elem) {
			elem.style.cssText = 'opacity: 1;';
		}

		function book_unhover(elem) {
			elem.style.cssText = 'opacity: 0;';
		}

		function open_nav() {
			document.getElementById('nav-container').style.cssText = 'width: 370px;';
		}
		function close_nav() {
			document.getElementById('nav-container').style.cssText = 'width = 0px;';
		}

		cart_basket = [];


		function js_push_cart(data, image, harga) {
			if(cart_basket.includes(data)) return ''; //prevent duplication in cart!

			total_elem = document.getElementById('total-harga');
			total = total_elem.value;

			if (total === '') total = 0;

			total = parseInt(total)+parseInt(harga);
			total_elem.value = total;
			//retrive data
			
			cart_basket.push(data);

			parent = document.getElementById('cart-content-wrapper');

			div = document.createElement('div');
			div.className = 'cart-content';
			div.innerHTML = `
					<img src="`+image.src+`">
			`;
			parent.appendChild(div);
		}

	</script>
</body>
</html>