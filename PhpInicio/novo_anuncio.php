<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Novo Anúncio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Novo Anúncio</h1>
        <form action="processa_novo_anuncio.php" method="post">
            <div class="col-4">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div>
            <div class="col-4">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control"></textarea>
            </div>
            <div class="col-4">
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" class="form-control">
            </div>
            <br>
            <button type="submit" name="enviarAnuncio" class="btn btn-primary">Cadastrar Anúncio</button>
            <a href="#" onclick="history.back();" class="btn btn-secondary">Voltar</a>
            <a href="meus_anuncios.php" class="btn btn-secondary">Ver Meus Anúncios</a>
        </form>
    </div>
</body>

</html>
