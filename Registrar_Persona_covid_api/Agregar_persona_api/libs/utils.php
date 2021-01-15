<?php 
       include('Configx.php');
       include('conexion.php');

       function asgInput($Id , $label, $valor= "", $opts=[]){

        $placeholder = "";
        $type = 'text';
        $readonly = '';

        if(isset($_POST[$Id])){
          
              $valor = $_POST[$Id];
        }

        extract($opts);

         return <<<INPUT

         <div class="row">
         <div class="input-field col s12">
         <input {$readonly} value="{$valor}" placeholder="{$placeholder}" name="{$id}" id="{$id}" type="{$type}" class="validate">
         <label for="{$id}">{$label}</label>
         </div>
         </div>

INPUT;
       }

?>