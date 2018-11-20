<?php
    include_once 'model/clsProduto.php';
    include_once 'dao/clsProdutoDAO.php';
    include_once 'dao/clsConexao.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produtos</title>
    </head>
    <body>
        <?php
            require_once './menu.php';
        ?>
        
        <h1 align="center">Produtos</h1>
        
        <br><br><br>
        
        <a href="frmProduto.php">
            <button>Cadastrar novo produto</button></a>
        
            <br><br>
            
            <?php
                $lista = ProdutoDAO::getProdutos();
            
                    if( $lista ->count()==0){
                        echo '<h2><b>Nenhum produto cadastrado</b></h2>';
                    } else {
                
            ?>
            
            <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>SubTotal</th>
            </tr>
            
            <?php
                $total = 0;
                foreach ($lista as $pro){
                        $totalProduto = $pro->getPreco()*$pro->getQuantidade();
                        echo ' <tr> ';
                        echo ' <td>'.$pro->getId().'</td>';
                        echo ' <td>'.$pro->getNome().'</td>';
                        echo ' <td>'."R$ ".$pro->getPreco().'</td>';
                        echo ' <td>'.$pro->getQuantidade().'</td>';
                        echo ' <td>'.$totalProduto.'</td>';
                        
                        $total = $total + $totalProduto;
                                
                        echo '</tr>';
                    }
            ?>
            
            </table>          
            
            <?php
                    }
        ?>
            
            <h2>Total: <?php echo 'R$ '.$total;?> </h2>
    </body>
</html>
