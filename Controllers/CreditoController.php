<?php 
namespace Controllers;

class CreditoController {
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf'],
      'valor' => $_POST['valor']
    );
      
    $resultado = \Models\CreditoModel::creditarValor($parametros);
    return json_encode(array('dados' => $resultado));    
    
  }
}
?>