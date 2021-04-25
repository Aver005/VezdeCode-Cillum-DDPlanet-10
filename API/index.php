<?php

$ID = $_POST["ID"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$text = $_POST["text"];

$path = $_SERVER["DOCUMENT_ROOT"] . "/DATA/";

switch ($ID) 
{
	case 0:
		$array = array();
		$filename = $path . "DATA_JSON.txt";

		if (file_exists($filename))
		{
			$value = file_get_contents($filename);
			if (filesize($filename) > 0) {$array = json_decode($value, true);}
		}

		$arr = array(
			"Name" => $name,
			"Phone" => $phone,
			"Text" => $text,
			"Date" => date("d.m.Y H:i:s")
		);

		array_push($array, $arr);
		$value = json_encode($array, JSON_UNESCAPED_UNICODE);
		
		file_put_contents($filename, $value);
		echo "Отлично!|Данные отправлены.\nСпасибо за обращение :)";
	break;
	
	default: echo "Error. Invalid API-request ID."; break;
}

?>