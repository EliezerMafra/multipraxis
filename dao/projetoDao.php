<?php
     //--------------------------------------------------------------------

     function insert($conn, $titulo, $resumo, $autor, $palavras, $coautor1, $coautor2, $coautor3, $coautor4, $coautor5, $documento){

          $query = "INSERT INTO projetos(titulo, resumo, autor, palavrasChave, coautor1, coautor2, coautor3, coautor4, coautor5, documento) values(:t, :r, :a, :pc, :c1, :c2, :c3, :c4, :c5, :d)";
          $stmt = $conn->prepare($query);
          $result =$stmt->execute(
               [ 
               ':t' => $titulo, 
               ':r' => $resumo,
               ':a' => $autor,
               ':pc' => $palavras,
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

     function update($conn, $id, $titulo, $resumo, $autor, $palavras, $coautor1, $coautor2, $coautor3, $coautor4, $coautor5, $documento){

          $query = "UPDATE projetos SET titulo=:t, resumo=:r, autor=:a, palavrasChave=:pc, coautor1=:c1, coautor2=:c2, coautor3=:c3, coautor4=:c4, coautor5=:c5, documento=:d WHERE id=:id";
          $stmt = $conn->prepare($query);
          $result = $stmt->execute(
               [ 
                    ':t' => $titulo, 
                    ':r' => $resumo,
                    ':a' => $autor,
                    ':pc' => $palavras,
                    ':c1' => $coautor1,
                    ':c2' => $coautor2,
                    ':c3' => $coautor3,
                    ':c4' => $coautor4,
                    ':c5' => $coautor5,
                    ':d' => $documento,
                    ':id' => $id
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

     function findById($conn, $id){

          $projeto = array();
          
          $query = "SELECT * FROM projetos WHERE id = $id";
          $result = $conn->query($query);

          foreach($result as $row){
               $projeto = array(
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'resumo' => $row['resumo'],
                    'autor' => $row['autor'],
                    'palavras' => $row['palavraschave'],
                    'coautor1' => $row['coautor1'],
                    'coautor2' => $row['coautor2'],
                    'coautor3' => $row['coautor3'],
                    'coautor4' => $row['coautor4'],
                    'coautor5' => $row['coautor5'],
                    'documento' => $row['documento']
                    );
          }
          
          return $projeto;
     }     
     
     
     function findAllByAutor($conn, $autor){

          $projetos = array();
          
          $query = "SELECT * FROM projetos WHERE autor = '$autor'";
          $result = $conn->query($query);


          foreach($result as $row){
               array_push($projetos, array(
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'resumo' => $row['resumo'],
                    'autor' => $row['autor'],
                    'palavras' => $row['palavraschave'],
                    'coautor1' => $row['coautor1'],
                    'coautor2' => $row['coautor2'],
                    'coautor3' => $row['coautor3'],
                    'coautor4' => $row['coautor4'],
                    'coautor5' => $row['coautor5'],
                    'documento' => $row['documento']
                    
               ));
          }

          return $projetos;
     } 

     function search($conn, $element){

          $projetos = array();
          
          $query = "SELECT * FROM projetos WHERE (palavraschave LIKE '%$element%') OR (resumo LIKE '%$element%') OR (titulo LIKE '%$element%') OR (autor LIKE '%$element%')";
          $result = $conn->query($query);


          foreach($result as $row){
               array_push($projetos, array(
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'resumo' => $row['resumo'],
                    'autor' => $row['autor'],
                    'palavras' => $row['palavraschave'],
                    'coautor1' => $row['coautor1'],
                    'coautor2' => $row['coautor2'],
                    'coautor3' => $row['coautor3'],
                    'coautor4' => $row['coautor4'],
                    'coautor5' => $row['coautor5'],
                    'documento' => $row['documento']
                    
               ));
          }

          return $projetos;
     }

     function listAll($conn){

          $projetos = array();
          
          $query = "SELECT * FROM projetos";
          $result = $conn->query($query);

          foreach($result as $row){
               array_push($projetos, array(
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'resumo' => $row['resumo'],
                    'autor' => $row['autor'],
                    'palavras' => $row['palavraschave'],
                    'coautor1' => $row['coautor1'],
                    'coautor2' => $row['coautor2'],
                    'coautor3' => $row['coautor3'],
                    'coautor4' => $row['coautor4'],
                    'coautor5' => $row['coautor5'],
                    'documento' => $row['documento']
                    
               ));
          }

          return $projetos;
     }


?>
