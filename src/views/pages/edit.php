<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/style.css">
</head>

<body>
    <header>
        <h1>Gerenciamento de Usuários</h1>
    </header>

    <main>
        
        <section class="form-section" id="contact-form-section" > 
            <h2>Editar Usuário</h2>
            <form id="contact-form" method="POST" action="<?= $base; ?>/usuario/<?= $contato['id'];?>/editar">
                <input type="text" name="nome" placeholder="Nome" value="<?=$contato['nome'];?>">
                <input type="email" name="email" placeholder="Email" value="<?=$contato['email'];?>" required>
                <input type="tel" name="telefone" placeholder="Telefone" value="<?=$contato['telefone'];?>" maxlength="15">
                <button type="submit" class="save-btn">Editar</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gerenciamento de Contatos</p>
    </footer>
</body>

</html>