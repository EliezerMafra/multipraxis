<?php
    require_once("../dao/userDao.php");
    require_once("./dbconfig.php");

    if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['username']) ||
       empty($_POST['password']) || empty($_POST['type'])){  

        echo "<script>alert('All fields are required')</script>";  

    }else{
        
        $operation = $_POST['op'];

        switch($operation){
            case "create":
                $firstName = $_POST['fname'];
                $lastName = $_POST['lname'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $type = $_POST['type'];
                
                $result = insert($conn, $firstName, $lastName, $email, $username, $password, $type);
                
                if($result){
                    echo "<script>alert('Registrado com sucesso!!!')</script>";
                }else{
                    echo "<script>alert('Erro ao Registrar!!!')</script>";
                }
                break;
            case "remove":
                $id = $_POST['id'];

                $result = remove($conn, $id);

                if($result){
                    echo "<script>alert('Registrado com sucesso!!!')</script>";
                }else{
                    echo "<script>alert('Erro ao Registrar!!!')</script>";
                }
            default:
                echo "<script>alert('Erro na operacao!!!')</script>";
        }
        
    }

?>