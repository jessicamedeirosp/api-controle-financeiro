<?php 
namespace Controllers;

class CreditoController extends Controller {
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf'],
      'valor' => $_POST['valor']
    );
    return json_encode(array('dados' => 
      \Models\CreditoModel::creditarValor($parametros)));    
    
  }
}
?>