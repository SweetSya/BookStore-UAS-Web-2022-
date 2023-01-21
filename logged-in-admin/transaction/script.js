function goBackPage() {
	window.location.href = '../a';
}

function open_detail(elem) {
	target_elem = elem.nextElementSibling;
	check = check_detail_opened(elem);
	if (check == 0) return '';
	target_elem.classList.add('open-table-more');
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

<?php
						$data_detil = retrive_query("SELECT * FROM detil_transaksi WHERE id_transaksi = '$tr['id_transaksi']'");
					?>