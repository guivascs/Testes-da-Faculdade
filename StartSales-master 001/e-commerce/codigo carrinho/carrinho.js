function AddItemCarrinho(id){
  
  //Recebe a id do produto inclusa no botão "adicionar ao carrinho"
  $.ajax({
    url: "php/produtos.php", //Página alvo
    type: "post", //Metodo de envio
    data: "id=" + id, //Dados que serão enviados até a página

    //Caso a operação seja bem sucedida, um echo é retornado
    success: function(result){
      if (result!=0) {
        $('#carrinho_itens').html(result); //Se o produto não existir no carrinho, o icone do carrinho sobe 1 numero
      }else{
        alert("O produto já existe no Carrinho, quantidade acrescentada em 1");
      }
    }
  })
  return false;
}

function RemoverItemCarrinho(id){
  if (confirm("Deseja remover este item ?")) {
    $.ajax({
      url: "php/produtos.php",
      type: "post",
      data: "id=" + id + "&action=removeritem",

      success: function(result){
        if (result != 0) {
          alert("O produto foi removido!");
          $('#carrinho_itens').html(result);
          setTimeout(function(){
            location.reload(true);
          }, 1000);
        }else if (result == 0) {
          alert("O produto foi removido!");
          $('#carrinho_itens').html(result);
          setTimeout(function(){
            location.reload(true);
          }, 1000);
        }else{
          alert("Ocorreu um erro ao remover o produto");
        }
      }
    })
    return false;
  }
}

function ModificarQuantidade(action, id){
  $.ajax({
    url: "php/produtos.php",
    type: "post",
    data: "id=" + id + "&action=modificaritem&val=" + action,

    success: function(result){
      if (result != 0) {
        $('#qtditem').html(result);
      }else{
        RemoverItemCarrinho(id);
      }
    }
  })
  return false;
}
