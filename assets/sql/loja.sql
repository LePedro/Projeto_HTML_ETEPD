CREATE DATABASE IF NOT EXISTS loja;

USE DATABASE loja;

CREATE TABLE produtos (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    autor VARCHAR(50) NOT NULL,
    paginas INT NOT NULL,
    categoria VARCHAR(50),
    capa VARCHAR(15) NOT NULL,
    preco DECIMAL(10, 2),
    estoque INT NOT NULL,
    descricao VARCHAR(250)
);

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_nascimento DATE,
    endereco TEXT
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
    id_fornecedor INT  AUTO_INCREMENT PRIMARY KEY,
    nome_fornecedor VARCHAR(150) NOT NULL,
    cnpj VARCHAR(18),
    telefone VARCHAR(20)
);

CREATE TABLE pedidos (
    id_pedido INT  AUTO_INCREMENT PRIMARY KEY,
    quantidade_produtos INT,
    id_usuario INT,
    status_pedido VARCHAR(20),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    prazo VARCHAR(100),
    preco_total DECIMAL(10, 2),
    FOREIGN KEY (id_usuario) references usuario (id_usuario)
);

CREATE TABLE cupom (
    id_cupom INT AUTO_INCREMENT PRIMARY KEY,
    valor
);

/*CONSULTAS*/

INSERT INTO usuario (nome_usuario, email, telefone, cpf, data_nascimento) VALUES
('Pedro Henrique','pedro1@email.com','81912345678','11111111111','2002-07-29','Rua dos Alfeneiros, 221'),
('Pedro Sales','pedro2@email.com','81987654321','22222222222','2002-05-06','Rua dos Feios, 420'),
('Pedro Lima','pedro3@email.com','81911111111','33333333333','1984-07-29','Rua dos Bonitos, 13'),
('Pedro Conquistas','pedro4@email.com','81933333333','44444444444','2002-06-24','Rua dos Burros, 22'),
('Pedro Ultimo','pedro5@email.com','81977777777','55555555555','2007-09-30','Rua dos Gatos, 337');

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
('Invencível Foil Edition4','Robert Kirman','600','Quadrinho','Normal','25.00','30');