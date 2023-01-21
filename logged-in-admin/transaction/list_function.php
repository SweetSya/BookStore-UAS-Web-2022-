<?php 

	function koneksi() {
		$host = 'localhost';
		$username = 'root';
		$pass = '';
		$dbname = 'book_testing';

		$koneksi = mysqli_connect($host, $username, $pass, $dbname);

		if(!$koneksi) {
			die("Koneksi gagal : " . mysqli_connect_error());
		}

		return $koneksi;
	}

	function retrive_query($data) {
		$con = koneksi();

		$result = mysqli_query($con, $data);
		$baris = [];
		while($a = mysqli_fetch_assoc($result)) {
			$baris[] = $a;
		}

		return $baris;
	}

	function query($data) {
		$con = koneksi();

		mysqli_query($con, $data);
	}