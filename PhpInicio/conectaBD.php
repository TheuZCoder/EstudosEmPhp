<?php
// endereco
// nome do BD
// adm
// senha
$endereco = 'localhost';
$banco = 'matheus';
$adm = 'postgres';
$senha = 'postgres';
try {
    // sgbd:host;port;dbname
    // adm
    // senha
    // errmode
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $adm,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Conectado no banco de dados!!!";
    
    $sql_anuncios = "CREATE TABLE IF NOT EXISTS
    anuncios (
    ID SERIAL,
    titulo VARCHAR(255),
    descricao TEXT,
    preco DECIMAL(10,2),
    usuario_email VARCHAR(255),
    FOREIGN KEY (usuario_email) REFERENCES usuario(email))";
    $stmt_anuncios = $pdo->prepare($sql_anuncios);
    $stmt_anuncios->execute();

    $sql = "CREATE TABLE IF NOT EXISTS
    usuario (ID SERIAL,
    nome VARCHAR(255),
    DATA_NASCIMENTO VARCHAR(255),
    TELEFONE VARCHAR(255),
    EMAIL VARCHAR(255) PRIMARY KEY,
    SENHA VARCHAR(255))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
