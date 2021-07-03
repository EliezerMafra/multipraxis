<?php

     function insert($conn, $firstName, $lastName, $email, $username, $password, $type){

          $query = "INSERT INTO users(firstName, lastName, email, username, password, type) values(:fn, :ln,:em, :usr, :pwd, :tp)";
          $stmt = $conn->prepare($query);
          $result =$stmt->execute(
               [ 
               ':fn' => $firstName, 
               ':ln' => $lastName,
               ':em' => $email,
               ':usr' => $username,
               ':pwd' => $password, //AINDA NÃO HÁ CRIPTOGRAFIA PARA AS SENHAS
               ':tp' => $type

               ]
          );

          if(!empty($result)){
               return true;
          }else{
               return false;

          }
          
     }

     function update($conn, $id, $firstName, $lastName, $email, $username, $password){

          $query = "UPDATE users SET firstName=:fn, lastName=:ln, email=:em, username=:usr, password=:psw WHERE id=:id";
          $stmt = $conn->prepare($query);
          $result =$stmt->execute(
               [ 
               ':id' => $id,
               ':fn' => $firstName, 
               ':ln' => $lastName,
               ':em' => $email,
               ':usr' => $username,
               ':psw' => $password
               ]
          );   
          
          if(!empty($result)){
               return true;
          }else{
               return false;

          }

     }

     function remove($conn, $id){
          
          $query = "DELETE FROM users WHERE id=:id";
          $stmt = $conn->prepare($query);
          $result =$stmt->execute(
               [ 
               ':id' => $id
               ]
          );

          if(!empty($result)){
               return true;
          }else{
               return false;

          }
     }

     function read($conn, $id){

          $user = array();
          
          $query = "SELECT * FROM users where id = $id";
          $result = $conn->prepare($query);
          foreach($result as $row){
               array_push($user, array(
                    'id' => $row['id'],
                    'firstName' => $row['firstName'],
                    'lastName' => $row['lastName'],
                    'email' => $row['email'],
                    'username' => $row['username'],
                    'password' => $row['password']
               ));
          }
          
          return $user;
     }
?>
