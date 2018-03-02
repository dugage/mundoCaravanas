<?php

function encode_string($pass){

	$CI =& get_instance();
	$CI->load->library('encrypt');

	$sure = $pass;
	$options = array('cost' => 12);
	$code = password_hash($sure, PASSWORD_BCRYPT, $options);

	return $code;
}

	function encode_string_dark($pass){

		$key = 'iHaCLya:TSPW;ED;9joD*1fAw?';
		$count = round(strlen($key) / strlen($pass), 1);
		$count = explode('.', $count);
		$data_code = '';

		for ($i=0; $i < strlen($pass); $i++) {

			if($i%2 == 0){

				$key[$count[0]] = $pass[$i];
				$count[0] += $count[1];

			}else{

				$key[$count[1]] = $pass[$i];
				$count[1] += $count[0];
			}

		}

		$salt = sha1(md5($key));
		$options = array(
		    'cost' => 12,
		    'salt' => $salt,
		);

		$data_code = password_hash($key, PASSWORD_BCRYPT, $options);

		return $data_code;

	}


?>
