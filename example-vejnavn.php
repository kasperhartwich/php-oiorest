<?php
include('lib/oiorest.php');

$oiorest_vejnavne = new Oiorest_Vejnavne();

$oiorest_vejnavne->postnr = 2300;
$oiorest_vejnavne->vejnavn = 'Kurv';

$response = $oiorest_vejnavne->sendRequest();

var_dump($response);
