<?php
  ini_set('display_error', 5);
  error_reporting(E_ALL);
  session_start();

  require_once 'blogs.php';
  // Opvragen van alle evenementen in database
  $blog = new blogs();
  $blogData = $blog->getAllData('blog');
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Club Evenementen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <div class="navbar-nav mr-auto mt-2 mt-lg-0">
        
        </div>
        <form class="form-inline my-2 my-lg-1">
          <div>
          <a href="feed.php" class="btn btn-danger " type="button">RSS</a>
          </div>
          <a href="create.php" class="btn btn-danger " type="button">Nieuw</a>
       </form>
      </div>
    </nav>


    <h1 class="text-center">RSS feeds</h1>
    <div class="row">
      <div class="col-8 offset-2">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Datum</th>
              <th scope="col">Titel</th>
              <th scope="col">Omschrijving</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($blogData)>0): ?>
              <?php $counter=0 ; ?>

              <?php while($counter<count($blogData)) :?>
                <?php $row = $blogData[$counter]; ?>
                <tr>
                  <td><?php echo $row['blog_id']; ?></td>
                  <td><?php echo $row['datum']; ?></td>
                  <td><?php echo $row['titel']; ?></td>
                  <td><?php echo $row['bericht']; ?></td>
                  <td><a href="update.php?blog_id=<?php echo $row['blog_id']; ?>" class="btn btn-update" type="button">Wijzigen</a></td>
                  <td><a href="delete.php?blog_id=<?php echo $row['blog_id']; ?>" class="btn btn-danger" type="button">Schrappen</a></td>
                </tr>
                <?php $counter++ ; ?>

              <?php endwhile; ?>
            <?php endif; ?>
          </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>