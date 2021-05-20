<?php 
    session_start();
    require_once("./containers/header.php");
?>

<!-- CONTEUDO DA PÁGINA AQUI -->
<form action="./pesquisa.php" method="get">
    <input type="hidden" name="elementoPesquisa" value="<?php echo $_SESSION['username'] ?>"/>
    <input type="submit" value="Meus Projetos" />
</form>

<form action="./cadastroProjeto.php" method="get">
     <input type="submit" value="Cadastrar Projeto" />
</form>


<?php 
     require_once("./containers/footer.php");
?>