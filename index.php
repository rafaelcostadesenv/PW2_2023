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
                    <?php foreach($produtos as $produto):?>
                      <div class="col">
                          <div class="card">
                              <a href="views/detalhes_produto.php?id=<?php echo $produto->getId(); ?>" class=""> 
                                  <img src="<?php echo $produto->getImagem(); ?>" class="card-img-top" 
                                  alt="<?php echo htmlspecialchars($produto->getNome()); ?>">
                              </a>
                              <div class="card-body">
                                  <h5 class="card-title"><?php echo htmlspecialchars($produto->getNome()); ?></h5>
                                  <p class="card-text"><?php echo htmlspecialchars($produto->getDescricao()); ?></p>
                                  <p class="card-text"><?php echo htmlspecialchars($produto->getValor()); ?></p>
                                  <a href="views/detalhes_produto.php?id=<?php echo $produto->getId(); ?>"
                                      class="btn btn-primary">Detalhes</a>
                              </div>
                          </div>
                      </div>
                    <?php endforeach; ?>
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

