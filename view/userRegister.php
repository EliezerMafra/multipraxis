<?php
     require_once("./containers/header.php");
?>
           <br />  
           <div class="container" style="width:500px;">   
               <h3>Cadastrar</h3><br />  
               <form method="post" action="../controller/userController.php">
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
                    <label>Username</label>  
                    <input type="text" name="username" class="form-control" />  
                    <br />
                    <label>Senha</label>  
                    <input type="password" name="password" class="form-control" />  
                    <br />  
                    <input type="submit" name="add" class="btn btn-info" value="Add" />
                     
                    <a href="login.php" onclick="history.back();" class="btn btn-default">Back</a>  
               </form>  
          </div>  
          <br/>  
<?php
     require_once("./containers/footer.php");
?> 