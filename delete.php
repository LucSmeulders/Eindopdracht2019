<?php
  require_once 'blogs.php';
  require_once 'function.php';
  session_start();
  $oblog_id = "";
  

  if(isset($_GET['blog_id'])){
    $blog_id = $_GET['blog_id'];
    $blog = new blogs();
    $data = $blog->deleteDataById('blog', $blog_id);
    var_dump($data);
    relocator('index.php');
  }