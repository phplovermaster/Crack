CREATE DATABASE IF NOT EXISTS crackhub
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
USE crackhub;
SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(191) NOT NULL,
    email VARCHAR(191) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    avatar VARCHAR(191) DEFAULT NULL,
    description_user TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL DEFAULT NULL,
    class ENUM('user', 'admin') DEFAULT 'user'
);

CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(191) NOT NULL UNIQUE,
    link VARCHAR(255) DEFAULT NULL,
    category VARCHAR(191) NOT NULL,
    description TEXT NOT NULL,
    release_date DATE NOT NULL,
    last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT IGNORE INTO games (name, link, category, description, release_date) VALUES
    ('Google Snake', 'https://www.google.com/search?q=google+snake', 'Clássico', 'Um jogo de cobra simples e viciante, direto no Google.', '2013-06-20'),
    ('Google Pac-Man', 'https://www.google.com/search?q=google+pac-man', 'Arcade', 'Uma versão do clássico Pac-Man com o logo do Google.', '2010-05-21'),
    ('Dino Run', 'https://www.google.com/search?q=chrome+dino+game', 'Aventura', 'O famoso jogo offline do dinossauro do Chrome.', '2014-09-24'),
    ('Solitaire', 'https://www.google.com/search?q=google+solitaire', 'Cartas', 'Jogue Paciência direto na pesquisa Google.', '1995-12-01'),
    ('Google T-Rex', 'https://www.google.com/search?q=google+t-rex+game', 'Arcade', 'Outra versão do T-Rex Runner do Chrome para se divertir.', '2014-09-24'),
    ('Campo Minado', 'https://www.google.com/search?q=google+minesweeper', 'Lógica', 'Encontre todos os campos minados sem explodir.', '1990-05-01');

INSERT INTO users (username, email, senha, class) VALUES
('admin', 'admin@crackhub.com', '$2y$10$2BLs1SWKTzS7XWiox8Rt6uIDZ0iEq4jM1SIVWoQVHMqOikDXJFY0a', 'admin');