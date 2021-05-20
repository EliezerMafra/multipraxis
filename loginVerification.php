<?php
    require_once('./controller/dbconfig.php');   
          if(isset($_POST["login"])){  
                $query = "SELECT * FROM users where username = :username AND password = :password";
                $stmt = $conn->prepare($query);
                $stmt->execute(
                    [
                    'username' => $_POST['username'], 
                    'password' => $_POST['password']
                    ]
                );
                $count = $stmt->rowCount();
                if($count > 0){
                    $_SESSION['username'] = $_POST['username'];
					$_SESSION['password'] = $_POST['password'];
                    header('location: index.php');
                }else{
                    echo "
                    <script>
                        alert('Username ou senha incorretos!!!');
                        window.location.href = 'login.php';
                    </script>
                    ";
                }
            }else{
                echo "
                <script>
                    alert('Erro ao logar, tente novamente!!!');
                </script>
                ";
            }
?>