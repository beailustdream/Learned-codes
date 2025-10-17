-- Banco de dados Creativa IA (versão segura)
CREATE DATABASE IF NOT EXISTS creativa_db;
USE creativa_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    foto VARCHAR(255) DEFAULT 'https://i.postimg.cc/fy3gBk7W/111-Sem-T-tulo-20251004161225.jpg'
);

-- Usuário inicial (senha 123456)
INSERT INTO usuarios (nome, email, senha) VALUES
('Beatriz Gonçalves', 'beatriz@teste.com', '$2y$10$yLDs3s2h4P8p9Jx6xikQGeh5Z6Re6b6E2QZJAKZyQKvKgf8z8B6bO');
