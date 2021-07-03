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
                    session_start();

                    $query = "SELECT * FROM users where username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
                    //echo $query;

                    $result = $conn->query($query);
                    //var_dump($result);

                    foreach($result as $row){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['fullName'] = $row['firstName']." ".$row['lastName'];
                    }
                    
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