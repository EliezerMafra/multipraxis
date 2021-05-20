<?php 
    session_start();
    require_once("./containers/header.php");
    //todo acesso deve conter um elemento pesquisa
    echo $_GET['elementoPesquisa'];
?>

<!-- CONTEUDO DA PÁGINA AQUI -->

<?php 
     require_once("./containers/footer.php");
?>