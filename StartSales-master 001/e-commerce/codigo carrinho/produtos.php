<?php

  session_start();

  if (isset($_POST['id'])) {
    if (isset($_POST['action'])) {
      if ($_POST['action'] === "removeritem") {
        RemoverProdutoCarrinho($_POST['id']);
      }else{
        ModificarQuantidade($_POST['val'], $_POST['id']);
      }
    }else{
      AddProdutoCarrinho($_POST['id']);
    }
  }

  //Busca 6 produtos aleatórios pra exibir na tela inicial
  function BuscarProdutos($conn){

    $q = "SELECT * FROM produto ORDER BY RAND() LIMIT 6";
    $sql = mysqli_query($conn, $q);

    while($rs = mysqli_fetch_array($sql)){
      echo "<div class='produto'><h3>". $rs['nome'] ."<h3><img alt='' src='". $rs['imagem'] ."'><div class='add_carrinho_button' onclick='AddItemCarrinho(". $rs['codigo'] .")'><img alt='add carrinho' src='image/icon/carrinho.png'>Adicionar ao Carrinho</div><a href='produto.php?p=".$rs['codigo']."'>Visualizar Produto</a></div>";
    }

  }

  //Busca os produtos cadastrados em uma categoria
  function BuscarProdutosCategoria($conn, $id){
    $q = "SELECT * FROM produto WHERE cod_categoria = ". $id ." ORDER BY RAND() LIMIT 6";
    $sql = mysqli_query($conn, $q);

    while($rs = mysqli_fetch_array($sql)){
      echo "<div class='produto'><h3>". $rs['nome'] ."<h3><img alt='' src='". $rs['imagem'] ."'><div class='add_carrinho_button' onclick='AddItemCarrinho(". $rs['codigo'] .")'><img alt='add carrinho' src='image/icon/carrinho.png'>Adicionar ao Carrinho</div><a href='produto.php?p=".$rs['codigo']."'>Visualizar Produto</a></div>";
    }
  }

  //Busca um produto específico
  function BuscarProduto($conn, $cod){

    $q = "SELECT * FROM produto WHERE codigo = " . $cod;
    $sql = mysqli_query($conn, $q);

    if ($rs = mysqli_fetch_array($sql)) {
      echo "<div id='produto_left_side'>
              <h2>". $rs['nome'] ."</h2>
              <img alt='foto produto' src='". $rs['imagem'] ."'>
            </div>
            <div id='produto_right_side'>
              <h2>Detalhes do Produto</h2>
              <span>Cor:</span> ". $rs['cor'] ." <br>
              <span>Preço:</span> R$".  $rs['valor'] ." <br>
              <span>Fabricante</span> ". $rs['fabricante'] ." <br>
              <button id='btnproduto' class='btn_style' onclick='AddItemCarrinho(". $cod .")'>Adicionar ao Carrinho</button>
            </div>
            <div id='produto_desc'>
              <h2>Descrição do Produto</h2>
              <span>". $rs['descricao'] ."</span>
            </div>";
    }
  }

  //Busca produtos por nome
  function BuscarProdutosNome($conn, $produto){
    $q = "SELECT * FROM produto WHERE nome LIKE '%". $produto ."%'";
    $sql = mysqli_query($conn, $q);

    while($rs = mysqli_fetch_array($sql)){
      echo "<div class='produto'><h3>". $rs['nome'] ."<h3><img alt='' src='". $rs['imagem'] ."'><div class='add_carrinho_button' onclick='AddItemCarrinho(". $rs['codigo'] .")'><img alt='add carrinho' src='image/icon/carrinho.png'>Adicionar ao Carrinho</div><a href='produto.php?p=".$rs['codigo']."'>Visualizar Produto</a></div>";
    }
  }

  //Seleciona todas as Categorias
  function BuscarCategorias($conn){
    $q = "SELECT * FROM categoria";
    $sql = mysqli_query($conn, $q);

    while($rs = mysqli_fetch_array($sql)){
      echo "<li>
              <a href='produtos.php?c=". $rs['codigo'] ."'>"
                . $rs['nome'] .
              "</a>
            </li>";

    }
  }

  function AddProdutoCarrinho($idproduto){

    //Verifica se o Carrinho de Compras já foi criado
    //Caso não tenha sido, ele o cria.
    if(!isset($_SESSION['carrinho'])){
      $_SESSION['carrinho'] = array(); 

      $_SESSION['carrinho'][$idproduto] = 1; //Modelo Chave => Valor de IDProduto => Quantidade
      $_SESSION['itens_carrinho'] = 1; //Contador de produtos do carrinho

      echo $_SESSION['itens_carrinho']; //Retorna a quantidade de produtos do carrinho.
      exit;

    }else{

      //Verifica se o produto já existe no carrinho de compras
      if (array_key_exists($idproduto, $_SESSION['carrinho'])) {
        $_SESSION['carrinho'][$idproduto] += 1; //Caso exista, soma-se 1 à quantidade.
        echo 0;
      }else{
        //Caso não exista, o mesmo é adicionado e a quantidade de produtos no contador é aumentada.
        $_SESSION['carrinho'][$idproduto] = 1;
        $_SESSION['itens_carrinho'] += 1;

        echo $_SESSION['itens_carrinho'];
        exit;
      }
    }
  }

  function RemoverProdutoCarrinho($id){

    //Verifica se o item existe no array
    if (array_key_exists($id, $_SESSION['carrinho'])) {
      unset($_SESSION['carrinho'][$id]); //Exclui o item do Array

      //Verifica se o carrinho de compras ainda possui algum item
      if ($_SESSION['itens_carrinho'] > 0) {
        $_SESSION['itens_carrinho'] -= 1; //Se possuir, deduz em 1 a quantidade de produtos do carrinho
        if ($_SESSION['itens_carrinho'] == 0) { //Se o carrinho não tiver nenhum item, ele destroy a session
          unset($_SESSION['carrinho']);
          echo 0;
        }else{
          echo $_SESSION['itens_carrinho'];  //Retorna o valor
        }
      }
    }
  }

  //Busca um produto específico do carrinho de compras
  function BuscarProdutoCarrinho($conn, $id){

    $q = "SELECT * FROM produto where codigo = " . $id;
    $sql = mysqli_query($conn, $q);

    if ($rs = mysqli_fetch_array($sql)) {
      echo "<tr>
              <td>". $rs['codigo'] . "</td>
              <td>". $rs['nome'] ."</td>
              <td>
                <a href='#' onclick='ModificarQuantidade(1, ". $rs['codigo'] .")'> + </a>
                <span id='qtditem'>". $_SESSION['carrinho'][$id] . "</span>
                <a href='#' onclick='ModificarQuantidade(2, ". $rs['codigo'] .")'> - </a></td>".
              "<td> <a href='#' onclick='RemoverItemCarrinho(". $rs['codigo'] .")'>Remover</a></td></tr>";
    }
  }

  //Modifica a quantidade dos produtos no carrinho de compras
  function ModificarQuantidade($acao, $id){
    if ($acao == 1) { //1 - Aumentar quantidade / 2 - Diminuir 
      $_SESSION['carrinho'][$id] += 1;
      echo $_SESSION['carrinho'][$id]; //Retorna a quantidade do produto
    }else{
      if ($_SESSION['carrinho'][$id] != 0) {
        $_SESSION['carrinho'][$id] -= 1;
        echo $_SESSION['carrinho'][$id];
      }else{
        echo 0; //Se não for possível aumentar ou diminuir, ele acusa erro
      }
    }
  }
 ?>
