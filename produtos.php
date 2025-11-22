<?php
include 'conexao.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica código de barras duplicado
    $stmt = $pdo->prepare("SELECT id FROM produtos WHERE codigo_barras = ?");
    $stmt->execute([$data["codigo_barras"]]);

    if ($stmt->rowCount() > 0) {
        http_response_code(409);
        echo json_encode(["erro" => "Produto com este código de barras já está cadastrado!"]);
        exit;
    }

    // Insere
    $sql = "INSERT INTO produtos (nome, codigo_barras, descricao, quantidade, categoria, validade)
            VALUES (?, ?, ?, ?, ?, ?)";
            
    $pdo->prepare($sql)->execute([
        $data["nome"],
        $data["codigo_barras"],
        $data["descricao"],
        $data["quantidade"],
        $data["categoria"],
        $data["validade"]
    ]);

    http_response_code(201);
    echo json_encode(["mensagem" => "Produto cadastrado com sucesso!"]);
}
?>
