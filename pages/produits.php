<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Produits</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
             <!-- Navigation-menu -->
<?php 
include('../includes/navbar.php');
?>                           
     <!-- panneau de recherche  -->
 <!-- Debut -->
   <div class="container">
   <div class="panel panel-info">
  <div class="panel-heading">que recherchez-vous?...</div>
  <div class="panel-body">
    <!-- Formulaire de recherche -->
  <form class="form-inline" action="#" method="get">
  <div class="form-group">
  
    <input type="text" class="form-control" placeholder="Chercher une Categorie" name="categorie">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>
  </div>
</div>
   </div>
   <!-- Fin -->
       <!-- panneau de resultat de la recherche  -->
 <!-- Debut -->
 <div class="container">
   <div class="panel panel-success">
  <div class="panel-heading">Liste des Produits</div>
  <div class="panel-body">Contenu de produits </div>
</div>
   </div>
   <!-- Fin -->  
    </body>
</html>