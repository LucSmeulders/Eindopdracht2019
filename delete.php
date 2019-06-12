<?php
  require_once 'blogs.php';
  require_once 'function.php';
  session_start();
  $oblog_id = "";
  
  // blog_id wordt via onzichtbaar element meegegeven
  if(isset($_GET['blog_id'])){
    // blod-id opslaan
    $blog_id = $_GET['blog_id'];
    // verbinding met tabel maken en blog verwijderen adhv het blog_id
    $blog = new blogs();
    $data = $blog->deleteDataById('blog', $blog_id);
    relocator('index.php');
  }