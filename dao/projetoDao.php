<?php
     require_once('dbconfig.php');  
     
     $op = $_POST['op'];

     switch($op){
          case 0:
               insert($conn, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['type']);
               break;
          case 1:
               update($conn, $_POST['id'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['username'], $_POST['password']);
               break;
          case 2:
               //read
               break;
          case 3:
               remove($conn, $_POST['id']);
               break;
     }

     function insert($conn, $titulo, $resumo, $autor, $coautor1, $coautor2, $coautor3, $coautor4, $coautor5, $documento){

          $query = "INSERT INTO projetos(titulo, resumo, autor, coautor1, coautor2, coautor3, coautor4, coautor5, documento) values(:t, :r, :a, :c1, :c2, :c3, :c4, :c5, :d)";
          $stmt = $conn->prepare($query);
          $result =$stmt->execute(
               [ 
               ':t' => $titulo, 
               ':r' => $resumo,
               ':a' => $autor,
               ':c1' => $coautor1,
               ':c2' => $coautor2,
               ':c3' => $coautor3,
               ':c4' => $coautor4,
               ':c5' => $coautor5,
               ':d' => $documento

               ]
          );

          if(!empty($result)){
               return true;
          }else{
               return false;

          }
          
     }

     function update($conn, $id, $titulo, $resumo, $autor, $coautor1, $coautor2, $coautor3, $coautor4, $coautor5, $documento){

          $query = "UPDATE projetos SET titulo=:t, resumo=:r, autor=:a, coautor1=:c1, coautor2=:c2, coautor3=:c3, coautor4=:c4, coautor5=:c5 WHERE id=:id";
          $stmt = $conn->prepare($query);
          $result =$stmt->execute(
               [ 
               ':id' => $id,
               ':t' => $titulo, 
               ':r' => $resumo,
               ':a' => $autor,
               ':c1' => $coautor1,
               ':c2' => $coautor2,
               ':c3' => $coautor3,
               ':c4' => $coautor4,
               ':c5' => $coautor5,
               ':d' => $documento
               ]
          );   
          
          if(!empty($result)){
               return true;
          }else{
               return false;

          }

     }

     function remove($conn, $id){
          
          $query = "DELETE FROM projetos WHERE id=:id";
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

          $projeto = array();
          
          $query = "SELECT * FROM projetos WHERE id = $id";
          $result = $conn->prepare($query);
          foreach($result as $row){
               array_push($projeto, array(
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'resumo' => $row['resumo'],
                    'autor' => $row['autor'],
                    'coautor1' => $row['coautor1'],
                    'coautor2' => $row['coautor2'],
                    'coautor3' => $row['coautor3'],
                    'coautor4' => $row['coautor4'],
                    'coautor5' => $row['coautor5'],
                    'documento' => $row['documento']
                    
               ));
          }
          
          return $projeto;
     }
?>
