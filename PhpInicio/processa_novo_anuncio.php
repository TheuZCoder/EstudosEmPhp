<?php
require_once 'conectaBD.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php?msgErro=Você não está logado.");
    exit();
}

if (isset($_POST['enviarAnuncio'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $usuario_email = $_SESSION['email'];

    try {
        $sql = "INSERT INTO anuncios (titulo, descricao, preco, usuario_email) VALUES (:titulo, :descricao, :preco, :usuario_email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':usuario_email', $usuario_email);
        $stmt->execute();

        header("Location: meus_anuncios.php?msgSucesso=Anúncio cadastrado com sucesso.");
        exit();
    } catch (PDOException $e) {
        header("Location: novo_anuncio.php?msgErro=Erro ao cadastrar o anúncio.");
        exit();
    }
} else {
    header("Location: novo_anuncio.php");
    exit();
}
?>
