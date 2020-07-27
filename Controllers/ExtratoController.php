<?php 
namespace Controllers;

class ExtratoController {
  public function executar() {
    $cpf = $_POST['cpf'];
    if (strlen($cpf) == 11){
      $resultado = \Models\ExtratoModel::buscaExtrato($cpf);
      return json_encode(array('dados' => $resultado));    
    }
    
  }
}
?>