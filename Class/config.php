<?php
# PDO - Php data object
class Config {
  # Characteristics
  private $username = 'root';
  private $password = '';
  public $pdo = null;

  # Functions
  public function con(){
    try {
      #                          This is Connection String
      $this -> pdo = new PDO('mysql:host=127.0.0.1;dbname=fitness',$this->username,$this->password);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
    # if Successfull yung try e rereturn yung Connection which is si pdo.
    return $this->pdo;
  }
}
?>
