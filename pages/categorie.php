  
<?php 
// Navigation-menu
require_once('../includes/navbar.php');
//connexion avec base de donnes 
require_once('../includes/connexion.php');
// $query ="SELECT * FROM Categorie";
// $result = mysqli_query($con,$query);
//MAKING THE SEARCH FORM DYNAMICALLY :
$nomCategorie=isset($_GET['nomCategorie']) ? $_GET['nomCategorie'] : "all";
$marque=isset($_GET['marque']) ? $_GET['marque'] :"";
$size=isset($_GET['size']) ? $_GET['size'] :6;
$page = isset($_GET['page']) ? $_GET['page'] :1;
// "SELECT * from Categorie WHERE marque LIKE '%$marque%' LIMIT $size OFFSET $offset "; <==> "SELECT * from Categorie WHERE marque LIKE '%$marque%' LIMIT $offset,$size"

$offset = ($page-1) * $size;
// pour tester: echo "$marque  $nomCategorie";
if ($nomCategorie=="all") {
   $query = "SELECT * from Categorie WHERE marque LIKE '%$marque%'";
   $query2 = "SELECT * FROM Categorie WHERE marque LIKE '%$marque%' LIMIT $offset, $size";


}else {
   $query="SELECT * from Categorie WHERE nomCategorie ='$nomCategorie' AND marque LIKE '%$marque%'";
   $query2 = "SELECT * from Categorie WHERE marque LIKE '%$marque%' LIMIT $offset,$size ";

}
$result = mysqli_query($con,$query);
$numberResult=mysqli_num_rows($result);
// echo $numberResult; outpout=5
$numberPages =ceil($numberResult/$size);
// echo $size;
// echo $numberResult;
// echo $numberPages;
$result2 = mysqli_query($con,$query2);

?>  
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
     <!-- panneau de recherche  -->
 <!-- Debut -->
   <div class="container">
   <div class="panel panel-info">
  <div class="panel-heading">que recherchez-vous?...</div>
  <div class="panel-body">
    <!-- Formulaire de recherche -->
<center>
<form class="form-inline" action="categorie.php" method="get">
  <div class="form-group">
    <label for="nomCategorie"> Categorie : </label>
<select name="nomCategorie" id="nomCategorie" class="form-control">
<option value="all">Toute Categorie</option>
<?php
$query3="SELECT nomCategorie FROM Categorie";
$result3=mysqli_query($con,$query3); 
while ($row=mysqli_fetch_array($result3)) {
    $nom = $row['nomCategorie'];
 echo "
 <option value='$nom'".($nom == $nomCategorie ? "selected" : "").">$nom</option>

 ";
}

?>
<!-- 
<option>Electronique</option>
<option>Hygin</option>
<option>Vetement</option>
<option>Fourniture</option>   -->
</select>  
  </div>
  <div class="form-group">
   <label for="marque"> Marque : </label>
  <input type="text" class="form-control" placeholder="Chercher une marque" name="marque" id="marque" value="<?php echo "$marque" ?>">

  <div class="form-group">
    <label for="size"> Size : </label>
<select name="size" id="size" class="form-control">
<option>4</option>
<option>6</option>
<option>8</option>
<option>10</option>
</select>  
  </div>
 <button type="submit" class="btn btn-info "><span class="glyphicon glyphicon-search"></span>Chercher</button>
  <a class="btn btn-info" href="#"><span class="glyphicon glyphicon-plus"></span> Ajouter Catégorie</a>
</div>
  </div>
</form>
</center>
  </div>
</div>
   </div>
   <!-- Fin -->
       <!-- panneau de resultat de la recherche  -->
 <!-- Debut -->
 <div class="container">
   <div class="panel panel-primary">
  <div class="panel-heading"><h4>Liste des Produits:</h4></div>
  <div class="panel-body">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="info">
                <th>ID Catégorie</th>
                <th>Désignation</th>
                <th>Marque</th>
                <th>Opérations</th>
            </tr>
        </thead>
      
        <tbody>
            <?php
                //retourner ligne par ligne:
             
           while ($row=mysqli_fetch_assoc($result2)) {
            $id=$row['idCategorie'];
            $nom = $row['nomCategorie'];
            $Marque=$row['marque'];
            echo "
            <tr>
                <td>$id</td>
               <td>$nom</td>
               <td>$Marque</td>
               <td><a class='btn btn-link' href='#'> <span class='glyphicon glyphicon-edit'></span> Modifier </a>   
                |    <a href='#'><span class='glyphicon glyphicon-trash'> </span> Supprimer</a></td>
            </tr>
            " ;

           }
            ?>
              <!--
            <tr>
                <td>1</td>
               <td>Alimeentation</td>
               <td>Central</td>
               <td><a class="btn btn-link" href="#"> <span class="glyphicon glyphicon-edit"></span> Modifier </a>    |    <a href="#"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a></td>
            </tr>
            <tr>
            <td>2</td>
               <td>Electronique</td>
               <td>iphone</td>
               <td><a class="btn btn-link" href="#"> <span class="glyphicon glyphicon-edit"></span> Modifier </a>    |    <a href="#"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a></td>
            </tr>
            <tr>
            <td>3</td>
               <td>Hygin</td>
               <td>Dalaa</td>
               <td><a class="btn btn-link" href="#"> <span class="glyphicon glyphicon-edit"></span> Modifier </a>    |    <a href="#"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a></td>
            </tr>
            <td>4</td>
               <td>Vetement</td>
               <td>Calvin Klien</td>
               <td><a class="btn btn-link" href="#"> <span class="glyphicon glyphicon-edit"></span> Modifier </a>    |    <a href="#"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a></td>
            </tr>
            -->
        </tbody>
    </table>
    <!-- pagination -->
  <div class="text-center">
  <ul class="pagination justify-content-center">
   <?php
    for($i=1;$i<=$numberPages;$i++){
echo "<li class='".($page==$i ?  "active" 
: "")."'><a href='categorie.php?nomCategorie=$nomCategorie&marque=$marque&size=$size&page=$i'>Page $i</a></li>";


    }
// <option value='$nom'".($nom == $nomCategorie ? "selected" : "").">$nom</option>

   ?>
  <!-- <li class="active"><a href="#">Page 1</a></li>
  <li><a href="#">Page 2</a></li>
  <li><a href="#">Page 3</a></li>
  <li><a href="#">Page 4</a></li>
  <li><a href="#">Page 5</a></li> -->
</ul>
  </div>

  </div>
</div>
   </div>
   <!-- Fin -->  
    </body>
</html>