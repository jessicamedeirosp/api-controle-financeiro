<?php 
  namespace Models;
  class SaldoModel extends Model {

    public static function calcularSaldo($parametros) {
      $conexao = ConexaoModel::getDb();
      $preparar = $conexao->prepare("SELECT SUM(valor) as saldo FROM extrato where cpf=".$parametros['cpf']."");
      $resultado = "";
      if ($preparar->execute()) {
        while($elemento = $preparar->fetch(\PDO::FETCH_ASSOC)) {
          $resultado = $elemento;
        }
      }
      if (count($resultado) > 0 ) {
        if($resultado['saldo'] == null) {
          return array(array('saldo' => '0'));
        } else{        
          return array($resultado);
        }
      }
      return array('mensagem' => 'Erro ao calcular saldo' );

    } 
  }
?>