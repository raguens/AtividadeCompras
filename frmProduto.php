<?php

/* 
 Produto Atividade Adalto
 */

include_once 'model/clsProduto.php';
include_once 'dao/clsProdutoDAO.php';
include_once 'dao/clsConexao.php';

    $nome = "";
    $preco = "";
    $quantidade = "";
    $action = "inserir";
    
    if( isset($_REQUEST['editar']) ){
        $id = $_REQUEST['idProduto'];
        $produto = ProdutoDAO::getProdutosById($id);
        $nome = $produto->getNome();
        $preco = $produto->getPreco();
        $quantidade = $produto->getQuantidade(); 
        $action = "editar&idProduto=".$produto->getId();
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Produto</title>
    </head>
    <body>
        <?php
            require_once './menu.php';
        ?>
        
        <h1 align="center">Cadastrar Produto</h1>
        <br><br><br>
        
        <form action="controller/salvarProduto.php?<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
            
            <label>Nome: </label>
            <input type="text" name="txtNome" value="<?php echo $nome;?>" required maxlength="100"/> <br><br>
            <label>Preço: </label>
            <input type="text" name="txtPreco" value="<?php echo $preco;?>" maxlength="30"/> <br><br>
            <label>Quantidade: </label>
            <input type="text" name="txtQuantidade" value="<?php echo $quantidade;?>" maxlength="30"/> <br><br>
            
            
            <input type="submit" value="Salvar" />
            <input type="reset" value="Limpar" /> 
            
        </form> 
        
    </body>
</html>