<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/style.css">
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="<?= $base;?>/login" method="POST" class="form-auth">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="error-message">
                    <?= $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="auth-btn">Entrar</button>
        </form>
        <p>Não tem uma conta? <a href="<?= $base; ?>/cadastro">Cadastre-se</a></p>
    </main>
</body>

</html>
<footer>
    <p>&copy; 2024 Sistema de Gerenciamento de Contatos</p>
</footer>