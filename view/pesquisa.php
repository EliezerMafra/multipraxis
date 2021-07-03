<?php 
    session_start();
    require_once("./containers/header.php");
    require_once('../controller/dbconfig.php'); 
    require_once("../dao/projetoDao.php");
?>

<a href="../index.php" class="btn btn-secondary">Home</a>
<br/>
<br/>

<?php

    if($_GET['elementoPesquisa'] == ""){
        echo "<h2>Pesquisando por Todos os projetos</h2>";

        $projetos = listAll($conn);

    }else{
        echo "<h2>Pesquisando por " . $_GET['elementoPesquisa'] ."</h2>";
        
        $element = $_GET['elementoPesquisa'];

        $projetos = search($conn, $element);

        //var_dump($projetos);
    }

?>



<!-- CONTEUDO DA PÁGINA AQUI -->

<table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Resumo</th>
                <th>Autor</th>
                <th>Palavras-Chave</th>
                <th>Documento</th>
            </tr>
        </thead>
        <tbody>
            

            <?php
                foreach ($projetos as $proj)
                {
                    echo "<tr>";
                    echo "<td>" . $proj['id'] . "</td>";
                    echo "<td>" . $proj['titulo'] . "</td>";
                    echo "<td>" . $proj['resumo'] . "</td>";
                    echo "<td>" . $proj['autor'] . "</td>";
                    echo "<td>" . $proj['palavras'] . "</td>";

                    $filepath = "../uploads/". $proj['documento'];
                
                    echo "<td>". " <a href='$filepath' download>Download </a>"  . "</td>";
                    echo "</tr>";
                }

                ?>
        </tbody>
    </table>

<?php 
     require_once("./containers/footer.php");
?>