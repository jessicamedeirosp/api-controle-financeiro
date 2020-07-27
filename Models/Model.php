<?php
namespace Models;
class Model {
  
  public function escapar($dados)
  {
      if (is_string($dados) & !empty($dados)) {
          return "'".addslashes($dados)."'";
      } elseif (is_bool($dados)) {
          return $dados ? 'TRUE' : 'FALSE';
      } elseif ($dados !== '') {
          return $dados;
      } else {
          return 'NULL';
      }
  }

  
  public function preparar($dados)
  {
      $resultado = array();
      foreach ($dados as $k => $v) {
          if (is_scalar($v)) {
              $resultado[$k] = $this->escapar($v);
          }
      }
      return $resultado;
  }

}
?>