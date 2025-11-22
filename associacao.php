<?php
include 'conexao.php';

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica se já existe
    $check = $pdo->prepare("SELECT id FROM produto_fornecedor WHERE produto_id = ? AND fornecedor_id = ?");
    $check->execute([$data["produto_id"], $data["fornecedor_id"]]);

    if ($check->rowCount() > 0) {
        http_response_code(409);
        echo json_encode(["erro" => "Fornecedor já está associado a este produto!"]);
        exit;
    }

    $query = $pdo->prepare("INSERT INTO produto_fornecedor (produto_id, fornecedor_id) VALUES (?, ?)");
    $query->execute([$data["produto_id"], $data["fornecedor_id"]]);

    http_response_code(201);
    echo json_encode(["mensagem" => "Fornecedor associado com sucesso ao produto!"]);
}

if ($method === "DELETE") {
    $produto = $_GET["produto_id"];
    $fornecedor = $_GET["fornecedor_id"];

    $stmt = $pdo->prepare("DELETE FROM produto_fornecedor WHERE produto_id = ? AND fornecedor_id = ?");
    $stmt->execute([$produto, $fornecedor]);

    echo json_encode(["mensagem" => "Fornecedor desassociado com sucesso!"]);
}


?>
