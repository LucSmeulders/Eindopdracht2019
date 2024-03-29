<?php
  require_once 'blogs.php';
  require_once 'function.php';

  // POST uitgevoerd ?
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    // Verwachte POST-vars gekend ?
    // datum MOET ingevoerd zijn
    if(isset($_POST['datum']) && !empty($_POST['datum']) && isset($_POST['titel']) && isset($_POST['bericht'])){
        // Data in variabelen steken, blanco's opvangen door default tekst
        $datum = $_POST['datum'];
        $titel = empty($_POST['titel']) ? "geen titel" : $_POST['titel'];
        $bericht = empty($_POST['bericht']) ? "geen bericht" : $_POST['bericht'];

        // verbinding met tabel maken en nieuwe data inserten
        $blog = new blogs();
        $blog->insertData('blog', $datum, $titel, $bericht);
    }
    relocator('index.php');
}

?>

<html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
     <link href="css/main.css">
     <title>Nieuwe deelnemer</title>
   </head>

   <body>
       <div class="container">
         <div class="row">
           <div class="col-8 offset-2">
             <h1 class="text-center mt-2 pt-5 pb-2">Nieuw RSS</h1>
             <div class="row">
               <form action="create.php" method="POST" class="mb-3 pl-2 pr-2">
                 <div class="form-group">
                 <div class="form-group">
                  <label for="datum">Datum</label>
                  <input type="date" class="form-control" id="datum" name="datum" placeholder="Datum">
                </div>
                  <label for="titel">Titel</label>
                  <input type="text" class="form-control" id="titel" aria-describedby="emailHelp" name="titel" placeholder="Vul een titel in">
                </div>
                <div class="form-group">
                  <label for="bericht">Bericht</label>
                  <input type="text" class="form-control" id="bericht" name="bericht" placeholder="Vul bericht in">
                </div>
                <button type="submit" class="btn btn-primary" id="add" name="add">Toevoegen</button>
               </form>
             </div>
           </div>
          </div>
       </div>
     </div>
   </body>
</html>
