<?php 
    session_start();
    require_once("./containers/header.php");
?>

<!-- CONTEUDO DA PÁGINA AQUI -->
<?php
    echo $_GET["acesso"];
    //contem se sera artigo para professor ou para aluno
?>

<form action="../Index.php" method="get">
     <input type="submit" value="Home" />
</form>


<?php 
     require_once("./containers/footer.php");
?>