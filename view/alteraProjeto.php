<?php 
    session_start();
    require_once("./containers/header.php");
    require_once('../controller/dbconfig.php'); 
    require_once("../dao/projetoDao.php");

    $id = $_POST['id'];

    $proj = findById($conn, $id);

    if(isset($_POST['alteraSubmit'])){
        
        //não add arquivo
        if($_FILES['documento']['error'] == 4){
            $oldName = $proj['documento'];

            $newName = $_POST['titulo'].$_POST['autor'].".pdf";

            $oldPath = "../uploads/".$oldName;
            $newPath = "../uploads/".$newName;

            rename($oldPath, $newPath);

            if(update($conn, $_POST['id'], $_POST['titulo'], $_POST['resumo'], $_POST['autor'], $_POST['palavras'], $_POST['coautor1'], $_POST['coautor2'], $_POST['coautor3'], $_POST['coautor4'], $_POST['coautor5'], $newName)){
                echo "
                    <script>
                            alert('Atualizado com Sucesso!!!');
                            window.location.href = './meusProjetos.php';
                    </script>
                    ";
            }else{
                echo "
                    <script>
                            alert('Erro ao atualizar!!!');
                            </script>
                            ";
            }
        }else{
            unlink("../uploads/".$proj['documento']);

            $fileName = $_POST['titulo'].$_POST['autor'].".".pathinfo($_FILES['documento']['name'], PATHINFO_EXTENSION);

            $destination = '../uploads/'.$fileName;
    
            $file = $_FILES['documento']['tmp_name'];

            if(move_uploaded_file($file, $destination)){
    
                if(update($conn, $_POST['id'], $_POST['titulo'], $_POST['resumo'], $_POST['autor'], $_POST['palavras'], $_POST['coautor1'], $_POST['coautor2'], $_POST['coautor3'], $_POST['coautor4'], $_POST['coautor5'], $fileName)){
                    echo "
                        <script>
                                alert('Atualizado com Sucesso!!!');
                                window.location.href = './meusProjetos.php';
                        </script>
                        ";
                }else{
                    echo "
                        <script>
                                alert('Erro ao atualizar! (Banco de Dados)!!');
                                window.location.href = './meusProjetos.php';
                                </script>
                                ";
                }
                  
            }else{
                echo "
                    <script>
                            alert('Erro ao atualizar!!! (Salvar arquivo)');
                            window.location.href = './meusProjetos.php';
                            </script>
                            ";
            }
        }
    }

?>

<!-- CONTEUDO DA PÁGINA AQUI -->
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $proj['id'];?>" required/>
    <label>Título</label>
    <br/>
    <input type="text" name="titulo" value="<?php echo $proj['titulo'];?>" required/>
    <br/>
    <label>Resumo</label>
    <br/>
    <input type="text" name="resumo" value="<?php echo $proj['resumo'];?>" required/>
    <br/>
    <label>Autor</label>
    <br/>
    <input type="text" name="autor" value="<?php echo $_SESSION['fullName']; ?>" readonly required/>
    <br/>
    <label>Palavras Chave</label>
    <br/>
    <input type="text" name="palavras" value="<?php echo $proj['palavras'];?>" required/>
    <br/>
    <label>Arquivo [se o campo permanecer vazio, o arquivo permanecerá o mesmo]</label>
    <br/>
    <input type="file" name="documento"/>
    <br/>
    <label>Coautor 1</label>
    <br/>
    <input type="text" value="<?php echo $proj['coautor1'];?>" name="coautor1" />
    <br/>
    <label>Coautor 2</label>
    <br/>
    <input type="text" value="<?php echo $proj['coautor2'];?>" name="coautor2" />
    <br/>
    <label>Coautor 3</label>
    <br/>
    <input type="text" value="<?php echo $proj['coautor3'];?>" name="coautor3" />
    <br/>
    <label>Coautor 4</label>
    <br/>
    <input type="text" value="<?php echo $proj['coautor4'];?>" name="coautor4" />
    <br/>
    <label>Coautor 5</label>
    <br/>
    <input type="text" value="<?php echo $proj['coautor5'];?>" name="coautor5" />
    <br/>
    <br/>
    <input type="submit"  name="alteraSubmit" class="btn btn-warning" value="Alterar" />
</form>

<br/>
<a href="./meusProjetos.php" class="btn btn-secondary">Voltar</a>
<br/>
<br/>

<?php 
     require_once("./containers/footer.php");
?>