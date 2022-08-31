<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <script src="../scripts/script.js"></script>
    <title><?= $titre ?> </title>









</head>

<body>
<div class="content-wrapper">
    <header id="entete">
      <h4> <a target="_self" href="../index.php">Pépinière Labranche</h4></a>
      <button onclick="darkModeFunction()">Changer le mode de couleur</button>
      <nav>
        <a target="_self" href="../index.php">Menu principal</a>
      </nav>
    </div>
  </header>
  <?= $contenu ?>
  <!-- Le pied de page -->
  <footer id="pied">
    <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
    <p>Denière modification : <?php echo date('17/07/2022'); ?>.</p>
    <p id="copyright">Mise en page © 2022 Pépinière Labranche <br></p>
  </footer>
      


</body>


</html>

      
        
   
 

