<?

function sflogin($login, $mask = "^[a-zA-Z0-9]", $len = "{3,25}"){
return (is_array($login)) ? false : (preg_match("/{$mask}{$len}$/", $login)) ? $login : false;
}

function str($str){
	return htmlspecialchars($str);
}

function clean($var){
        $replace = array(
      '"' => '', 
      "'" => '', 
      '`' => '', 
      '{' => '', 
      '}' => '', 
      '<' => '', 
      '>' => '',
      '%' => '',
      '$' => '',
      '\\' => '',
      '+' => '',
      '-' => '',
      '*' => '',
      '¹' => '',
      '#' => '',
      '@' => '',
      '!' => '',
      '&' => '',
      '^' => '',
      ':' => '',
      ';' => '',
      '(' => '',
      ')' => '',
      '.' => '',
      '\0' => '',
      '%00' => ''
      );
        
        return @htmlspecialchars(str_replace(array_keys($replace), array_values($replace), trim($var)));
        unset($var, $replace);
    }
    
    function md5pass($pass){
		$pass = strtolower($pass);
		return md5("shark_md5"."-".$pass);
}	

function sfmail($mail){		
		if(is_array($mail) && empty($mail) && strlen($mail) > 255 && strpos($mail,'@') > 164) return false;
			return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $mail)) ? false : strtolower($mail);
	}

?>