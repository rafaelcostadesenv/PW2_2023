<?php
    include "models/Produto.php";
    include "controllers/ProdutoController.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 2</title>
    <!-- Área para os Scripts CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Título da Página -->
</head>
<body>
    <!-- Conteúdo do Body -->
    
    
    <?php 
      $controller = new ProdutoController();
      $produtos = $controller->findAll();
    ?>

      <div class="container mt-5">
          <div class="row">
              <div class="col">
                  <h1 class="text-center mb-5">Lista de Produtos</h1>
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                  </div>
              </div>
          </div>
      </div>

    
    
    
    <!-- Área para os Scripts Java Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

