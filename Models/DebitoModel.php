<?php 
  namespace Models;
  class DebitoModel {
    public function __construct(){
      
    }

    public static function debitarValor($parametros) {      
      $conexao = ConexaoModel::getDb();

      $valor = floatval($parametros['valor']);
      if($valor > 0) $valor = $valor*-1;

      $preparar = $conexao->prepare("CALL debitarValor('".$parametros['cpf']."', $valor);");
      $resultado = "";
      if ($preparar->execute()) {
        while($elemento = $preparar->fetch(\PDO::FETCH_ASSOC)) {
          $resultado = $elemento;
        }
      }
  
      if (count($resultado) > 0 ) 
        return array($resultado);

      return array('status' => 'Erro','mensagem' => 'Erro ao debitar valor' );

    } 
  }
?>