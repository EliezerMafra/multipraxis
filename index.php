<?php
session_start();
if(isset($_SESSION['username'])){
     echo "<h3 class='text-center'>Welcome - " . $_SESSION['username'] . "</h3>";
     
}
else{
     header('location: login.php');
}

?>
<?php 
     require_once("./view/containers/header.php")
     ?>

<!-- CONTEUDO DA PÁGINA AQUI -->
<form action="./view/pesquisa.php" method="get">
     <label> Digite sua Pesquisa </label>
     <br/>
     <input type="text" name="elementoPesquisa" />
     <input type="submit" value="Pesquisar" />
</form>

<br/>

<form action="./view/artigo.php" method="get">
     <input type="hidden" name="acesso" value="professor"/>
     <input type="submit" value="Artigos para Professores" />
</form>

<form action="./view/artigo.php" method="get">
     <input type="hidden" name="acesso" value="aluno"/>
     <input type="submit" value="Artigos para Alunos" />
</form>

<form action="./view/noticias.php" method="get">
     <input type="submit" value="Notícias" />
</form>

<form action="./view/pilulas.php" method="get">
     <input type="submit" value="Pilulas do conhecimento" />
</form>

<form action="./view/perfil.php" method="get">
     <input type="submit" value="Meu perfil" />
</form>



<br/> 
<a href = 'logout.php' class='btn btn-danger'>Logout</a>

<?php 
     require_once("./view/containers/footer.php")
?>