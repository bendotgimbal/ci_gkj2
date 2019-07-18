<?php
  if (isset($link)){
      include ('application/views/conten/'.$link);
 }else{
     include ('application/views/conten/home.php');
 }
?>
