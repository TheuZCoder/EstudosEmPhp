<?php
// Função para excluir anúncio
function excluirAnuncio($pdo, $anuncioID)
{
    try {
        $sql = "DELETE FROM anuncios WHERE id = :anuncioID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':anuncioID', $anuncioID);
        $stmt->execute();
    } catch (PDOException $e) {
        echo '<p>Erro ao excluir o anúncio.</p>';
    }
}

// Função para editar anúncio
function editarAnuncio($pdo, $anuncioID, $novoTitulo, $novaDescricao, $novoPreco)
{
    try {
        $sql = "UPDATE anuncios SET titulo = :titulo, descricao = :descricao, preco = :preco WHERE id = :anuncioID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $novoTitulo);
        $stmt->bindParam(':descricao', $novaDescricao);
        $stmt->bindParam(':preco', $novoPreco);
        $stmt->bindParam(':anuncioID', $anuncioID);
        $stmt->execute();
    } catch (PDOException $e) {
        echo '<p>Erro ao editar o anúncio.</p>';
    }
}

// Verificar se o botão de exclusão foi acionado
if (isset($_POST['excluirAnuncio']) && isset($_POST['anuncioID'])) {
    $anuncioID = $_POST['anuncioID'];
    excluirAnuncio($pdo, $anuncioID);
}

// Verificar se o botão de edição foi acionado
if (isset($_POST['editarAnuncio']) && isset($_POST['anuncioID']) && isset($_POST['novoTitulo']) && isset($_POST['novaDescricao']) && isset($_POST['novoPreco'])) {
    $anuncioID = $_POST['anuncioID'];
    $novoTitulo = $_POST['novoTitulo'];
    $novaDescricao = $_POST['novaDescricao'];
    $novoPreco = $_POST['novoPreco'];
    editarAnuncio($pdo, $anuncioID, $novoTitulo, $novaDescricao, $novoPreco);
}
?>
