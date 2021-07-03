<?php 
    session_start();
    require_once("./containers/header.php");
    require_once('../controller/dbconfig.php'); 
    require_once("../dao/projetoDao.php");

    if(isset($_POST['cadastroSubmit'])){
        //$fileName = $_FILES['documento']['name'];

        $fileName = $_POST['titulo'].$_POST['autor'].".".pathinfo($_FILES['documento']['name'], PATHINFO_EXTENSION);

        $destination = '../uploads/'.$fileName;

        $file = $_FILES['documento']['tmp_name'];

        if(move_uploaded_file($file, $destination)){

            if(insert($conn, $_POST['titulo'], $_POST['resumo'], $_POST['autor'], $_POST['palavras'], $_POST['coautor1'], $_POST['coautor2'], $_POST['coautor3'], $_POST['coautor4'], $_POST['coautor5'], $fileName)){
                echo "
                    <script>
                            alert('Enviado com Sucesso!!!');
                            window.location.href = './perfil.php';
                    </script>
                    ";
            }else{
                echo "
                    <script>
                            alert('Erro ao enviar!!!');
                            window.location.href = './cadastroProjeto.php';
                    </script>
                    ";
            }
        }

    }

?>

<!-- CONTEUDO DA PÁGINA AQUI -->
<form method="POST" enctype="multipart/form-data">
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
    <input type="text" name="autor" value="<?php echo $_SESSION['fullName'] ?>" readonly required/>
    <br/>
    <label>Palavras Chave</label>
    <br/>
    <input type="text" name="palavras" required/>
    <br/>
    <label>Arquivo</label>
    <br/>
    <input type="file" name="documento" required/> <!-- ESTUDAR COMO TRABALHAR COM ARQUIVOS EM PHP --> 
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
    <br/>
    <input type="submit"  name="cadastroSubmit" class="btn btn-success" value="Cadastrar" />
</form>

<br/>
<a href="./perfil.php" class="btn btn-secondary">Voltar</a>
<br/>
<br/>

<?php 
     require_once("./containers/footer.php");
?>