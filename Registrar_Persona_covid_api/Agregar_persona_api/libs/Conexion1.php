<?php
try {
    $servername ="localhost";
    $username = "root";
    $contraseña= "";
    
    $pdo = new PDO('mysql:host=localhost;dbname=tarea5_programacionweb',$username,$contraseña);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
