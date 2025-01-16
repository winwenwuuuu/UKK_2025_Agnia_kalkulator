<!DOCTYPE html>
<html>
<head>
	<title>Membuat Kalkulator Sederhana Dengan PHP</title>
	<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	$hasil = 0; // Inisialisasi nilai awal
	if (isset($_POST['hitung'])) {
		$bil1 = $_POST['bil1'];
		$bil2 = $_POST['bil2'];
		$operasi = $_POST['operasi'];
		
		// Validasi input untuk memastikan tidak kosong
		if (is_numeric($bil1) && is_numeric($bil2)) {
			switch ($operasi) {
				case 'tambah':
					$hasil = $bil1 + $bil2;
					break;
				case 'kurang':
					$hasil = $bil1 - $bil2;
					break;
				case 'kali':
					$hasil = $bil1 * $bil2;
					break;
				case 'bagi':
					// Validasi pembagian dengan nol
					$hasil = ($bil2 != 0) ? $bil1 / $bil2 : 'Error: Tidak dapat dibagi dengan nol';
					break;
				default:
					$hasil = 'Operator tidak valid';
			}
		}
	}
	?>
	<div class="kalkulator">
		<h2 class="judul">KALKULATOR AGNIA</h2>
		<form method="post" action="index.php">			
			<input type="text" name="bil1" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Pertama">
			<input type="text" name="bil2" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Kedua">
			<select class="opt" name="operasi">
				<option value="tambah">+</option>
				<option value="kurang">-</option>
				<option value="kali">x</option>
				<option value="bagi">/</option>
			</select>
			<input type="submit" name="submit" value="Submit" class="tombol">											  
		</form>
		<!-- Menampilkan hasil perhitungan -->
		<input type="text" value="<?php echo htmlspecialchars($hasil); ?>" class="bil">			
	</div>
</body>
</html>

<style>
body {
	background: #EEE5D3; 
	font-family: sans-serif;
}

.kalkulator {
	width: 335px;
	background: #969286; 
	margin: 100px auto;
	padding: 10px 20px 50px 20px;
	border-radius: 5px;
	box-shadow: 0px 10px 20px 0px #D1D1D1;
}

.bil {
	width: 300px;
	margin: 5px;
	border: none;
	font-size: 16pt;
	border-radius: 5px;
	padding: 10px;
}

.opt {
	font-size: 16pt;
	border: none;
	width: 215px;
	margin: 5px;
	border-radius: 5px;
	padding: 10px;
}

.tombol {
	background: #A4645C; 
	border-top: none;
	border-right: none;
	border-left: none;
	border-radius: 5px;
	padding: 10px 20px;
	color: #eee;
	font-size: 15pt;
	border-bottom: 4px solid #864746; 
}

.judul {
	text-align: center;
	color: #eee;
	font-weight: normal;
	font-family: 'VT323', monospace; 
	font-size: 24pt; 
}