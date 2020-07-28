<?php 
  namespace Models;
  class ExtratoModel  {

    public static function buscaExtrato($parametros) {
      $conexao = ConexaoModel::getDb();
      $preparar = $conexao->prepare("SELECT * FROM extrato where cpf = ".$parametros['cpf'].";");
      $resultado = array();
      if ($preparar->execute()) {
        while($elemento = $preparar->fetchObject(self::class)) {
          $resultado[] = $elemento;
        }
      }
      if (count($resultado) > 0) {        
        return $resultado;
      } else {
        return array(array('mensagem' => 'Nenhum elemento encontado'));
      }

      return array('mensagem' => 'Erro ao buscar Extrato' );
    } 
  }
?>