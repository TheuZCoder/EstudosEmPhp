<?php
require_once 'conectaBD.php';

if (!isset($_SESSION['email'])) {
    header("Location: index.php?msgErro=Você não está logado.");
    exit();
}

$usuario_email = $_SESSION['email'];

try {
    $sql = "SELECT * FROM anuncios WHERE usuario_email = :usuario_email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario_email', $usuario_email);
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
            // Adicione links para editar ou excluir, se necessário
            // echo '<a href="editar_anuncio.php?id=' . $anuncio['ID'] . '">Editar</a> | ';
            // echo '<a href="excluir_anuncio.php?id=' . $anuncio['ID'] . '">Excluir</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Você ainda não possui anúncios cadastrados.</p>';
    }
} catch (PDOException $e) {
    echo '<p>Erro ao recuperar anúncios.</p>';
}
