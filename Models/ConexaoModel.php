<?php 
namespace Models;
class ConexaoModel {
  public static $conexao;
 
  private function __construct() {}

  public static function getDb() {
    try { 
      if (!isset(self::$conexao)) {       
          $usuario = 'jessmede_apiphp';
          $senha = '5@j4F#45';
          self::$conexao = new \PDO('mysql:host=216.172.172.89;dbname=jessmede_controle_financeiro;',$usuario,$senha);
          self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          self::$conexao->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_EMPTY_STRING);
          self::$conexao->exec('set names utf8');
      }
      return self::$conexao;

    } catch (\Exception $e) {
      throw new \Exception("Erro na conexãoo");
    }
  }
}
?>