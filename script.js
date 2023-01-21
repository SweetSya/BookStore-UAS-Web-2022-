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
	input_total_harga.value = 0;

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