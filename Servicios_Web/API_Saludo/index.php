<?php

require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;

// Siempre empieza por barra normal (shift 7)
$app->get("/saludo", function(){
    // Siempre acaba con un echo de algo que hace un json

    $mensaje["msj"] = "Hola Mundo";
    echo json_encode(array($mensaje));
});



$app->get('/saludo/{codigo}',function($request){

    //$datos["cod"]=$request->getParam('cod');
    echo json_encode(array("mensaje"=> "Hola ".$request->getAttribute('codigo')) ,JSON_FORCE_OBJECT);

});

// Una vez creado servicios los pongo a disposición
$app->run();
?>