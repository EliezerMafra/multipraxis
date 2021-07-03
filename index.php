<?php
session_start();
if(isset($_SESSION['username'])){
     echo "<h3 class='text-center'>Bem-vindo " . $_SESSION['username'] . "</h3>";
     
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
     <label class="form-label"> Digite sua Pesquisa </label>
     <br/>
     <input type="text" class="form-label" name="elementoPesquisa" />
     <input type="submit" class="btn btn-success" value="Pesquisar" />
</form>

<br/>
<a href="./view/artigo.php?acesso=professor" class="btn btn-primary">Artigos para Professores</a>
<br/>
<br/>

<a href="./view/artigo.php?acesso=aluno" class="btn btn-primary">Artigos para Alunos</a>
<br/>
<br/>

<a href="./view/noticias.php" class="btn btn-primary">Notícias</a>
<br/>
<br/>

<a href="./view/pilulas.php" class="btn btn-primary">Pilulas do conhecimento</a>
<br/>
<br/>

<a href="./view/perfil.php" class="btn btn-info">Meu perfil</a>
<br/>
<br/>



<br/> 
<a href = 'logout.php' class='btn btn-danger'>Logout</a>

<?php 
     require_once("./view/containers/footer.php")
?>