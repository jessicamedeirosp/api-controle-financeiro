<?php 
namespace Controllers;

class TransferenciaController {
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf'],
      'cpf_destinatario' => $_POST['cpf_destinatario'],
      'valor' => $_POST['valor']
    );
      
    $resultado = \Models\TransferenciaModel::transferirValor($parametros);
    return json_encode(array('dados' => $resultado));    
    
  }
}
?>