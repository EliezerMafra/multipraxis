<?php
     require_once("./containers/header.php");
     require_once("../dao/userDao.php");
     require_once("../controller/dbconfig.php");

     /*var_dump($_POST);
     var_dump(empty($_POST['fname']));
     var_dump(empty($_POST['lname']));
     var_dump(empty($_POST['email']));
     var_dump(empty($_POST['username']));
     var_dump(empty($_POST['password']));
     var_dump(empty($_POST['type']));*/

     if(isset($_POST['add'])){
          $firstName = $_POST['fname'];
          $lastName = $_POST['lname'];
          $email = $_POST['email'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $type = $_POST['type'];

          var_dump($_POST);
          
          $result = insert($conn, $firstName, $lastName, $email, $username, $password, $type);
          
          if($result){
               echo "<script>alert('Registrado com sucesso!!!')</script>";
               echo ("<script>
                    window.location.href='../';
                    </script>");
          }else{
               echo "<script>alert('Erro ao Registrar!!!')</script>";
          }

     }


?>
           <br />  
           <div class="container" style="width:500px;">   
               <h3>Cadastrar</h3><br />  
               <form method="post">
                    <?php
                         $_POST['op'] = "create";
                    ?>
                    <label>Nome</label>  
                    <input type="text" name="fname" class="form-control" />  
                    <br />  
                    <label>Sobrenome</label>  
                    <input type="text" name="lname" class="form-control" />  
                    <br />
                    <label>Email</label>  
                    <input type="email" name="email" class="form-control" />  
                    <br />
                    <label>Tipo [0 para aluno e 1 para professor]</label>  
                    <input type="number" name="type" class="form-control" />  
                    <br />
                    <label>Username</label>  
                    <input type="text" name="username" class="form-control" />  
                    <br />
                    <label>Senha</label>  
                    <input type="password" name="password" class="form-control" />  
                    <br />  
                    <input type="submit" name="add" class="btn btn-info" value="Add" />
                     
                    <a href="../login.php" onclick="history.back();" class="btn btn-default">Back</a>  
               </form>  
          </div>  
          <br/>  
<?php
     require_once("./containers/footer.php");
?> 