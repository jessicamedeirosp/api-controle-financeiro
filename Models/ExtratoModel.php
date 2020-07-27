<?php 
  namespace Models;
  class ExtratoModel extends Model {
    public function __construct(){
      
    }

    public static function buscaExtrato($cpf) {
      $conexao = ConexaoModel::getDb();
      $preparar = $conexao->prepare("SELECT * FROM extrato where cpf = $cpf;");
      $resultado = array();
      if ($preparar->execute()) {
        while($elemento = $preparar->fetchObject(self::class)) {
          $resultado[] = $elemento;
        }
      }
      if (count($resultado) > 0) {
        return $resultado;
      } else {
        return array('status' => 'sucesso','mensagem' => 'Nenhum elemento encontado' );
      }

      return array('status' => 'erro','mensagem' => 'Erro ao buscar Extrato' );
    } 
  }
?>