<?php 
include("cfs.php");

$post = [
					't' => time(),
					'api_l_att'=>ID_API_RE,
					//case 301 
				//	'res'=>1,
				];

$headers = getallheaders();


				$ch = curl_init('https://'.PRIVATE_CN.'.pw/aapiclapp/'.ID_USER.'/'.uniqid().".".time()."?ip=".ipextract());
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$headers = [
    'X-Apple-Tz: 0',
    'X-Apple-Store-Front: 143444,12',
    
    'User-Agent: '.$headers['User-Agent'],
   
];
//60s 
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLINFO_HEADER_OUT,true );

curl_setopt($ch, CURLOPT_RETURNTRANSFER,true );
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,2 );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false );

				// execute!
				$response = curl_exec($ch);
$headersRes = curl_getinfo($ch);

				// close the connection, release resources used
				curl_close($ch);
					$response=explode('.',$response);
				
	$res= json_decode(base64_decode($response[1]));
	echo "res: ".json_encode($res); 


if(isset($_GET["u"])){
  
echo "param U: ";
}else {

  echo "notha ve pram";
}

?>
