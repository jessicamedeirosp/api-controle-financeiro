<?php 
namespace Controllers;

class ExtratoController extends Controller {
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf']
    );
    return json_encode(array('dados' => 
      \Models\ExtratoModel::buscaExtrato($parametros)));    
    
  }
}
?>