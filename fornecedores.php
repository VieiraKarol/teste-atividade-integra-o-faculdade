<?php
include 'conexao.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica CNPJ duplicado
    $stmt = $pdo->prepare("SELECT id FROM fornecedores WHERE cnpj = ?");
    $stmt->execute([$data["cnpj"]]);

    if ($stmt->rowCount() > 0) {
        http_response_code(409);
        echo json_encode(["erro" => "Fornecedor com esse CNPJ já está cadastrado!"]);
        exit;
    }

    // Insere
    $sql = "INSERT INTO fornecedores (nome_empresa, cnpj, endereco, telefone, email, contato_principal)
            VALUES (?, ?, ?, ?, ?, ?)";
            
    $pdo->prepare($sql)->execute([
        $data["nome_empresa"],
        $data["cnpj"],
        $data["endereco"],
        $data["telefone"],
        $data["email"],
        $data["contato_principal"]
    ]);

    http_response_code(201);
    echo json_encode(["mensagem" => "Fornecedor cadastrado com sucesso!"]);
}
?>
