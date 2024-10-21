<!-- register.html -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/cadastro.css">
</head>

<body>
    <header>
        <h1>Cadastro</h1>
    </header>
    <main>
        <form action="<?= $base; ?>/cadastro" method="POST" class="form-auth">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="error-message">
                    <?= $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="auth-btn">Cadastrar</button>
        </form>
        <p>Já tem uma conta? <a href="<?= $base; ?>/login">Faça login</a></p>
    </main>
</body>

</html>
<footer>
    <p>&copy; 2024 Sistema de Gerenciamento de Contatos</p>
</footer>