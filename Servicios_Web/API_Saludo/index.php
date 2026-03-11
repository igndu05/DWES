<?php

require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;

// Siempre empieza por barra normal (shift 7)
$app->get("/saludo", function(){
    // Siempre acaba con un echo de algo que hace un json

    $array["mensaje"] = "Hola Mundo";
    echo json_encode($array);
});



$app->get('/saludo/{codigo}',function($request){

    //$datos["cod"]=$request->getParam('cod');
    echo json_encode(array("mensaje"=> "Hola ".$request->getAttribute('codigo'). " algo mas") ,JSON_FORCE_OBJECT);

});

$app->post("/crearSaludo", function($request){
    $array["mensaje"] = $request->getParam("msj");
    echo json_encode($array);
});

$app->delete("/borrarSaludo/{id}", function($request){
    $array["mensaje"] = "Borrando el saludo con id: ".$request->getAttribute("id");
    echo json_encode($array);
});

$app->update("/acvtualizarSaludo/{id}", function($request){
    $array["mensaje"] = "Actualizando el saludo con id: ".$request->getAttribute("id")." al nuevo valor: ".$request->getAttribute("id");
    echo json_encode($array);
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>