SET NAMES utf8mb4;

DROP DATABASE IF EXISTS pedro_pages;
CREATE DATABASE pedro_pages CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pedro_pages;

CREATE TABLE setores (
    id_setor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    ativo TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE perfis (
    id_perfil INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    ativo TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP NULL DEFAULT NULL,
    baixado_em DATETIME NULL DEFAULT NULL,
    data_nascimento DATE,
    endereco TEXT,
    setor_id INT NULL,
    perfil_id INT NULL,
    status ENUM('Ativo', 'Baixa') NOT NULL DEFAULT 'Ativo',
    CONSTRAINT fk_usuario_setor FOREIGN KEY (setor_id) REFERENCES setores (id_setor),
    CONSTRAINT fk_usuario_perfil FOREIGN KEY (perfil_id) REFERENCES perfis (id_perfil)
);

CREATE TABLE auditoria_usuarios (
    id_auditoria INT AUTO_INCREMENT PRIMARY KEY,
    usuario_alvo_id INT NULL,
    acao VARCHAR(20) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    data_hora TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    resultado VARCHAR(255) NOT NULL,
    CONSTRAINT fk_auditoria_usuario FOREIGN KEY (usuario_alvo_id) REFERENCES usuario (id_usuario)
);

CREATE TABLE produtos (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    autor VARCHAR(50) NOT NULL,
    paginas INT NOT NULL,
    categoria VARCHAR(50),
    capa VARCHAR(15) NOT NULL,
    preco DECIMAL(10, 2),
    estoque INT NOT NULL,
    descricao VARCHAR(250),
    imagem VARCHAR(100)
);

CREATE TABLE funcionarios (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome_funcionario VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20),
    cpf VARCHAR(14) UNIQUE NOT NULL,
    data_nascimento DATE,
    endereco VARCHAR(150)
);

CREATE TABLE fornecedor (
    id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nome_fornecedor VARCHAR(150) NOT NULL,
    cnpj VARCHAR(18),
    telefone VARCHAR(20)
);

CREATE TABLE pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    quantidade_produtos INT,
    id_usuario INT,
    status_pedido VARCHAR(20),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    prazo VARCHAR(100),
    preco_total DECIMAL(10, 2),
    FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE cupom (
    id_cupom INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(10,2)
);

INSERT INTO setores (nome, ativo) VALUES
('Administrativo', 1),
('Vendas', 1),
('Atendimento', 1),
('Arquivo morto', 0);

INSERT INTO perfis (nome, ativo) VALUES
('Administrador', 1),
('Operador', 1),
('Leitor', 1),
('Visitante', 0);

INSERT INTO usuario (nome_usuario, email, senha, telefone, cpf, data_nascimento, endereco, setor_id, perfil_id) VALUES
('Pedro Henrique', 'pedro1@email.com', '$2y$10$fPJadoIkvsSUbTQxFFVgYOeYc5TF1Rp9cFzsBpaxJsZ5W780GrfN6', '81912345678', '52998224725', '2002-07-29', 'Rua dos Alfeneiros, 221', 1, 1),
('Pedro Sales', 'pedro2@email.com', '$2y$10$fPJadoIkvsSUbTQxFFVgYOeYc5TF1Rp9cFzsBpaxJsZ5W780GrfN6', '81987654321', '11144477735', '2002-05-06', 'Rua dos Feios, 420', 2, 2),
('Pedro Lima', 'pedro3@email.com', '$2y$10$fPJadoIkvsSUbTQxFFVgYOeYc5TF1Rp9cFzsBpaxJsZ5W780GrfN6', '81911111111', '12345678909', '1984-07-29', 'Rua dos Bonitos, 13', 1, 3),
('Pedro Conquistas', 'pedro4@email.com', '$2y$10$fPJadoIkvsSUbTQxFFVgYOeYc5TF1Rp9cFzsBpaxJsZ5W780GrfN6', '81933333333', '98765432100', '2002-06-24', 'Rua dos Burros, 22', 3, 2),
('Pedro Ultimo', 'pedro5@email.com', '$2y$10$fPJadoIkvsSUbTQxFFVgYOeYc5TF1Rp9cFzsBpaxJsZ5W780GrfN6', '81977777777', '39053344705', '2007-09-30', 'Rua dos Gatos, 337', 2, 3);

INSERT INTO produtos (nome, autor, paginas, categoria, capa, preco, estoque) VALUES
('O Hobbit','J.R.R. TOLKIEN','330','Livro','Normal','40.00','50'),
('1984','George Orwell','410','Livro','Normal','40.00','50'),
('Crime e Castigo','Fiódor Dostoiévski','400','Livro','Dura','40.00','50'),
('Superman All Star','Grant Morrison','100','Quadrinho','Normal','25.00','30'),
('Invencível Foil Edition','Robert Kirman','600','Quadrinho','Normal','25.00','30'),
('O Hobbit1','J.R.R. TOLKIEN','330','Livro','Normal','40.00','50'),
('19841','George Orwell','410','Livro','Normal','40.00','50'),
('Crime e Castigo1','Fiódor Dostoiévski','400','Livro','Dura','40.00','50'),
('Superman All Star1','Grant Morrison','100','Quadrinho','Normal','25.00','30'),
('Invencível Foil Edition1','Robert Kirman','600','Quadrinho','Normal','25.00','30'),
('O Hobbit2','J.R.R. TOLKIEN','330','Livro','Normal','40.00','50'),
('19842','George Orwell','410','Livro','Normal','40.00','50'),
('Crime e Castigo2','Fiódor Dostoiévski','400','Livro','Dura','40.00','50'),
('Superman All Star2','Grant Morrison','100','Quadrinho','Normal','25.00','30'),
('Invencível Foil Edition2','Robert Kirman','600','Quadrinho','Normal','25.00','30'),
('O Hobbit3','J.R.R. TOLKIEN','330','Livro','Normal','40.00','50'),
('19843','George Orwell','410','Livro','Normal','40.00','50'),
('Crime e Castigo3','Fiódor Dostoiévski','400','Livro','Dura','40.00','50'),
('Superman All Star3','Grant Morrison','100','Quadrinho','Normal','25.00','30'),
('Invencível Foil Edition3','Robert Kirman','600','Quadrinho','Normal','25.00','30'),
('O Hobbit4','J.R.R. TOLKIEN','330','Livro','Normal','40.00','50'),
('19844','George Orwell','410','Livro','Normal','40.00','50'),
('Crime e Castigo4','Fiódor Dostoiévski','400','Livro','Dura','40.00','50'),
('Superman All Star4','Grant Morrison','100','Quadrinho','Normal','25.00','30'),
('Invencível Foil Edition4','Robert Kirman','600','Quadrinho','Normal','25.00','30'),
('Absolute Martian Manhunter Vol.1: Martian Vision','Deniz Camp','200','Quadrinho','Dura','25.00','30');

UPDATE produtos SET imagem = 'hobbit.jpg' WHERE nome LIKE 'O Hobbit%';
UPDATE produtos SET imagem = '1984.jpg' WHERE nome LIKE '1984%';
UPDATE produtos SET imagem = 'crime-e-castigo.jpg' WHERE nome LIKE 'Crime e Castigo%';
UPDATE produtos SET imagem = 'superman.jpg' WHERE nome LIKE 'Superman All Star%';
UPDATE produtos SET imagem = 'invencivel.jpg' WHERE nome LIKE 'Invenc%';
UPDATE produtos SET imagem = 'hq-2.webp' WHERE nome LIKE 'Absolute Martian%';