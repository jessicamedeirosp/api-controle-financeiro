<?php 
  namespace Models;
  class CreditoModel extends Model {
    public function __construct(){
      
    }

    public static function creditarValor($parametros) {
      
      $conexao = ConexaoModel::getDb();
      $cpf = $parametros['cpf'];
      $valor = floatval($parametros['valor']);  
      $preparar = $conexao->prepare("CALL creditarValor('$cpf', $valor);");
      $resultado = array();
      $resultado = "";
      if ($preparar->execute()) {
        while($elemento = $preparar->fetch(\PDO::FETCH_ASSOC)) {
          $resultado = $elemento;
        }
      }
  
      if (count($resultado) > 0 ) {
              
          return array($resultado);
        
      }

      return array('status' => 'Erro','mensagem' => 'Erro ao debitar valor' );

    } 
  }
?>