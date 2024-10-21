<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Contatos</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/style.css">
</head>

<body>
    <header>
        <h1>Gerenciamento de Usuários</h1>
    </header>
    <div>
        <a href="<?= $base; ?>/sair" class="logout-btn">Sair</a>
    </div>
    <main>
        <section class="search-bar">
            <form action="<?= $base; ?>/contatos/pesquisar" method="GET">
                <input type="text" id="search" name="pesquisa" placeholder="Pesquisar...">
                <button type="submit" id="search-btn">Pesquisar</button>
            </form>
            <?php if (!empty($pesquisa)): ?>
                <a href="<?= $base; ?>/" class="back-btn">Voltar</a>
            <?php endif; ?>
        </section>

        <!-- Tabela de Usuários e Contatos -->
        <section class="table-section">
            <h2>Usuários e Contatos</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($contatos)): ?>
                            <?php foreach ($contatos as $contato): ?>
                                <tr>
                                    <td><?php echo $contato['id']; ?></td>
                                    <td><?php echo $contato['nome']; ?></td>
                                    <td><?php echo $contato['email']; ?></td>
                                    <td><?php echo $contato['telefone']; ?></td>
                                    <td>
                                        <a href="<?= $base; ?>/usuario/<?= $contato['id']; ?>/editar" class="edit-btn">Editar</a>
                                        <a href="<?= $base; ?>/usuario/<?= $contato['id']; ?>/excluir" class="delete-btn">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">Nenhum resultado encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="form-section" id="contact-form-section" style="display: none;">
            <h2>Adicionar Novo Contato</h2>
            <form id="contact-form" method="POST" action="<?= $base; ?>/contatos">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="telefone" placeholder="Telefone" maxlength="15">
                <button type="submit" class="save-btn">Salvar</button>
            </form>
        </section>

        <section class="action-buttons">
            <button class="add-btn" id="add-contact-btn">Adicionar Contato</button>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gerenciamento de Contatos</p>
    </footer>

    <script>
        document.getElementById('add-contact-btn').addEventListener('click', function() {
            const formSection = document.getElementById('contact-form-section');
            formSection.style.display = formSection.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>

</html>