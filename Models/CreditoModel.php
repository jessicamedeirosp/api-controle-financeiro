<?php 
  namespace Models;
  class CreditoModel {

    public static function creditarValor($parametros) {      
      $conexao = ConexaoModel::getDb(); 
      
      $preparar = $conexao->prepare("CALL creditarValor('".$parametros['cpf']."',".$parametros['valor'].");");
      $resultado = "";
      if ($preparar->execute()) {
        while($elemento = $preparar->fetch(\PDO::FETCH_ASSOC)) {
          $resultado = $elemento;
        }
      }  
      if (count($resultado) > 0 ) 
        return array($resultado);
      
      return array('mensagem' => 'Erro ao debitar valor' );

    } 
  }
?>