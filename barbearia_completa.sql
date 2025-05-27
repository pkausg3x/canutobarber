
-- ========================
-- TABELA: clientes
-- ========================
CREATE TABLE IF NOT EXISTS clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(20)
);

INSERT INTO clientes (nome, email, senha, telefone) VALUES
('Ana Souza', 'ana@email.com', 'senha123', '11999990001'),
('Bruno Lima', 'bruno@email.com', 'abc123', '11999990002'),
('Carlos Mendes', 'carlos@email.com', 'pass123', '11999990003'),
('Daniela Rocha', 'daniela@email.com', 'senha456', '11999990004'),
('Eduardo Reis', 'eduardo@email.com', 'teste321', '11999990005');

-- ========================
-- TABELA: barbers
-- ========================
CREATE TABLE IF NOT EXISTS barbers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nome VARCHAR(100) NOT NULL
);

INSERT INTO barbers (username, password, nome) VALUES
('barber_joao', 'senha123', 'João Cabelereiro'),
('maria_barber', '12345678', 'Maria das Tesouras'),
('carlos_estilo', 'corte123', 'Carlos Estilo Fino'),
('paula_hair', 'minhasenha', 'Paula Hair Designer'),
('tonybarber', 'barber321', 'Tony Barber Shop');

-- ========================
-- TABELA: servicos
-- ========================
CREATE TABLE IF NOT EXISTS servicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL UNIQUE,
  preco DECIMAL(10,2) NOT NULL,
  duracao_minutos INT NOT NULL
);

INSERT INTO servicos (nome, preco, duracao_minutos) VALUES
('Corte de cabelo', 30.00, 30),
('Barba', 20.00, 20),
('Corte + Barba', 45.00, 50),
('Pintura', 50.00, 60),
('Hidratação', 40.00, 45);

-- ========================
-- TABELA: formas_pagamento
-- ========================
CREATE TABLE IF NOT EXISTS formas_pagamento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  metodo VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO formas_pagamento (metodo) VALUES
('Dinheiro'),
('Cartão de Débito'),
('Cartão de Crédito'),
('PIX'),
('Transferência Bancária');

-- ========================
-- TABELA: status_agendamento
-- ========================
CREATE TABLE IF NOT EXISTS status_agendamento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  status_nome VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO status_agendamento (status_nome) VALUES
('Agendado'),
('Confirmado'),
('Concluído'),
('Cancelado');

-- ========================
-- TABELA: agendamentos
-- ========================
CREATE TABLE IF NOT EXISTS agendamentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_id INT NOT NULL,
  barber_id INT NOT NULL,
  servico_id INT NOT NULL,
  data_agendamento DATE NOT NULL,
  hora TIME NOT NULL,
  status_id INT NOT NULL,
  forma_pagamento_id INT,
  observacoes TEXT,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id),
  FOREIGN KEY (barber_id) REFERENCES barbers(id),
  FOREIGN KEY (servico_id) REFERENCES servicos(id),
  FOREIGN KEY (status_id) REFERENCES status_agendamento(id),
  FOREIGN KEY (forma_pagamento_id) REFERENCES formas_pagamento(id)
);

INSERT INTO agendamentos (cliente_id, barber_id, servico_id, data_agendamento, hora, status_id, forma_pagamento_id, observacoes) VALUES
(1, 1, 1, '2025-06-01', '14:00:00', 1, 1, 'Cliente prefere máquina.'),
(2, 2, 4, '2025-06-02', '10:30:00', 2, 2, 'Usar tinta preta.'),
(3, 3, 2, '2025-06-03', '15:00:00', 1, 3, 'Cliente quer estilo degradê.'),
(4, 4, 5, '2025-06-04', '09:00:00', 3, 4, NULL),
(5, 5, 3, '2025-06-05', '11:00:00', 1, 5, 'Novo cliente.');

-- ========================
-- TABELA: avaliacoes
-- ========================
CREATE TABLE IF NOT EXISTS avaliacoes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_id INT NOT NULL,
  barber_id INT NOT NULL,
  nota INT CHECK (nota BETWEEN 1 AND 5),
  comentario TEXT,
  data_avaliacao DATE DEFAULT CURRENT_DATE,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id),
  FOREIGN KEY (barber_id) REFERENCES barbers(id)
);

INSERT INTO avaliacoes (cliente_id, barber_id, nota, comentario) VALUES
(1, 1, 5, 'Excelente corte, muito rápido e atencioso!'),
(2, 2, 4, 'Gostei muito, mas atrasou um pouco.'),
(3, 3, 5, 'Top demais! Recomendo.');
