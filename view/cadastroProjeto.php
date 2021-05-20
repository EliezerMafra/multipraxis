<?php 
    session_start();
    require_once("./containers/header.php");
?>

<!-- CONTEUDO DA PÁGINA AQUI -->
<form>
    <label>Título</label>
    <br/>
    <input type="text" name="titulo" required/>
    <br/>
    <label>Resumo</label>
    <br/>
    <input type="text" name="resumo" required/>
    <br/>
    <label>Autor</label>
    <br/>
    <input type="text" name="autor" required/>
    <br/>
    <label>Arquivo</label>
    <br/>
    <input type="file" name="arquivo" required/> <!-- ESTUDAR COMO TRABALHAR COM ARQUIVOS EM PHP --> 
    <br/> <!--  https://codewithawa.com/posts/how-to-upload-and-download-files-php-and-mysql -->
    <label>Coautor 1</label>
    <br/>
    <input type="text" name="coautor1" />
    <br/>
    <label>Coautor 2</label>
    <br/>
    <input type="text" name="coautor2" />
    <br/>
    <label>Coautor 3</label>
    <br/>
    <input type="text" name="coautor3" />
    <br/>
    <label>Coautor 4</label>
    <br/>
    <input type="text" name="coautor4" />
    <br/>
    <label>Coautor 5</label>
    <br/>
    <input type="text" name="coautor5" />
    <br/>
    <input type="submit"  class="btn btn-success" value="Cadastrar" />
</form>

<?php 
     require_once("./containers/footer.php");
?>