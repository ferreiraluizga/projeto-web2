<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Web 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <h1>Sistema de Cadastro</h1>
        <p>Preencha o formulário para se cadastrar</p>
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu email">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Insira seu telefone">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $databaseUrl = getenv("DATABASE_URL");

        $conexao = pg_connect($databaseUrl);

        pg_query_params(
            $conexao,
            "INSERT INTO usuarios (nome, email, telefone) VALUES ($1, $2, $3)",
            array($nome, $email, $telefone)
        );

        echo "Cadastro realizado com sucesso";
    }
    ?>
</body>

</html>