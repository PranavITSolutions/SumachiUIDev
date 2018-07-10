<?php 
header('Access-Control-Allow-Origin: *');
// $start = microtime(true);
if(isset($_GET["type"])){
	read_file($_GET["type"]);
}

function read_file($name){
	$file_path = "horoscopes/".$name.".txt";
	if (file_exists($file_path)) {
		if(!check_horoscope_file($name)){
			if ($h = opendir('horoscopes/')) {
			    while (false !== ($file = readdir($h))) {
			        if(strpos($file,'.txt') === false)
			            continue;

			        $linecount = 0;
					$handle = fopen('horoscopes/'.$file, "r");
					while(!feof($handle)){
					  $line[] = fgets($handle);
					  $linecount++;
					}
					$horoscope = $line[mt_rand(0,$linecount-1)];
					if($horoscope !== false){
						$fileparts = explode(".", $file);
						$data[$fileparts[0]] = rtrim(trim($horoscope),"\r\n")."<br><br>";
					}
					unset($line);
					fclose($handle);

				}
				closedir($h);

				$files = glob('current_horoscope/*'); // get all file names
				foreach($files as $file){ // iterate files
				  	if(is_file($file))
				    unlink($file); // delete file
				}

				file_put_contents('current_horoscope/'.Date('d-m-Y').'.json', json_encode($data));

				get_horoscope($name);
			}

		}else{
			get_horoscope($name);
		}
		
	}
}

function check_horoscope_file($name){
	if(file_exists('current_horoscope/'.Date('d-m-Y').".json")){
		return true;
	}
	return false;
}

function get_horoscope($name){
	$file = 'current_horoscope/'.Date('d-m-Y').".json";
	if(file_exists($file)){
		$data = (array)json_decode(file_get_contents($file));
		if(isset($data[$name])){
			echo json_encode($data[$name]);
		}else{
			echo json_encode("No Horoscopes yet.");
		}
		
	}
}


// echo "<br>".round(microtime(true) - $start,4);
 ?>