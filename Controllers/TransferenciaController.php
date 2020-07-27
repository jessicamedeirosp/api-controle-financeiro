<?php 
namespace Controllers;

class TransferenciaController extends Controller {
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf'],
      'cpf_destinatario' => $_POST['cpf_destinatario'],
      'valor' => $_POST['valor']
    );
    return json_encode(array('dados' => 
      \Models\TransferenciaModel::transferirValor($parametros)));    
    
  }
}
?>