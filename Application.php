<?php 
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
    }
  }
}

?>