<?php 
	header('content-type:text/css; charset:UTF-8;');
?>

body {
	font-family: 'Work Sans';
}
#main-container {
	position: absolute;
	top: 0;
	left: 0;

	width: 100%;
	height: 100vh;

	display: grid;
	grid-template-columns: 380px auto;
	grid-template-rows: 100%;
	grid-template-areas: 
	'nav-container menu-container'
	;
	overflow: hidden;
}
#pop-up-checkout {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);

	padding: 15px;
	width: 250px;
	height: 400px;
	background-color: rgba(241, 246, 249, 1);
	box-shadow: -1px 3px 16px 2px rgba(0,0,0,0.47);
	-webkit-box-shadow: -1px 3px 16px 2px rgba(0,0,0,0.47);
	-moz-box-shadow: -1px 3px 16px 2px rgba(0,0,0,0.47);

	display: none;
	grid-template-columns: 100%;
	grid-template-rows: 90px auto 80px;
	grid-template-areas: 
	"pu-header"
	"pu-content"
	"pu-footer"
	;

	border-radius: 15px;

	z-index: 50;
}
#pu-header {
	grid-area: pu-header;

	flex-flow: column;
	width: 100%;
	height: 100%;

	display: flex;
	justify-content: center;
	align-items: center;
}
#pu-content {
	grid-area: pu-content;
	height: 100%;

	overflow-y: scroll;

	display: flex;
	flex-flow: column;
}
#pu-footer {
	grid-area: pu-footer;

	width: 100%;
	height: 100%;

	display: flex;
	flex-flow: column;
	justify-content: space-evenly;
	align-items: flex-end;
}
#pu-footer button {
	width: 60px;
	height: 27px;
	background-color: rgba(190, 190, 205, .4);
	border: none;
	border-radius: 5px;
}
.pu-item-info {
	width: 100%;
	margin: 5px 0px 5px 0px;
}
.pu-item-name {
}
.pu-item-jumlah {
}
.pu-item-subtotal {
	width: 100%;
	display: flex;
	justify-content: flex-end;
}
#total-akhir {
	width: 140px;
	border-radius: 5px;
	border: none;
	background-color: rgba(0, 0, 0, .1);
	font-weight: 700;
	font-size: 18px;
	pointer-events: none;
}


#nav-container {
	grid-area: nav-container;
	background-color: rgba(221, 221, 227, 1);
	padding: 3%;

	display: grid;
	grid-template-rows: 130px auto 240px;
	grid-template-columns: 100%;
	grid-template-areas: 
	'nav-user'
	'nav-content'
	'nav-cart'
	;
}
#nav-close {
	display: none;
	position: absolute;
	margin-left: 320px;
}

#nav-user {
	grid-area: nav-user;

	display: grid;
	grid-template-columns: 67px 7px auto;
	grid-template-rows: 100%;
	grid-template-areas:
	"profile-pic . profile-desc"
	;
}
#nav-user > div {
	display: flex;
}
#profile-pic {
	grid-area: profile-pic;
	align-items: center;
}
#profile-pic > img {
	width: 90%;
	height: 60px;
	border-radius: 100%;
}
#profile-desc {
	grid-area: profile-desc;
	width: 100%;
	overflow-x: hidden;

	flex-flow: column;
	justify-content: center;
}

#nav-content {
	grid-area: nav-content;
	overflow-y: scroll;
	min-height: 100px;

	display: flex;
	flex-flow: column;
}
.nav-inner-content {
	width: auto;
	margin: 10px 20px 10px 10px;

	display: flex;
	flex-flow: row;
	align-items: center;
	justify-content: space-between;

	border-bottom: 1.5px solid rgba(0, 0, 0, 1.0);
}
.nav-inner-content img {
	width: 37px;
	height: auto;
}


#nav-cart {
	grid-area: nav-cart;
	background-color: rgba(190, 190, 205, .5);
	padding: 5px;

	display: flex;
	flex-flow: row;
	border-radius: 15px;

	overflow-y: hidden;
	pointer-events: none;
	filter: opacity(80%) brightness(.8);
}
#cart-header h3 {
	margin: 5px 0px 10px 0px;
}
#cart-content-wrapper {
	height: 100%;
	width: auto;
	padding: 5px;

	display: flex;
	flex-flow: column;
	flex-shrink: 0;
	overflow-y: scroll;
	overflow-x: hidden;
}
.cart-content {
	width: 100%;
	height: 150px;
	margin: 5px;

	transition: .3s ease;
}
.cart-content:hover {
	transform: scale(1.1);
}
.cart-content img {
	width: 93px;
	height: 100%;
	border-radius: 10px;
}
.del-cart {
	visibility: hidden;
	position: relative;
	width: 0px;
	height: 0px;
	margin-left: 65px;
	margin-bottom: -5px;
}
.del-cart img {
	width: 25px;
	height: 25px;
	background-color: rgba(221, 221, 227, 1);

	transition: .1s ease;
}
.del-cart img:hover {
	transform: scale(.9);
	filter: brightness(.9);
}
#cart-total-wrapper {
	margin: 20px 10px 20px 10px;
	width: 100%;
	height: auto;

	display: flex;
	flex-flow: column;
	justify-content: space-between;
	align-items: center;
}
.cart-total-inner {
	width: 100%;
	display: flex;
	flex-flow: row;
	justify-content: right;
	align-items: center;

	font-weight: 700;
}
.cart-total-btn {
	width: 100%;
	height: auto;

	display: flex;
	justify-content: space-evenly;
	align-items: flex-end;
}
.cart-total-btn > button {
	border-radius: 5px;
	border: none;
	height: 36px;
	font-weight: 800;
}
.cart-jumlah-item {
	height: 35%;

	display: flex;
	flex-flow: column;
}
.cart-jumlah-item > span {
	margin: 2px 0px 2px 0px;
}
#jumlah-item-input {
	width: 31px;
	border-radius: 5px;
	border: none;
}
#jumlah-item-isbn {
	width: 100px;
	pointer-events: none;
	
	border-radius: 5px;
	border: none;
}
#total-harga {
	width: 90px;
	border-radius: 5px;
	border: none;
	background-color: rgba(0, 0, 0, 0);
	font-weight: 700;
	font-size: 18px;
	pointer-events: none;
}




#menu-container {
	grid-area: menu-container;
	overflow-y: scroll;
	height: 100%;
	width: auto;

	display: flex;
	flex-flow: column;
	padding: 0px 23px 0px 23px;
	background-color: rgba(241, 246, 249, 1);
}


#menu-header {
	width: auto;
	height: 170px;

	padding: 15px;

	display: flex;
	flex-flow: row;
	justify-content: space-between;
	align-items: center;

	font-size: 37px;
}
.menu-header-wrapper:nth-child(1) {
	display: flex;
	justify-content: flex-start;
	align-items: center;
	width: 40%;
}
.menu-header-wrapper:nth-child(2) {
	display: flex;
	justify-content: center;
	align-items: center;
	width: 60%;
}
.menu-header-wrapper:nth-child(2) img {
	width: 47px;
}

#menu-search-input {
	margin-left: 10px;
	height: 47px;
	width: 60%;

	font-size: 21px;

	border: none;
	border-radius: 15px;
	padding: 10px;
}



#menu-books {
	width: auto;
	height: auto;

	margin-top: 20px;
	padding: 15px;
}
#menu-books-content-wrapper {
	width: 100%;
	height: auto;

	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}
.book-content {
	margin: 5px 15px 25px 15px;
	
	width: 180px;
	height: 310px;

	display: grid;
	grid-template-rows: 75% 25%;
	grid-template-columns: 100%;
	grid-template-areas: 
	'book-image'
	'book-desc'
	;

	border-radius: 15px;

	
}
.book-image {
	grid-area: book-image;
	border-radius: 15px;
	background-color: blue;
	padding: 20px;
	background-color: rgba(221, 221, 227, 1);
}
.book-hover {
	position: relative;

	background-color: rgba(190, 190, 205, .9);
	top: -163%;
	height: 120px;
	opacity: 0;
	border-radius: 15px;

	transition: .2s ease;

	display: flex;
	flex-flow: row;
	justify-content: space-evenly;
	align-items: center;
	text-align: center;

	font-weight: 600;
	pointer-events: none;
}
.book-hover > span {
	transition: .3s ease;
	opacity: .5;
}

.book-hover > span:hover {
	color: white;
}
.book-hover p {
	cursor: pointer;
}
.book-image img {
	width: 100%;
	height: 100%;
	border-radius: 15px;
}
.add-chart {
	width: 50%;
}
.buy-now {
	width: 50%;
}
.book-desc {
	grid-area: book-desc;

	display: flex;
	flex-flow: column;
	justify-content: center;
	align-items: center;
	text-align: center;
	overflow: hidden;
}
.book-desc > p {
	margin: 0px;
}

#nav-content::-webkit-scrollbar {
	width: 0px;
}
#cart-content-wrapper::-webkit-scrollbar {
	width: 0px;
}
#pu-content::-webkit-scrollbar {
	width: 0px;
}




@media screen and (max-width: 1200px) {
	#main-container {
		position: absolute;
		top: 0;
		left: 0;

		width: 100%;
		height: 100vh;

		display: grid;
		grid-template-columns: auto;
		grid-template-rows: 100%;
		grid-template-areas: 
		'menu-container'
		;
		overflow: hidden;
	}
	#nav-container {
		grid-area: nav-container;
		background-color: rgba(221, 221, 227, 1);
		padding: 0%;
		height: 100%;
		width: 0px;
		overflow: hidden;

		position: fixed;
		top: 0;
		left: 0;

		display: grid;
		grid-template-rows: 130px auto 210px;
		grid-template-columns: 100%;
		grid-template-areas: 
		'nav-user'
		'nav-content'
		'nav-cart'
		;
		transition: .3s ease;

		z-index: 5;
	}
	#nav-user {
		grid-area: nav-user;
		margin: 10px;

		display: grid;
		grid-template-columns: 67px 7px auto;
		grid-template-rows: 100%;
		grid-template-areas:
		"profile-pic . profile-desc"
		;
	}
	#nav-cart {
		grid-area: nav-cart;
		background-color: rgba(190, 190, 205, .5);
		padding: 5px;
		margin: 10px;

		display: flex;
		flex-flow: row;
		border-radius: 15px;

		overflow-y: hidden;
	}
	.cart-total-btn {
		padding: 5px;
	}
	.cart-total-btn > button {
		border-radius: 5px;
		border: none;
		height: 26px;
		font-weight: 800;
	}
	#nav-close {
		display: block;
		position: absolute;
		margin-left: 320px;
	}
	#nav-open {
		display: block;
		position: absolute;
		top: 0;

		margin: 10px 0px 0px 10px;
	}
	#nav-open img {
		width: 37px;
		height: 37px;
	}
	#menu-header {
		width: auto;
		height: 250px;

		padding: 15px;

		display: flex;
		flex-flow: column;
		justify-content: space-between;
		align-items: center;

		font-size: 37px;
	}
	#menu-search-input {
		margin-left: 10px;
		height: 47px;
		width: 70%;

		font-size: 21px;

		border: none;
		border-radius: 15px;
		padding: 10px;
	}
	.menu-header-wrapper:nth-child(1) {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
	}
	.menu-header-wrapper:nth-child(2) {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
	}
}
