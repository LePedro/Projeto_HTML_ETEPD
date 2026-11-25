# Pedro Pages 📚

O **Pedro Pages** é um site desenvolvido como projeto de aprendizado do curso Técnico em Desenvolvimento de Sistemas da ETEPD (ETE Porto Digital).

O objetivo do projeto é apresentar uma pequena loja virtual de livros e quadrinhos. Os visitantes navegam pelo catálogo, adicionam produtos ao carrinho e criam uma conta. Os usuários cadastrados entram no sistema, consultam outros usuários e podem dar baixa em uma conta.

## Sumário

- [Funcionalidades](#funcionalidades)
- [Tecnologias utilizadas](#tecnologias-utilizadas)
- [Estrutura do projeto](#estrutura-do-projeto)
- [Banco de dados](#banco-de-dados)
- [Como rodar o projeto](#como-rodar-o-projeto)
- [Regras de negócio](#regras-de-negócio)
- [Segurança](#segurança)
- [Fluxos principais](#fluxos-principais)
- [Como testar](#como-testar)
- [Limitações](#limitações)
- [Objetivo do projeto](#objetivo-do-projeto)
- [Aluno](#aluno)

## Funcionalidades

- **Página inicial (`index.php`):** apresenta o site e oferece atalhos para as categorias de livros e quadrinhos.
- **Livros (`livros.php`):** exibe os livros cadastrados no banco, com nome, autor, imagem e preço. Cada item tem o botão *Adicionar ao carrinho*.
- **Quadrinhos (`quadrinhos.php`):** mesma tela dos livros, filtrada pela categoria *Quadrinho*.
- **Carrinho (`carrinho.php`):** mostra os produtos escolhidos, a quantidade e o valor total da compra. O botão *Finalizar compra* esvazia o carrinho.
- **Cadastro (`cadastro.php`):** cria uma conta com nome, e-mail, senha, CPF, setor e perfil.
- **Login e logout (`login.php`, `logout.php`):** o usuário entra com e-mail e senha. Ao sair, a sessão é encerrada e a pessoa volta para a página inicial.
- **Dashboard (`dashboard.php`):** mostra o nome, o CPF e o endereço do usuário logado, além do total de livros e de quadrinhos cadastrados no banco. Uma tabela de exemplo ainda usa dados fixos.
- **Usuários (`usuarios.php`):** lista os usuários com status *Ativo*, com setor e perfil de cada um. Permite buscar por nome ou e-mail e dar baixa em uma conta, com janela de confirmação. Só abre para quem está logado.
- **Contato (`contato.php`):** apresenta um formulário, o telefone, o e-mail e o endereço da loja. O formulário ainda não envia mensagens.
- **Sobre (`sobre.php`):** apresenta o projeto e seus objetivos.

## Tecnologias utilizadas

- **HTML5** e **CSS3** para a estrutura e o visual das páginas.
- **JavaScript** para o carrinho (guardado no navegador), a máscara do CPF e a janela de confirmação da baixa.
- **PHP 8.1 ou superior** para as regras do servidor, com acesso ao banco pelo PDO.
- **MySQL** para guardar usuários, setores, perfis, produtos e auditoria.
- **XAMPP** como ambiente local (Apache, PHP e MySQL).
- **Git** e **GitHub** para o controle de versões.

## Estrutura do projeto

```
Projeto_HTML_ETEPD/
├── index.php, livros.php, quadrinhos.php, carrinho.php
├── cadastro.php, login.php, logout.php
├── usuarios.php, usuarios_excluir.php
├── dashboard.php, contato.php, sobre.php
├── config/
│   └── banco.exemplo.php        modelo da configuração do banco (o banco.php não vai para o Git)
├── includes/
│   ├── conexao.php              conexão PDO com o banco
│   ├── funcoes.php              e(), auditoria e token CSRF
│   ├── header.php, footer.php   cabeçalho e rodapé das páginas
│   └── produtos.php             consulta dos produtos por categoria
├── assets/
│   ├── css/style.css            aparência
│   ├── js/script.js             carrinho
│   ├── js/usuarios.js           máscara de CPF e janela de exclusão
│   ├── img/                     capas, ícones e imagens
│   └── sql/
│       ├── loja.sql             cria o banco pedro_pages com tabelas e dados de exemplo
│       └── consultas.txt       consultas SQL de apoio
├── organogramas/                organograma das páginas e pastas
└── README.md                    este arquivo
```

## Banco de dados

O banco se chama `pedro_pages`. O script `assets/sql/loja.sql` apaga o banco, se existir, e o recria com as tabelas abaixo.

| Tabela | Para que serve |
|---|---|
| `setores` | Setores que o usuário pode escolher no cadastro. |
| `perfis` | Perfis que o usuário pode escolher no cadastro. |
| `usuario` | Contas dos usuários, com status *Ativo* ou *Baixa*. |
| `auditoria_usuarios` | Histórico de cadastros e baixas, com autor, data e resultado. |
| `produtos` | Livros e quadrinhos exibidos no catálogo. |
| `funcionarios`, `fornecedor`, `pedidos`, `cupom` | Existem no script, mas ainda não são usadas pelas telas. |

## Como rodar o projeto

1. Instale o **XAMPP** e abra o painel. Clique em **Start** no Apache e no MySQL.
2. Copie a pasta `Projeto_HTML_ETEPD` para `C:\xampp\htdocs\`.
3. Acesse `http://localhost/phpmyadmin`, clique em **Importar**, escolha `assets/sql/loja.sql` e clique em **Executar**.
   Esse arquivo apaga e recria o banco `pedro_pages`. Use apenas em ambiente de estudo.
4. Dentro da pasta `config`, copie `banco.exemplo.php` e dê à cópia o nome `banco.php`.
5. Abra `config/banco.php` e confira `host`, `banco`, `usuario` e `senha` (no XAMPP, a senha costuma ser vazia).
6. Acesse `http://localhost/Projeto_HTML_ETEPD/`.

## Regras de negócio

- O nome deve ter pelo menos 3 caracteres.
- O e-mail deve ser válido e não pode estar cadastrado para outro usuário.
- A senha deve ter de 6 a 12 caracteres.
- O CPF deve ter 11 números e não pode estar cadastrado para outro usuário. A conferência dos dígitos verificadores ainda não foi feita.
- O setor e o perfil escolhidos no cadastro precisam estar ativos.
- Dar baixa não apaga o usuário. O status muda para *Baixa* e a data fica guardada.
- Um usuário com status *Baixa* não consegue entrar no sistema.
- Um usuário que já teve baixa não recebe uma segunda baixa.
- A área de usuários só abre para quem fez login.
- O carrinho fica guardado no navegador de quem está comprando.

## Segurança

- As senhas são guardadas com `password_hash()` e conferidas com `password_verify()`. Nenhuma senha é gravada em texto puro.
- As consultas ao banco usam *prepared statements* do PDO, o que evita injeção de SQL.
- O texto mostrado na tela passa pela função `e()`, que usa `htmlspecialchars()`.
- A baixa de usuário aceita apenas o método POST e exige um token CSRF, que é conferido antes de qualquer alteração.
- A senha do banco fica em `config/banco.php`, que não vai para o Git.
- Os erros de conexão com o banco são gravados no log do PHP. Para a pessoa, aparece só a mensagem *Sistema temporariamente indisponível*.

## Fluxos principais

**Cadastro:** o formulário é validado no navegador e depois no servidor. Se algum campo estiver errado, a mensagem aparece embaixo dele e os dados digitados continuam na tela. Um cadastro válido grava o usuário, registra a ação na auditoria e leva a pessoa para o login.

**Baixa de usuário:** o botão *Excluir* abre uma janela com o nome do usuário. *Cancelar* não muda nada. *Confirmar* envia um POST para `usuarios_excluir.php`, que confere o token CSRF, muda o status para *Baixa*, grava a auditoria e volta para a lista com um aviso.

Os diagramas desses fluxos estão em [`docs/telas-e-fluxos.md`](docs/telas-e-fluxos.md).

## Como testar

Não há testes automatizados. Para conferir o sistema depois de instalar:

1. Crie um usuário em **Cadastro**, deixando um campo errado de propósito, e confira se a mensagem aparece embaixo dele.
2. Digite um CPF e confira se a máscara `000.000.000-00` é aplicada.
3. Entre com o usuário criado e confira se o **Dashboard** mostra o seu nome.
4. Abra **Usuários**, busque pelo nome e dê baixa nele. Cancele uma vez e confirme outra vez.
5. Tente entrar com o usuário que recebeu baixa. O acesso deve ser negado.

## Limitações

- O carrinho fica só no navegador. Ao limpar os dados do navegador, ele some.
- *Finalizar compra* não grava pedido. A tabela `pedidos` existe, mas ainda não é usada.
- O formulário de contato não envia mensagens.
- A tabela de exemplo do Dashboard usa dados fixos. Os números de livros e quadrinhos já vêm do banco.
- O cadastro não preenche telefone, data de nascimento nem endereço, embora as colunas existam no banco.
- O CPF não passa pela conferência dos dígitos verificadores.
- A busca de usuários não trata os caracteres `%` e `_` como texto comum. Buscar `%` lista todos os usuários ativos.
- O perfil do usuário ainda não limita o que cada pessoa pode fazer no sistema.

## Objetivo do projeto

O Pedro Pages foi desenvolvido para colocar em prática os conhecimentos adquiridos durante o curso. O projeto trabalha com estrutura de páginas, estilização, programação no servidor, integração com banco de dados, validação de formulários, segurança básica e registro de auditoria.

## Aluno

- Pedro Henrique Sales de Lima

Projeto do curso Técnico em Desenvolvimento de Sistemas — ETE Porto Digital, 2026.
