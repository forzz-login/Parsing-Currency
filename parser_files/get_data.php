<?php

include_once 'HtmlWeb.php';
use simplehtmldom\HtmlWeb;

$doc = new HtmlWeb();


$htmlRTSI = $doc->load('https://ru.investing.com/indices/rtsi');

$price_rts = $htmlRTSI->find('span.text-2xl')[0]->plaintext;

$change_rts = $htmlRTSI->find('span.instrument-price_change-value__jkuml')[0]->plaintext;

$htmlBrent = $doc->load('https://ru.investing.com/commodities/brent-oil');

$price_brent = $htmlBrent->find('span.text-2xl')[0]->plaintext;

$change_brent = $htmlBrent->find('span.instrument-price_change-value__jkuml')[0]->plaintext;

$htmlUSD = $doc->load('https://ru.investing.com/currencies/usd-rub');

$price_usd = $htmlUSD->find('span.text-2xl')[0]->plaintext;

$change_usd = $htmlUSD->find('span.instrument-price_change-value__jkuml')[0]->plaintext;

$prices = array(
	'RTSI' => array(
		'price' => $price_rts,
		'change_price' =>  $change_rts
	), 
	'BRENT' => array(
		'price' => $price_brent,
		'change_price' =>  $change_brent
	),
	'USD' => array(
		'price' => $price_usd,
		'change_price' =>  $change_usd
	)
);
echo json_encode($prices);

?>