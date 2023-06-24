<?php
include_once("restrict.php");
require_once "controllers/ProdutoCompraController.php";

if (isset($_GET["id"])) {
    $produtoController = new ProdutoCompraController();
    $produtoController->delete($_GET["id"]);


    // Voltando para a tela anterior
    header("Location: ?pg=compras");
    exit();
}
