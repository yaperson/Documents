<?php

$monTabAssiociatif = [
    "nom" => "TOTO",
    "prenom" => "TATA",
];

foreach ($monTabAssiociatif as $key => $value) {
print("</br> Clé = ".$key);
print("</br> Valeur = ".$value);
}

print json_encode($monTabAssiociatif);

$tabJson = '{
    "nom":"TITI",
    "prenom":"TUTU"
}';

$monTab2 = json_decode($tabJson);

foreach ($monTab2 as $key => $value) {
    print("</br> Clé = ".$key);
    print("</br> Valeur = ".$value);
}