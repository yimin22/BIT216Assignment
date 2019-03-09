<?php
if(!isset($_SESSION['logged'])){
  if($page_title != $LOGIN && $page_title != $SIGNUP){
    header("Location: login.php");
    exit();
  }
}else{
  if(isset($type)){
    if($_SESSION['type'] <> $type){
      header("Location:index.php");
      exit();
    }
  }
}
?>
