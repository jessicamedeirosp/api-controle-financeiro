<?php 
  namespace Models;
  class TransferenciaModel {
    public function __construct(){
      
    }

    public static function transferirValor($parametros) {      
      $conexao = ConexaoModel::getDb();

      $valor = floatval($parametros['valor']);     
      if($valor > 0)  $valor = $valor*-1;
      $preparar = $conexao->prepare("CALL transferirValor('".$parametros['cpf']."','".$parametros['cpf_destinatario']."', $valor);");
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