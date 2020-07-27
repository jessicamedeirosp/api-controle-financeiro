<?php 
  namespace Models;
  class ExtratoModel extends Model {
    private $parametros;
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
      }

      return array('status' => 'alerta','mensagem' => 'Nenhum elemento encontado' );
    } 
  }
?>