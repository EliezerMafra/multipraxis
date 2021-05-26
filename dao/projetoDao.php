<?php
     require_once('../controller/dbconfig.php'); 

     
     //Se seguir MVC esse trecho fica em um arquivo controller--------------------
     $op = $_GET['op'];

     switch($op){
          case 0:
               //WORKING
               //INSERT
               $fileName = $_FILES['documento']['name'];

               $destination = '../uploads/'.$fileName;

               $file = $_FILES['documento']['tmp_name'];

               if(move_uploaded_file($file, $destination)){
                    if(insert($conn, $_POST['titulo'], $_POST['resumo'], $_POST['autor'], $_POST['palavras'], $_POST['coautor1'], $_POST['coautor2'], $_POST['coautor3'], $_POST['coautor4'], $_POST['coautor5'], $fileName)){
                         echo "
                              <script>
                                   alert('Enviado com Sucesso!!!');
                                   window.location.href = '../view/perfil.php';
                              </script>
                              ";
                    }else{
                         echo "
                              <script>
                                   alert('Erro ao enviar!!!');
                                   window.location.href = '../view/cadastroProjeto.php';
                              </script>
                              ";
                    }
               }


               break;
          case 1:
               //UPDATE
               //update($conn, $_POST['id'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['username'], $_POST['password']);
               break;
          case 2:
               //READ
               break;
          case 3:
               //DELETE
               $pAux = read($conn, $_POST['id']);
               $fileName = $pAux['documento'];

               if(remove($conn, $_POST['id'])){
                    unlink('../uploads/'.$fileName);
                    echo "
                    <script>
                         alert('Excluído com Sucesso!!!');
                         window.location.href = '../index.php';
                    </script>
                    ";

               }else{
                    echo "
                    <script>
                         alert('Erro ao excluir!!!');
                    </script>
                    ";
               }
               break;
          case 4:
               //LIST ALL
               $projetos =  listAll($conn);
               echo "
               <table class='table table-striped'>
                    <thead>
                    <tr>
                         <th>ID</th>
                         <th>Titulo</th>
                         <th>Resumo</th>
                         <th>Autor</th>
                         <th>Palavras</th>
                         <th>Coautor1</th>
                         <th>Coautor2</th>
                         <th>Coautor3</th>
                         <th>Coautor4</th>
                         <th>Coautor5</th>
                         <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
               ";
               var_dump($projetos);
               foreach($projetos as $row){
                    echo "<tr>";
                             echo "<td>" . $row['id'] . "</td>";
                             echo "<td>" . $row['titulo'] . "</td>";
                             echo "<td>" . $row['resumo'] . "</td>";
                             echo "<td>" . $row['autor'] . "</td>";
                             echo "<td>" . $row['palavras'] . "</td>";
                             echo "<td>" . $row['coautor1'] . "</td>";
                             echo "<td>" . $row['coautor2'] . "</td>";
                             echo "<td>" . $row['coautor3'] . "</td>";
                             echo "<td>" . $row['coautor4'] . "</td>";
                             echo "<td>" . $row['coautor5'] . "</td>";
                             //botão download
                             //echo "<td>" . $row['titulo'] . "</td>";
                             
                             echo "<td>" . 
                                        "<form method='post'>" .
                                             "<input type=hidden value=".$row['id']." name='id'/>".
                                             "<input type=hidden value='3' name='op'/>".
                                             "<input type=submit value='Excluir' name='btnDel' class='glyphicon glyphicon-trash btn btn-danger'/>".
                                        "</form>";
                                        
                                   "</td>";
                    echo "</tr>";
               }
               echo "
                    </tbody>
               </table>
               ";

     }
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

          $query = "UPDATE projetos SET titulo=:t, resumo=:r, autor=:a, palavrasChave=:pc  coautor1=:c1, coautor2=:c2, coautor3=:c3, coautor4=:c4, coautor5=:c5 WHERE id=:id";
          $stmt = $conn->prepare($query);
          $result =$stmt->execute(
               [ 
               ':id' => $id,
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
                    'palavras' => $row['palavrasChave'],
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

     function listAll($conn){

          $projetos = array();
          
          $query = "SELECT * FROM projetos";
          $result = $conn->prepare($query);
          foreach($result as $row){
               array_push($projetos, array(
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'resumo' => $row['resumo'],
                    'autor' => $row['autor'],
                    'palavras' => $row['palavrasChave'],
                    'coautor1' => $row['coautor1'],
                    'coautor2' => $row['coautor2'],
                    'coautor3' => $row['coautor3'],
                    'coautor4' => $row['coautor4'],
                    'coautor5' => $row['coautor5'],
                    'documento' => $row['documento']
                    
               ));
          }
          var_dump($projetos);
          return $projetos;
     }


?>
