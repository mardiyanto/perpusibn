<?php
// Menambahkan dukungan untuk PHP 8 dengan memperbaiki fungsi yang deprecated dan menambahkan type declarations
class Lokovalidasi{
	function __construct(){}

	function validasi(string $str, string $tipe): mixed {
		switch($tipe){
			default:
			case 'sql':
				$str = stripslashes($str);	
				$str = htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');				
				$str = preg_replace('/[^A-Za-z0-9]/', '', $str);				
				return intval($str);
			break;
			case 'xss':
				$str = stripslashes($str);	
				$str = htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$str = preg_replace('/[\W]/', '', $str);
				return $str;
			break;
		}
	}
	
	function extension(string $path): ?string {
		$file = pathinfo($path);
		if(file_exists($file['dirname'].'/'.$file['basename'])){
			return $file['basename'];
		}
		return null;
	}
}

?>
