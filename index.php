<?php 
// Conexão com o banco (necessário em toda aplicação)
include 'conexao.php';

// As páginas específicas (fornecedores, produtos, associação)
// devem incluir seus próprios arquivos.
// Evitamos carregar tudo na home para reduzir erros e melhorar performance.
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Controle de Estoque</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f5f5;
    }
    .navbar-brand {
      font-weight: bold;
      letter-spacing: .5px;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 3px 15px rgba(0,0,0,.15);
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Controle de Estoque</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item"><a class="nav-link" href="api/frontend/fornecedores.html">Fornecedores</a></li>
<li class="nav-item"><a class="nav-link" href="api/frontend/produtos.html">Produtos</a></li>
<li class="nav-item"><a class="nav-link" href="api/frontend/associacao.html">Associação</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="card p-4">
      <h1 class="mb-3">Bem-vindo ao Sistema de Controle de Estoque</h1>
      <p class="fs-5 text-muted">
        Utilize o menu acima para navegar entre os módulos de <strong>Fornecedores</strong>, 
        <strong>Produtos</strong> e <strong>Associação</strong>.
      </p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
