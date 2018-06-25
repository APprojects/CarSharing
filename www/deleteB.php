<?php 
session_start();

$campi = array(
    'id' => ($_GET['idB']),
    'seller' => ($_GET['idU'])
    
);

// trasformo la mia array in JSON
$dati = json_encode($campi);

// inizializzo curl
$ch = curl_init();

// imposto la URl del web-service remoto
curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/basement/delete.php');

// preparo l'invio dei dati col metodo POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dati);

// imposto gli header correttamente
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($dati))
    );

// eseguo la chiamata
$response = json_decode(curl_exec($ch), true);




// chiudo
curl_close($ch);


?>