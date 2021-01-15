<?php

class conexion{

    public $mycon = null;
    static $instancia = null;

    function __construct(){
      
        $this->mycon = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        
    }
     
    function __destruct(){
        mysqli_close($this->mycon);
    }

    public static function ejecutar($sql, $retornarId = false){
        if(self:: $instancia == null){
          self:: $instancia = new conexion();
        }
        
       $rs = mysqli_query(self::$instancia->mycon, $sql);
      
       if($retornarId){
          $idx = mysqli_insert_id(self::$instancia->mycon);
          return $idx;
          
       }
       return $rs;
  
      }

    public static function query($sql){
      if(self:: $instancia == null){
        self:: $instancia = new conexion();
      }
      
     $rs = mysqli_query(self::$instancia->mycon, $sql);
     $final =[];
     while($fila = mysqli_fetch_object($rs)){
        
        $final[] = $fila;
     }
       return $final;

    }

    
    public static function consulta_array($sql){
        if(self:: $instancia == null){
          self:: $instancia = new conexion();
        }
        
       $rs = mysqli_query(self::$instancia->mycon, $sql);
       $final =[];
       while($fila = mysqli_fetch_assoc($rs)){
          
          $final[] = $fila;
       }
         return $final;
  
      }
    
}

?>