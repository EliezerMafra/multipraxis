<?php 
    session_start();
    require_once("./containers/header.php");
    require_once("../dao/projetoDao.php");

    if($_GET['elementoPesquisa'] == ""){
        echo "<h2>Pesquisando por Todos os projetos</h2>";

        echo "
            <script>
                    window.location.href = '../dao/projetoDao.php?op=4';
            </script>
            ";

    }else{
        echo "<h2>Pesquisando por " . $_GET['elementoPesquisa'] ."</h2>";
    }

?>

<!-- CONTEUDO DA PÁGINA AQUI -->

<?php 
     require_once("./containers/footer.php");
?>