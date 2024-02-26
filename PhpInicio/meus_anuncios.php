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
        ?>

        <?php include 'processa_meus_anuncios.php'; ?>

        <a href="novo_anuncio.php" class="btn btn-primary">Novo Anúncio</a>
    </div>
</body>

</html>
