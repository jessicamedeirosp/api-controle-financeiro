<?php 
namespace Controllers;

class DebitoController extends Controller{
  public function executar() {
    $parametros = array(
      'cpf' => $_POST['cpf'],
      'valor' => $_POST['valor']
    );
      
    $resultado = \Models\DebitoModel::debitarValor($parametros);
    return json_encode(array('dados' => $resultado));    
    
    
  }
}
?>