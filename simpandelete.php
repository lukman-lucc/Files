<?php 
	require('data.php');

	if(!empty($_GET['kode'])){
		dell($_GET['kode']);
		header('location:delete.php');
		
	}else{
		header('location:delete.php');
	}

	function dell($kode){
		$nama_file = 'buku.txt';
		$load = @file($nama_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($load as $data){
			$buku = explode('|',$data);
			$buku = $buku[0];
			if($buku==$kode){
				$dell = str_replace($data.PHP_EOL,'',file_get_contents($nama_file));
				simpan($nama_file,$dell,'w');
				break;
			}else{
				$data = null;
			}
			
		}
		
	return $data;
	}
?>