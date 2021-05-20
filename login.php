<!DOCTYPE html>  
 <html>  
      <head>  
           <title> Login</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3>Login Page</h3><br />  
                <form action="loginVerification.php" method="post">  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" required/>  
                     <br/>  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" required/>  
                     <br/>  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />
                     <a href = 'register.php' class="btn btn-success">Register</a>                     
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  