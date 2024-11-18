<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
    h1{
        text-align: center;
        font-size: 350%;
        font-family: Comic Sans MS, Comic Sans, cursive ;
        color: rgb(255, 255, 255);
    }
    body{
        text-align: center;
        background: radial-gradient(ellipse, #00ff55, #00fca8);
    }
    tbody{
        color: rgb(255, 0, 0);
        background-color: rgb(255, 255, 255);
        text-align: center;

    }
    h2{
        font-family: serif ;
        font-size: 350%;
        color: rgb(255, 255, 255);
    }
    thead{
        background-color: black;
        color: beige;

    }
    table{
        background-color: black;
    }
    input{
        background-color: rgb(255, 255, 255);
        width: 200px;
        height: 20px;
    }
    button{
        background-color: rgb(130, 63, 255);
    }
  </style>
  <body>
    <h1>Livraria</h1>
    <form action="add_book.php" method="POST">
      <input type="text" name="titulo" placeholder="Título" required>
      <input type="text" name="autor" placeholder="Autor" required>
      <input type="number" name="ano" placeholder="Ano de Publicação" required>
      <button type="submit">Adicionar Livro</button>
    </form>

    <h2>Livros adicionados</h2>
    <table border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Ano de Publicação</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require 'database.php';

          $stmt = $pdo->prepare("SELECT * FROM livros");
          $stmt->execute();
          $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($livros as $livro) {
            echo "<tr>";
            echo "<td>" . $livro['id'] . "</td>";
            echo "<td>" . $livro['titulo'] . "</td>";
            echo "<td>" . $livro['autor'] . "</td>";
            echo "<td>" . $livro['ano'] . "</td>";
            echo "<td>
                    <form action='delete_book.php' method='POST'>
                      <input type='hidden' name='id' value='" . $livro['id'] . "'>
                      <button type='submit'>Excuir</button>
                    </form>
                  </td>";  
            echo "</tr>";  
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
