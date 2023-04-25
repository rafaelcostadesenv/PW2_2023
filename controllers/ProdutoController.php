<?php
class ProdutoController{
    public function findAll(){
        return array(
        new Produto(1, "Sabão", 8.90, "Marca YPE", "https://http2.mlstatic.com/D_NQ_NP_609742-MLB31148534160_062019-W.jpg"),
        new Produto(2, "Sabonete", 3.20, "Marca Protex", "https://www.bistek.com.br/media/catalog/product/cache/15b2f1f06e1cd470c80b1f3fd7ec8301/1/8/1861573_1.jpg"),
        new Produto(3, "Carvão", 16.40, "Vermelhinho", "https://app.rodofoz.com.br/wp-content/uploads/2021/07/5a349e95f0-1.png"),
        new Produto(4, "Contra Filé", 43.90, "Carne Bovina", "https://i0.wp.com/lombinhosprime.com.br/wp-content/uploads/2022/12/contra-file.jpg?fit=770%2C555&ssl=1"),
      );
    }

    public function findById($id){
      $produtos = $this->findAll();

      foreach ($produtos as $produto):
        if($produto->getId() == $id){
          return $produto;
        }
      endforeach;
      return null;

    }
}