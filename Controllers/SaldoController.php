<?php 
namespace Controllers;

class SaldoController {
  public function executar() {
    $cpf = $_POST['cpf'];
    if (strlen($cpf) == 11){
      $resultado = \Models\SaldoModel::calcularSaldo($cpf);
      return json_encode(array('dados' => $resultado));    
    }
    
  }
}
?>