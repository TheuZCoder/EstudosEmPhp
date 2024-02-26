<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Meus Anúncios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Meus Anúncios</h1>

        <?php
        session_start();

        if (!isset($_SESSION['email'])) {
            header("Location: index.php?msgErro=Você não está logado.");
            exit();
        }

        require_once 'conectaBD.php';

        include 'processa_meus_anuncios.php';

        // Restante do código para exibir anúncios
        try {
            $sql = "SELECT * FROM anuncios WHERE usuario_email = :usuario_email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':usuario_email', $_SESSION['email']);
            $stmt->execute();
            $anuncios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Título</th>';
                echo '<th>Descrição</th>';
                echo '<th>Preço</th>';
                echo '<th>Ações</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($anuncios as $anuncio) {
                    echo '<tr>';
                    echo '<td>' . $anuncio['titulo'] . '</td>';
                    echo '<td>' . $anuncio['descricao'] . '</td>';
                    echo '<td>R$ ' . number_format($anuncio['preco'], 2, ',', '.') . '</td>';
                    echo '<td>';
                    echo '<form method="post" style="display:inline-block;">';
                    echo '<input type="hidden" name="anuncioID" value="' . $anuncio['id'] . '">';
                    echo '<button type="submit" name="excluirAnuncio" class="btn btn-danger btn-sm">Excluir</button>';
                    echo '</form>';
                    echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarAnuncioModal' . $anuncio['id'] . '">Editar</button>';
                    echo '</td>';
                    echo '</tr>';

                    // Restante do código ...


                    // Modal para editar anúncio
                    echo '<div class="modal fade" id="editarAnuncioModal' . $anuncio['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                    echo '<div class="modal-dialog" role="document">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="exampleModalLabel">Editar Anúncio</h5>';
                    echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="anuncioID" value="' . $anuncio['id'] . '">';
                    echo '<div class="form-group">';
                    echo '<label for="novoTitulo' . $anuncio['id'] . '">Novo Título</label>';
                    echo '<input type="text" name="novoTitulo" id="novoTitulo' . $anuncio['id'] . '" class="form-control" value="' . $anuncio['titulo'] . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="novaDescricao' . $anuncio['id'] . '">Nova Descrição</label>';
                    echo '<textarea name="novaDescricao" id="novaDescricao' . $anuncio['id'] . '" class="form-control">' . $anuncio['descricao'] . '</textarea>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="novoPreco' . $anuncio['id'] . '">Novo Preço</label>';
                    echo '<input type="text" name="novoPreco" id="novoPreco' . $anuncio['id'] . '" class="form-control" value="' . $anuncio['preco'] . '">';
                    echo '</div>';
                    echo '<button type="submit" name="editarAnuncio" class="btn btn-warning">Salvar Edições</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Você ainda não possui anúncios cadastrados.</p>';
            }
        } catch (PDOException $e) {
            echo '<p>Erro ao recuperar anúncios.</p>';
        }
        ?>

        <a href="novo_anuncio.php" class="btn btn-primary">Novo Anúncio</a>
        <a href="#" onclick="history.back();" class="btn btn-secondary">Voltar</a>
    </div>

    <!-- Bootstrap JS and jQuery (Make sure you include them) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+WiNGD5tkI4Z/CpLEGF+8N2k02AWIj" crossorigin="anonymous"></script>
</body>

</html>