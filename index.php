<?php

function DC($p1_lat, $p1_long, $p2_lat, $p2_long, $unidade = 'km', $decimais = 2) {
	// Calcula a distancia em graus
	$graus = rad2deg(acos((sin(deg2rad($p1_lat)) * sin(deg2rad($p2_lat))) + (cos(deg2rad($p1_lat)) * cos(deg2rad($p2_lat)) * cos(deg2rad($p1_long - $p2_long)))));
 
  // converte a distancia de graus para uma de Kilometros, milhas ou milhas nauticas
	switch($unidade) {
		case 'km':
			$distancia = $graus * 111.13384; // 1 grau = 111.13384 km, com base no diâmetro médio da Terra (12,735 km)
			break;
		case 'mi':
			$distancia = $graus * 69.05482; // 1 grau = 69.05482 milhas, com base no diâmetro médio da Terra (7,913.1 milhas)
			break;
		case 'nmi':
			$distancia =  $graus * 59.97662; // 1 grau = 59.97662 milhas nauticas, com base no diâmetro médio da Terra (6,876.3 milhas nauticas)
	}
	return round($distancia, $decimais);
}


$p1 = array("lat" => "-23.5632103", "long" => "-46.6542503"); // Av. Paulista - Bela Vista, São Paulo
$p2 = array("lat" => "-23.7071623", "long" => "-46.4062503"); // Ribeirão Pires, São Paulo
$km = DC($p1['lat'], $p1['long'], $p2['lat'], $p2['long']); // KM
$mi = DC($p1['lat'], $p1['long'], $p2['lat'], $p2['long'], 'mi'); // MI
$nmi = DC($p1['lat'], $p1['long'], $p2['lat'], $p2['long'], 'nmi'); // NMI
echo 'a distancia do ponto 1 ao ponto 2 é '.$km.' km (= '.$mi.' milhas = '.$nmi.' milhas nauticas)';

?>