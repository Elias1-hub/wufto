<?php 
include('php/conexion.php');
setlocale(LC_ALL,"es_ES");

/**
Consultar "Index 1" (Promedio últimas 9 días a las 21:00 + el precio actual)
Consultar "Index 2" (Promedio últimas 49 días a las 21:00 + el precio actual) 
Consultar "Index 3" (Promedio últimas 199 días a las 21:00 + el precio actual)
**/
class polonix {
	private $conx = null;

	function __construct($db) {
		$this->conx = $db;
	}

	function get_bitcoin(){
		$url		="https://poloniex.com/public?command=returnTicker"; 
		$con 		= curl_init($url);
		curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($con, CURLOPT_SSL_VERIFYPEER, true);
		$html 		= curl_exec($con);
		$resultado  = json_decode($html);
		$bitcoin 	= $resultado->USDT_BTC->last; //Ultimo precio de dolar sobre bitcoin
		$ethereum 	= $resultado->USDT_ETH->last; //Ultimo precio de dolar sobre ethereum
		$bit_ethe 	= $resultado->BTC_ETH->last; //Ultimo precio de bitcoin sobre ethereum
		$fechaActual = date('Y-m-d H:i:s');
		//Consultas SQL	Prepared Statements
		if($stmt= $this->conx->prepare("INSERT INTO wufto.valores (fecha,USDT_BTC, USDT_ETH, BTC_ETH) VALUES (?,?,?,?)")){
			$stmt -> bind_param("sddd",$fechaActual,$bitcoin,$ethereum,$bit_ethe);
			$stmt -> execute();	
			return true;
		}else{
			return false;	
		}
	
		
		//PONER TRUE O FALSE SI CARGA O NO EL ARCHIVO...
			
	} 
	function sell(){


 		/*Funcion para vender :D*/
 		/*
	 		$clave= "GKII4BK2-AXVJ8PH2-6NTOG7Q5-YF5FNADU";
			$secreto="ea44a94a0c13b54555341589e4fa109211c16cb97ae41a22a3babd1fb8520ee97075d438dfb35225ac99843ba2bbe5b5a05389025e26b349c4688059204243ae";
			$peticion='?command=sell&currencyPair=BTC_ETH&rate=10.0&amount=1';
			$envio='{?command=sell&currencyPair=BTC_ETH&rate=10.0&amount=1}';nonce=154264078495300"


			"command=sell&currencyPair=BTC_ETH&rate=10.0&amount=1"
			CURLOPT_HTTPHEADER	
			*/

		$post = array(
			'?command'=> "buy",
		    'currencyPair' => "BTC_ETH",
		    'rate' => 10.0,
		    'amount' => 1,
		    'nonce' => time(),
		);	
		
		//$post=http_build_query($post);
		
		$nuevo= array(
			'Content-Type: application/json',
			//'Content-Length: '.strlen($post),	
		    "Key: GKII4BK2-AXVJ8PH2-6NTOG7Q5-YF5FNADU",
		    "Sign: ea44a94a0c13b54555341589e4fa109211c16cb97ae41a22a3babd1fb8520ee97075d438dfb35225ac99843ba2bbe5b5a05389025e26b349c4688059204243ae"
		);

	    //$post = urldecode($post);
	    //$post = json_encode($post);
		$url= "https://poloniex.com/tradingApi";
		$ch= curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST,true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $nuevo);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
		
		$respuesta=curl_exec($ch);
		$a= json_encode($respuesta);

		return $respuesta;
	}


}

$prueba = new polonix($conn);
$bitcoin= $prueba->get_bitcoin();
$sell=$prueba ->sell();
var_dump($sell);





?>