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
		
	</div>
	<div id="pop-up-checkout">
		<div id="pu-header">
			<h2 style="margin: 5px;">Invoice</h2>
			<span id="invoice-no">
				*NO TRANSACTION HERE
			</span>
		</div>
		<div id="pu-content">

			<div class="pu-item-info">
				<span class="pu-item-name">The Great Century of 2022 arent end yet!</span>
				<span class="pu-item-jumlah">x 3</span>
				<div class="pu-item-subtotal">
					<span>Rp.&nbsp;</span>
					<span>150000</span>
				</div>
			</div>

		</div>
		<div id="pu-footer">
			<div>
				<span>Total Akhir :</span>
				<span><input id="total-akhir" type="text" name="" style="" value=""></span>
			</div>
			<div>
				<button id="pu-save" onclick="close_check_out_alert()">Save</button>
				<button id="pu-exit" onclick="close_check_out()">Exit</button>
			</div>
		</div>
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
			<div id="nav-content" style="filter: opacity(60%) brightness(.5);">
				<div class="nav-inner-content">
					<span><h3>HIDDEN</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
				<div class="nav-inner-content">
					<span><h3>HIDDEN</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
				<div class="nav-inner-content">
					<span><h3>HIDDEN</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
				<div class="nav-inner-content">
					<span><h3>HIDDEN</h3></span>
					<span><img src="dum-img/right_arrow.png"></span>
				</div>
			</div>
			<div id="nav-cart">
				<div id="cart-content-wrapper">
					
				</div>
				<div id="cart-total-wrapper">
					<div id="cart-header">
						<h3>Cart Disabled (Guest)</h3>
					</div>
					<div class="cart-jumlah-item">
						<span>
							<span>ISBN :</span>
							<input id="jumlah-item-isbn" type="text" name="" disabled>
						</span>
						<span>
							<span>Jumlah Item :</span>
							<img src="">
							<input id="jumlah-item-input" type="text" name="">
							<img src="">
						</span>
					</div>
					<div class="cart-total-btn">
						<button id="check-out-btn">Check Out</button>
						<button onclick="clear_basket()">Cancel</button>
					</div>
					<div class="cart-total-inner">
						<span>TOTAL :Rp.</span>
						<span><input id="total-harga" type="text" name="" style="" value=""></span>
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

				 	<div id="book-<?= $buku['isbn']; ?>" class="book-content" onmouseenter="book_hover(this.children[0])" onmouseleave="book_unhover(this.children[0])">
				 		<div class="book-hover">
					 		<span class="add-chart" onclick="js_push_cart(this.parentElement.parentElement.id.slice(5), this.parentElement.nextElementSibling.childNodes[1], this.parentElement.nextElementSibling.nextElementSibling.childNodes[3].innerHTML.slice(4), this.parentElement.nextElementSibling.nextElementSibling.childNodes[1].innerHTML)"><p>Add to Chart!</p></span>
					 		<span class="buy-now"><p>Buy Now!</p></span>
					 	</div>
				 		<div class="book-image">
				 			<img src="<?= $buku['image']; ?>">
				 		</div>
				 		<div class="book-desc">
				 			<p><?= $buku['judul_buku']; ?></p>
				 			<p style="font-weight: 600;">Rp. <?= $buku['harga_buku']; ?></p>
				 			<?php
				 				if($buku['stok_buku'] < 1) {
				 					echo "<p style='color:red;'>Stok : " . $buku['stok_buku'] . " pcs</p>";
				 				} else {
				 					echo "<p>Stok : " . $buku['stok_buku'] . " pcs</p>";
				 				}
				 			?>
				 			
				 		</div>
				 	</div>
				 	
				 	<?php endforeach;?>

				 </div>
			</div>
		</div>
	</div>

		<script type="text/javascript">
			cart_basket = [];
			cart_jumlah = [];
			cart_harga = [];
			cart_name = [];

			function book_hover(elem) {
				elem.style.cssText = 'opacity: 1;';
			}

			function book_unhover(elem) {
				elem.style.cssText = 'opacity: 0;';
			}

			window.addEventListener('resize', function() {
				if(window.innerWidth > 1199 ) {
					document.getElementById('nav-container').style.cssText = '';
				}
			});

			function open_nav() {
				document.getElementById('nav-container').style.cssText = 'width: 370px;';
			}
			function close_nav() {
				document.getElementById('nav-container').style.cssText = 'width = 0px;';
			}

			input_jumlah_item = document.getElementById('jumlah-item-input');
			input_jumlah_isbn = document.getElementById('jumlah-item-isbn');
			input_total_harga = document.getElementById('total-harga');

			function js_push_cart(id, image, harga, nama) {
				harga = Number(harga);
				if(cart_basket.includes(id)) return ''; //prevent duplication in cart!

				//handling harga
				cart_jumlah.push(1);
				cart_harga.push(harga);
				cart_name.push(nama);

				//handling basket
				cart_basket.push(id);

				//creating new cart card
				parent = document.getElementById('cart-content-wrapper');

				div = document.createElement('div');
				div.className = 'cart-content';
				div.id = 'cart-'+id;
				div.setAttribute('onmouseenter','cart_hover(this.children[0])');
				div.setAttribute('onmouseleave', 'cart_unhover(this.children[0]);');
				div.innerHTML = `
						<div class="del-cart">
							<img onclick="del_cart_item(this.parentElement.parentElement.id.slice(5))" src="dum-img/close.png">
						</div>
						<img onclick="cart_click(this.parentElement.id.slice(5))" src="`+image.src+`">
				`;
				parent.appendChild(div);

				input_total_harga.value = define_total_harga();
			}

			function cart_click(id) {
				if(input_jumlah_isbn.value === id) {
					input_jumlah_isbn.value = '';
					input_jumlah_item.value = '';
					return '';
				}
				
				var cart;
				for(var x in cart_basket) {
					if(cart_basket[x] === id) {
						input_jumlah_isbn.value = id;
						input_jumlah_item.value = cart_jumlah[x];
						x = cart_basket.length;
					}
				}
				if(input_jumlah_item.value === '0' || input_jumlah_item.value === '') {
					input_jumlah_item.value = 1;
				}
			}

			input_jumlah_item.addEventListener('input', save_cart_jumlah_item);

			function save_cart_jumlah_item() {
				try {
					if(input_jumlah_isbn.value === '') throw 'err'

					for(var x in cart_basket) {
						if(cart_basket[x] === input_jumlah_isbn.value) {
							if(input_jumlah_item.value === '0' || input_jumlah_item.value === '') {
								cart_jumlah[x] = 1;
							} else {
								cart_jumlah[x] = input_jumlah_item.value;
							}
							x = cart_basket.length;
						}
					}
					input_total_harga.value = define_total_harga();

				} catch(err) {
					input_jumlah_item.value = '';
				}
			}

			function cart_hover(elem) {
				elem.style.cssText = 'visibility: visible;';
			}

			function cart_unhover(elem) {
				elem.style.cssText = 'visibility: hidden;';
			}
			function del_cart_item(id) {
				pos = -1;
				for(var x in cart_basket) {
					if(cart_basket[x] === id) {
						pos = x;
						x = cart_basket.length;
					}
				}
				cart_basket.splice(pos, 1);
				cart_jumlah.splice(pos, 1);
				cart_harga.splice(pos, 1);
				cart_name.splice(pos, 1);

				input_total_harga.value = define_total_harga();

				document.getElementById('cart-'+id).remove();
				input_jumlah_isbn.value = '';
				input_jumlah_item.value = '';
			}

			function define_total_harga() {
				total_harga = 0;

				for(var x in cart_basket) {
					total_harga = total_harga + (cart_harga[x]*cart_jumlah[x]);
				}

				return total_harga;
			}

			invoice = document.getElementById('pop-up-checkout')

			function check_out() {
				parent = document.getElementById('pu-content');
				parent.innerHTML = ``;

				for(var x in cart_basket) {
					div = document.createElement('div');
					div.className = 'pu-item-inf';
					div.innerHTML = `
						<span class="pu-item-name">`+cart_name[x]+`</span>
						<span class="pu-item-jumlah">x `+cart_jumlah[x]+`</span>
						<div class="pu-item-subtotal">
							<span>Rp.&nbsp;</span>
							<span>`+cart_harga[x]*cart_jumlah[x]+`</span>
						</div>
					`;
					parent.appendChild(div);
				}
				document.getElementById('invoice-no').innerHTML = 'Q212-21QE-2022';
				document.getElementById('total-akhir').value = define_total_harga();

				invoice.style.cssText = 'display: grid';

				clear_basket();

			}

			function clear_basket() {
				cart_basket = [];
				cart_jumlah = [];
				cart_harga = [];
				cart_name = [];

				input_jumlah_item.value = '';
				input_jumlah_isbn.value = '';
				input_total_harga.value = '';

				document.getElementById('cart-content-wrapper').innerHTML = ``;
			} 

			function close_check_out() {
				invoice.style.cssText = 'display: none';
			}
			function close_check_out_alert() {
				alert('Saved!');
				close_check_out();
			}

			dom_connection = document.getElementById('dom-connection');

			function create_con_with_input() {

				// for(var x in cart_basket) {
				// 	inp = document.createElement('INPUT');
				// 	inp.setAttribute('type', 'text');
				// 	inp.name = 'isbn[]';
				// 	inp.value = cart_basket[x];
				// 	dom_connection.appendChild(inp);
				// }
			}
		</script>
</body>
</html>