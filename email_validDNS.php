<?php

error_reporting(0);

$art = file_get_contents('Me@art.txt');

if($argv[1] and $argv[2]){ 
	$list = explode("\r\n", file_get_contents($argv[1].'.txt'));
	foreach ($list as $mail) {
		preg_match('/@(.*)/',$mail, $domain);
		$valid_email = checkdnsrr($domain[1], "MX");
		if ($valid_email == 'true'){
			echo $art."\r\n";

            $put = "\r\n".$mail.' : Valid';

            echo $put;

            file_put_contents($argv[2].'.txt', $put, FILE_APPEND | LOCK_EX);
        }
	} }else {
		echo $art."\r\n";
		echo 'php email_validDNS.php email_list output'."\r\n";
		echo 'Import email list without .txt'."\r\n";
		echo 'Same with output !';
	}
