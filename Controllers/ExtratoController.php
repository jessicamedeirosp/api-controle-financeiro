<?php 
namespace Controllers;

class ExtratoController extends Controller{
  public function executar() {
    $cpf = $_POST['cpf'];
    if (strlen($cpf) == 11){
      $extrato = \Models\ExtratoModel::buscaExtrato($cpf);
      return json_encode(array('status' => 'Erro', 'dados' => $extrato));    
    }
    
  }
}
?>