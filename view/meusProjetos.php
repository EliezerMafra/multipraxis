<?php 
    session_start();
    require_once("./containers/header.php");
    require_once('../controller/dbconfig.php'); 
    require_once("../dao/projetoDao.php");?>

<a href="../index.php" class="btn btn-secondary">Home</a>
<br/>
<br/>

<?php

    echo "<h2>Meus Projetos</h2>";

    //var_dump($_POST);
        
    $element = $_SESSION['fullName'];

    $projetos = findAllByAutor($conn, $element);

    if(isset($_POST['deletar'])){

        $proj = array();

        $proj = findById($conn, $_POST['id']);

        $filepath = "../uploads/". $proj['documento'];

        if(remove($conn, $_POST['id'])){
            unset($_POST['deletar']);

            unlink($filepath);

            echo "
                    <script>
                        alert('Excluido com Sucesso !!!');
                    </script>
                    ";

            $page = $_SERVER['PHP_SELF'];
            $sec = "0";
            header("Refresh: $sec; url=$page"); 
        }else{
            echo "
            <script>
                alert('Erro ao excluir !!!');
                window.location.reload();
            </script>
            ";
        }
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
                <th>Editar</th>
                <th>Excluir</th>
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

                    echo    "<td>"
                                .
                                    "<form method='POST'  action='alteraProjeto.php'>
                                        <input name='id' value='" . $proj['id'] . "' type='hidden' />
                                        <input type='submit' value='Editar' name='alterar' class='glyphicon glyphicon-pencil btn btn-warning'/> 
                                    </form>"
                                .
                            "</td>";

                    echo    "<td>"
                                .
                                    "<form method='POST'>
                                        <input name='id' value='" . $proj['id'] . "' type='hidden' />
                                        <input type='submit' value='Excluir' name='deletar' class='glyphicon glyphicon-trash btn btn-danger'/> 
                                    </form>"
                                .
                            "</td>";
                    echo "</tr>";
                }

                ?>
        </tbody>
    </table>

<a href="./perfil.php" class="btn btn-secondary">Voltar</a>
<br/>
<br/>

<?php 
     require_once("./containers/footer.php");
?>