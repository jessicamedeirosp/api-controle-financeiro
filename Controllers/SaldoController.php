<?php 
namespace Controllers;

class SaldoController extends Controller {
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf']
    );
    return json_encode(array('dados' => 
       \Models\SaldoModel::calcularSaldo($parametros)));    
  }
}
?>