<?php
require '../../Slim/Slim.php';
require '../../connector.php';
\Slim\Slim::registerAutoloader();
$app=new \Slim\Slim();
$app->config('debug', false);
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
$app->get('/cat_precios','obtenerPrecios');
$app->post('/cat_precios','agregarRegistro');
$app->put('/cat_precios/:cat_prec_id','editarRegistro');
$app->delete('/cat_precios/:cat_prec_id','eliminarRegistro');
function obtenerPrecios() {
    $sql ="SELECT * FROM cat_precios"; 
    try {
        $db = getConnection();
        $stmt = $db->query($sql);  
        $detalle = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"cat_precios": ' . json_encode($detalle) . '}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}
function agregarRegistro(){
    $request = \Slim\Slim::getInstance()->request();
    $cat_precios = json_decode($request->getBody());
    $sql = "INSERT INTO cat_precios(nombre, precio) values(:nombre,:precio);";   
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql); 
        $stmt->bindParam("nombre",   $cat_precios->nombre);
        $stmt->bindParam("precio", $cat_precios->precio);
        $stmt->execute();
        $db = null;     
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}
function eliminarRegistro($cat_prec_id){
    $sql = "DELETE FROM cat_precios WHERE cat_prec_id = ".$cat_prec_id;   
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql); 
        $stmt->execute();
        $db = null;     
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}
function editarRegistro($cat_prec_id){
    $request = \Slim\Slim::getInstance()->request();
    $cat_precios = json_decode($request->getBody());
    $sql = "UPDATE cat_precios SET nombre = :nombre , precio=:precio WHERE cat_prec_id = ".$cat_prec_id;   
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql); 
        $stmt->bindParam("nombre", $cat_precios->nombre);
        $stmt->bindParam("precio", $cat_precios->precio);
        $stmt->execute();
        $db = null;     
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}
$app->run();
?>