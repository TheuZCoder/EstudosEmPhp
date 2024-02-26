<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Meus Anúncios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Meus Anúncios</h1>
        <!-- Aqui você pode listar os anúncios do usuário a partir do banco de dados -->
        <!-- Utilize uma consulta SQL SELECT para obter os anúncios relacionados ao usuário logado -->
        <!-- Exibir os anúncios em uma tabela ou outro formato desejado -->
        <!-- Você pode adicionar um link para editar ou excluir cada anúncio, se necessário -->
        <!-- Exemplo: -->
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Substitua este trecho com a lógica para exibir os anúncios -->
                <tr>
                    <td>Exemplo de Anúncio</td>
                    <td>Descrição do Anúncio</td>
                    <td>R$ 100,00</td>
                    <td>
                        <a href="editar_anuncio.php">Editar</a> |
                        <a href="excluir_anuncio.php">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="novo_anuncio.php" class="btn btn-primary">Novo Anúncio</a>
    </div>
</body>

</html>
