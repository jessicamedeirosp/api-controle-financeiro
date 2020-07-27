<?php 
// header('Content-type: application/json; charset=utf-8');
define('INCLUDE_PATH','http://127.0.0.1:8078/');
define('INCLUDE_PATH_FULL','http://127.0.0.1:8078/Views/pages/');
class Application {
  public function executar() {  
    
    $REQUEST_URI = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
    if($REQUEST_URI == null ) {
      $REQUEST_URI = "";
    } else {
      $REQUEST_URI = $REQUEST_URI[0];
    }
    $url = strlen($REQUEST_URI) > 0 ? $REQUEST_URI : 'Extrato';// recupera url 
           
    $url = ucfirst($url); // deixa primeira letra maiuscula
    $url.="Controller";
   
    if(file_exists('Controllers/'.$url.'.php')){              
      $className = 'Controllers\\'.$url;
      $Controller = new $className();
      echo $Controller->executar();
    } else{
      die('Controller não existe');
       // return json_encode(array('status' => 'Erro', 'dados' => array('message' => 'Controller não existe')));
      
    }
  }
}

?>