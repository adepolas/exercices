<?php
//définition type retour
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

//définition des variables / constantes
$nombre_compose = array();
$chiffres_romains = array
(
    1       =>      'I',
    5       =>      'V',
    10      =>      'X',
    50      =>      'L',
    100     =>      'C'
);

//décomposer la partie entière du nombre décimal (en centaines, dizaines, unités)
function decomposer($nombre){
    global $nombre_compose;
    $n = (string)$nombre;
    $p = strlen($n);
    for($i=0;$i < strlen($n);$i++)
    {
        $p--;
        $nombre_compose[$i] = (int)$n[$i]*pow(10, $p);
    }
    return $nombre_compose;
}

//convertir chaque partie du nombre décimal en chiffres romains (v1.0 à améliorer écriture plus lisible comme pour le cas 9)
function convert($nbrs){
    global $chiffres_romains;
    $roman_number = "";
    $j = 0;
    while($j < count($nbrs)){
        $nbr = $nbrs[$j];
        foreach($chiffres_romains as $dec => $rom){
            $quotient = (int)($nbr/$dec);
            $diff = $nbr - $dec;
            $modulo = $nbr % $dec;

            //cas : chiffres romains de base
            if(isset($chiffres_romains[$nbr])){
                $roman_number .= $chiffres_romains[$nbr];
                break;
            }

            //cas : apparition lettre romaine +3 fois
            if($quotient>3) {
                continue;
            }

            //cas : nombre rond
            if($modulo == 0) {
                $roman_number .= str_repeat($rom, $quotient);
                break;
            }
            //cas : operation correspondant a une soustraction romaine
            elseif($diff < 0) {
                $roman_number .= $chiffres_romains[-$diff].$rom;
                break;
            }
            //cas : operation correspondant a une addition romaine
            else {
                $roman_number .= $rom.convert([$diff]);
                break;
            }
        }
        $j++;
    }
    return $roman_number;
}

//récupération ; traitement des entrées utilisateur ; réponse -> front
if(isset($_GET['nombreD']) && $_GET['nombreD'] > 0 && $_GET['nombreD'] < 100)
{
    $nombre_decimal = $_GET['nombreD'];
    $nombre_romain = convert(decomposer($nombre_decimal));
    echo "data: ".$nombre_romain."\n\n";
    flush();
}

?>