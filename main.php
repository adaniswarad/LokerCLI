<?php

$loker = array();

while (true) {
	$input = strtolower(trim(fgets(STDIN, 64)));
	$input_array = explode(' ', $input);

	switch ($input_array[0]) {
		case 'init':
			if (count($input_array) == 2) {
				if (count($loker) != 0) {
					echo "Tidak bisa membuat loker lagi", "\n";
				} else {
					if (ctype_digit($input_array[1])) {
						for ($i=0; $i < (int) $input_array[1]; $i++) {
							$loker[$i] = array("", "");
						}
						echo "Berhasil membuat loker dengan jumlah ".count($loker), "\n";
					} else {
						echo "Masukkan nilai integer", "\n";
					}
				}
			} else {
				echo "Perintah yang anda masukkan salah", "\n";
			}
			break;
		case 'status':
			if (count($input_array) == 1) {
				if (count($loker) != 0) {
					echo "No Loker", "\t", "Tipe Identitas", "\t", "No Identitas", "\n";
					for ($i=0; $i < count($loker); $i++) { 
						echo $i+1, "\t\t", $loker[$i][0], "\t\t", $loker[$i][1], "\n";
					}
				} else {
					echo "Loker harus dibuat terlebih dahulu", "\n";
				}
			} else {
				echo "Perintah yang anda masukkan salah", "\n";
			}
			break;
		case 'input':
			if (count($input_array) == 3 && ctype_alpha($input_array[1]) && 
				ctype_digit($input_array[2])) {
				if (strlen($input_array[2]) == 5) {
					if (count($loker) != 0) {
						$is_full = true;
						for ($i=0; $i < count($loker); $i++) { 
							if ($loker[$i][0] == "") {
								$is_full = false;
								$loker[$i][0] = $input_array[1];
								$loker[$i][1] = $input_array[2];
								echo "Kartu identitas disimpan di loker nomor ", $i+1, "\n";
								break;
							}
						}
						if ($is_full) {
							echo "Maaf loker sudah penuh", "\n";
						}
					} else {
						echo "Loker harus dibuat terlebih dahulu", "\n";
					}
				} else {
					echo "Panjang nomor identitas harus 5 digit", "\n";
				}
			} else {
				echo "Perintah yang anda masukkan salah", "\n";
			}
			break;
		case 'leave':
			if (count($input_array) == 2 && ctype_digit($input_array[1])) {
				$pos = (int) $input_array[1];
				if (count($loker) != 0) {
					if ($input_array[1] <= count($loker) && $input_array[1] > 0) {
						if ($loker[$pos-1][0] != "") {
							$loker[$pos-1] = array("", "");
							echo "Loker nomor $pos berhasil dikosongkan", "\n";
						} else {
							echo "Loker nomor $pos sudah dalam keadaan kosong", "\n";
						}
					} else {
						echo "Loker nomor $pos tidak tersedia", "\n";
					}
				} else {
					echo "Loker harus dibuat terlebih dahulu", "\n";
				}
			} else {
				echo "Perintah yang anda masukkan salah", "\n";
			}
			break;
		case 'find':
			if (count($input_array) == 2 && ctype_digit($input_array[1])) {
				if (count($loker) != 0) {
					$is_found = false;
					for ($i=0; $i < count($loker); $i++) { 
						if ($loker[$i][1] == $input_array[1]) {
							$is_found = true;
							echo "Kartu identitas tersebut berada di loker nomor ", $i+1, "\n";
							break;
						}
					}
					if (!$is_found) {
						echo "Nomor identitas tidak ditemukan". "\n";
					}
				} else {
					echo "Loker harus dibuat terlebih dahulu", "\n";
				}
			} else {
				echo "Perintah yang anda masukkan salah", "\n";
			}
			break;
		case 'search':
			if (count($input_array) == 2 && ctype_alpha($input_array[1])) {
				if (count($loker) != 0) {
					$result = "";
					$res = array();
					$is_found = false;
					for ($i=0; $i < count($loker); $i++) { 
						if ($loker[$i][0] == $input_array[1]) {
							$is_found = true;
							$res[] = $loker[$i][1];
						}
					}
					if (!$is_found) {
						echo "Pencarian gagal", "\n";
					} else {
						for ($i=0; $i < count($res); $i++) { 
							$result .= $res[$i];
							if ($i+1 != count($res)) {
								$result .= ", ";
							}
						}
						echo "$result", "\n";
					}
				} else {
					echo "Loker harus dibuat terlebih dahulu", "\n";
				}
			} else {
				echo "Perintah yang anda masukkan salah", "\n";
			}			
			break;
		case 'exit':
			exit();
			break;
		default:
			echo "Perintah tidak dikenali", "\n";
			break;
	}
}

?>