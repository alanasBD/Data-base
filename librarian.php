  <?php 
    $page=1;
    if(isset($_GET['page']))
    {
      $page=$_GET['page'];
    }
    $limit=5;
    $offset=$page*$limit-$limit;
    $pdo=new PDO('mysql:host=localhost;dbname=library','root','');
    $query1=$pdo->query("select * from libarian limit $limit offset $offset");
    $query2=$pdo->query("select * from libarian");
    $total_row=$query2->rowCount();
    $total_page=ceil($total_row/$limit);
    // $query->execute();
    $result=$query1->fetchAll();
    

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">HSTU LIBRARY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student.php">Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="book.php">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="librarian.php">Librarian</a>
          </li>
       </ul>
      </div>
    </div>
  </nav>
  
  <!-- Page Content -->
  <div style="width:80%;margin:0 auto;" >
    <div class="card mt-3" >
  <div class="card-header">
    Librarian
  </div>
 
  <div class="card-body">
  <!-- form -->
  <!-- table -->
    <table class="table table-bordered text-center table-hover ">
    <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Phone</th>
         <th scope="col">Post</th>
         
        </tr>
  </thead>
  <tbody>
 <?php foreach($result as $r){ ?>
    <tr>
      <th scope="row"><?php echo $r['id']?></th>
      <td><?php echo $r['name']?></td>
      <td><?php echo $r['phone']?></td>
      <td><?php echo $r['post']?></td>
     
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>

<ul class="pagination justify-content-center my-4">
  <li class="page-item <?php if($page<=1) echo 'disabled';?>"><a href="?page=<?php echo $page-1; ?>" class="page-link">Previous</a></li>
  <?php
  for($i=1;$i<=$total_page;$i++)
  {
?>
  <li class="page-item <?php if($page==$i) echo 'active';?>"><a href="?page=<?php echo $i;?>" class="page-link"><?php echo $i; ?></a></li>
  
  <?php } ?>
  <li class="page-item <?php if($page>=$total_page) echo 'disabled';?>">
  <a href="?page=<?php echo $page+1; ?>" class="page-link ">Next</a></li>
</ul>
<!-- Footer -->
  <div style="margin-top:0px;">
    <footer class="py-4 bg-dark mt-5"  >
    <div class="container" >
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>
  </div>

<!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $('.alert').alert();
  </script>

</body>
</html>