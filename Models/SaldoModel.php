<?php 
  namespace Models;
  class SaldoModel extends Model {
    public function __construct(){
      
    }

    public static function calcularSaldo($cpf) {
      $conexao = ConexaoModel::getDb();
      $preparar = $conexao->prepare("SELECT SUM(valor) as saldo FROM extrato where cpf=$cpf");
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