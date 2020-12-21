<?php

use Agence\Models\Country;
use Agence\Models\Sales;

// methode 1
$sales= new Sales();
$result = $sales->getById('AF123');


$result = Country::getById('FR');