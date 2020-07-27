<?php 
namespace Controllers;

class DebitoController extends Controller {
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf'],
      'valor' => $_POST['valor']
    );
      
    return json_encode(array('dados' => 
      \Models\DebitoModel::debitarValor($parametros)));    
    
    
  }
}
?>