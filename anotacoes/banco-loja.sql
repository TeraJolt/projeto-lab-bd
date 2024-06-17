CREATE TABLE tb_cliente(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    endereco VARCHAR(50),
    numero VARCHAR(10),
    bairro VARCHAR(30),
    cidade VARCHAR(30),
    estado CHAR(2),
    email VARCHAR(50),
    cpf_cnpj VARCHAR(14),
    rg VARCHAR(9),
    telefone VARCHAR(10),
    celular VARCHAR(11),
    data_nasc DATE,
    salario NUMERIC(12,2)
) engine INNODB;

CREATE TABLE tb_forma_pagto(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30)
) engine INNODB;

CREATE TABLE tb_vendedor(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	endereco VARCHAR(50),
	cidade VARCHAR(30),
	estado VARCHAR(2),
	celular VARCHAR(11),
	email VARCHAR(50),
	perc_comissao NUMERIC(5,2)
) engine INNODB;

CREATE TABLE tb_produto(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100),
	qtde_estoque INTEGER,
	preco NUMERIC(10,2),
	unidade_medida VARCHAR(20),
	promocao CHAR(3) -- SIM ou NÃO
) engine INNODB;

CREATE TABLE tb_pedido(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    data_ped DATE,
    observacao VARCHAR(100),
    prazo_entrega VARCHAR(20),
    id_cliente INTEGER REFERENCES tb_cliente(id),    
    forma_pagto INTEGER REFERENCES tb_forma_pagto(id),    
    id_vendedor INTEGER REFERENCES tb_vendedor(id)
) engine INNODB;

CREATE TABLE tb_itens_pedido(
    id_item INTEGER AUTO_INCREMENT PRIMARY KEY,
    qtde INTEGER,    
    id_pedido INTEGER REFERENCES tb_pedido(id),
    id_produto INTEGER REFERENCES tb_produto(id)       
) engine INNODB;

INSERT INTO tb_cliente (nome, endereco, numero, bairro, cidade, estado, email, cpf_cnpj, rg, telefone, celular, data_nasc, salario) VALUES 
    ('João Silva', 'Rua das Flores', '123', 'Centro', 'São Paulo', 'SP', 'joao.silva@email.com', '123.456.789-10', '123456789', '(11) 1234-5678', '(11) 98765-4321', '1985-03-15', 5000.00), -- Cliente 1
    ('Maria Santos', 'Avenida Principal', '456', 'Vila Nova', 'Rio de Janeiro', 'RJ', 'maria.santos@email.com', '987.654.321-00', '987654321', '(21) 9876-5432', '(21) 1234-5678', '1990-07-20', 6000.00), -- Cliente 2
    ('Ana Oliveira', 'Rua das Palmeiras', '789', 'Jardim das Flores', 'Belo Horizonte', 'MG', 'ana.oliveira@email.com', '234.567.890-11', '234567890', '(31) 2345-6789', '(31) 8765-4321', '1988-11-10', 5500.00), -- Cliente 3
    ('Pedro Souza', 'Avenida das Árvores', '321', 'Centro', 'Curitiba', 'PR', 'pedro.souza@email.com', '543.210.987-22', '543210987', '(41) 8765-4321', '(41) 1234-5678', '1982-05-25', 7000.00), -- Cliente 4
    ('Juliana Lima', 'Rua dos Girassóis', '987', 'Vila Feliz', 'Porto Alegre', 'RS', 'juliana.lima@email.com', '876.543.210-33', '876543210', '(51) 5678-9012', '(51) 1098-7654', '1983-09-30', 6500.00), -- Cliente 5
    ('Fernando Almeida', 'Avenida Central', '654', 'Cidade Alta', 'Salvador', 'BA', 'fernando.almeida@email.com', '765.432.109-44', '765432109', '(71) 2345-6789', '(71) 8901-2345', '1975-12-05', 8000.00), -- Cliente 6
    ('Carla Costa', 'Rua das Oliveiras', '222', 'Jardim Primavera', 'Fortaleza', 'CE', 'carla.costa@email.com', '654.321.098-55', '654321098', '(85) 3456-7890', '(85) 6789-0123', '1995-02-18', 4500.00), -- Cliente 7
    ('Lucas Rocha', 'Avenida dos Coqueiros', '555', 'Praia Grande', 'Recife', 'PE', 'lucas.rocha@email.com', '543.210.987-66', '543210987', '(81) 4567-8901', '(81) 2345-6789', '1992-08-12', 6800.00), -- Cliente 8
    ('Mariana Gonçalves', 'Rua das Maravilhas', '777', 'Centro', 'Brasília', 'DF', 'mariana.goncalves@email.com', '876.543.210-77', '876543210', '(61) 6789-0123', '(61) 3456-7890', '1987-04-22', 7200.00), -- Cliente 9
    ('Rafael Oliveira', 'Avenida dos Jacarandás', '888', 'Lagoa Azul', 'Manaus', 'AM', 'rafael.oliveira@email.com', '987.654.321-88', '987654321', '(92) 5678-9012', '(92) 1098-7654', '1980-11-08', 7500.00); -- Cliente 10

INSERT INTO tb_forma_pagto (nome) VALUES 
    ('Dinheiro'), -- Forma 1
    ('Cartão de Débito'), -- Forma 2
    ('Cartão de Crédito'), -- Forma 3
    ('Transferência Bancária'), -- Forma 4
    ('Boleto Bancário'), -- Forma 5
    ('PIX'), -- Forma 6
    ('Cheque'), -- Forma 7
    ('Cartão Refeição'), -- Forma 8
    ('Vale Alimentação'), -- Forma 9
    ('Vale Transporte'); -- Forma 10

INSERT INTO tb_vendedor (nome, endereco, cidade, estado, celular, email, perc_comissao) VALUES 
    ('Maria Oliveira', 'Rua das Acácias, 456', 'São Paulo', 'SP', '(11) 9876-5432', 'maria.oliveira@email.com', 9.25), -- Vendedor 1
    ('Fernando Souza', 'Avenida das Palmeiras, 789', 'Rio de Janeiro', 'RJ', '(21) 8765-4321', 'fernando.souza@email.com', 8.75), -- Vendedor 2
    ('Carla Santos', 'Rua das Flores, 123', 'Belo Horizonte', 'MG', '(31) 2345-6789', 'carla.santos@email.com', 7.90), -- Vendedor 3
    ('Rafael Lima', 'Avenida Principal, 321', 'Curitiba', 'PR', '(41) 3456-7890', 'rafael.lima@email.com', 8.35), -- Vendedor 4
    ('Juliana Oliveira', 'Rua dos Girassóis, 987', 'Porto Alegre', 'RS', '(51) 4567-8901', 'juliana.oliveira@email.com', 9.10), -- Vendedor 5
    ('Thiago Moreira', 'Rua das Magnólias, 654', 'Florianópolis', 'SC', '(48) 9876-1234', 'thiago.moreira@email.com', 8.50), -- Vendedor 6
    ('Patrícia Alves', 'Avenida dos Ipês, 321', 'Salvador', 'BA', '(71) 8765-4321', 'patricia.alves@email.com', 8.95), -- Vendedor 7
    ('Diego Lima', 'Rua das Orquídeas, 147', 'Recife', 'PE', '(81) 2345-6789', 'diego.lima@email.com', 9.00), -- Vendedor 8
    ('Beatriz Ramos', 'Avenida Central, 852', 'Fortaleza', 'CE', '(85) 3456-7890', 'beatriz.ramos@email.com', 8.20), -- Vendedor 9
    ('Vinícius Barbosa', 'Rua dos Jasmins, 369', 'Manaus', 'AM', '(92) 4567-8901', 'vinicius.barbosa@email.com', 9.15); -- Vendedor 10

INSERT INTO tb_produto (nome, qtde_estoque, preco, unidade_medida, promocao) VALUES 
    ('Camisa Polo', 50, 29.99, 'Unidade', 'SIM'), -- Produto 1
    ('Calça Jeans', 30, 39.99, 'Unidade', 'NÃO'), -- Produto 2
    ('Tênis Esportivo', 20, 49.99, 'Par', 'SIM'), -- Produto 3
    ('Bermuda Cargo', 40, 24.99, 'Unidade', 'NÃO'), -- Produto 4
    ('Camiseta Básica', 60, 14.99, 'Unidade', 'SIM'), -- Produto 5
    ('Jaqueta de Couro', 15, 99.99, 'Unidade', 'NÃO'), -- Produto 6
    ('Sapato Social', 25, 59.99, 'Par', 'NÃO'), -- Produto 7
    ('Moletom', 35, 34.99, 'Unidade', 'SIM'), -- Produto 8
    ('Vestido Floral', 10, 54.99, 'Unidade', 'NÃO'), -- Produto 9
    ('Sunga Praia', 45, 19.99, 'Unidade', 'SIM'), -- Produto 10
    ('Blusa Tricot', 20, 44.99, 'Unidade', 'NÃO'), -- Produto 11
    ('Saia Midi', 25, 29.99, 'Unidade', 'NÃO'), -- Produto 12
    ('Blazer Slim', 12, 74.99, 'Unidade', 'SIM'), -- Produto 13
    ('Sandália Rasteira', 30, 19.99, 'Par', 'NÃO'), -- Produto 14
    ('Camisa Social', 28, 39.99, 'Unidade', 'NÃO'), -- Produto 15
    ('Óculos de Sol', 18, 29.99, 'Unidade', 'SIM'), -- Produto 16
    ('Chapéu de Palha', 22, 14.99, 'Unidade', 'NÃO'), -- Produto 17
    ('Mochila Escolar', 40, 24.99, 'Unidade', 'SIM'), -- Produto 18
    ('Relógio Analógico', 15, 49.99, 'Unidade', 'NÃO'), -- Produto 19
    ('Boné Estilizado', 20, 9.99, 'Unidade', 'NÃO'); -- Produto 20

-- Inserindo vendas
INSERT INTO tb_pedido (data_ped, id_cliente, observacao, forma_pagto, prazo_entrega, id_vendedor) VALUES 
    ('2024-01-20', 1, 'Pedido urgente', 1, '2 dias úteis', 1), -- Pedido 1
    ('2024-01-20', 2, 'Pedido padrão', 2, '1 semana', 2), -- Pedido 2
    ('2024-01-20', 3, 'Pedido especial', 1, '3 dias úteis', 3), -- Pedido 3
    ('2024-02-20', 4, 'Pedido corporativo', 3, '5 dias úteis', 4), -- Pedido 4
    ('2024-03-20', 5, 'Pedido VIP', 1, '1 dia útil', 5), -- Pedido 5
    ('2024-03-20', 1, 'Pedido regular', 2, '4 dias úteis', 6), -- Pedido 6
    ('2024-04-20', 2, 'Pedido padrão', 3, '2 semanas', 7), -- Pedido 7
    ('2024-05-20', 3, 'Pedido especial', 1, '3 dias úteis', 8), -- Pedido 8
    ('2024-06-20', 4, 'Pedido corporativo', 2, '7 dias úteis', 9), -- Pedido 9
    ('2024-07-20', 5, 'Pedido VIP', 3, '1 dia útil', 10), -- Pedido 10
    ('2024-07-20', 1, 'Pedido regular', 1, '5 dias úteis', 1), -- Pedido 11
    ('2024-08-20', 2, 'Pedido padrão', 2, '3 semanas', 2), -- Pedido 12
    ('2024-08-20', 3, 'Pedido especial', 3, '4 dias úteis', 3), -- Pedido 13
    ('2024-10-20', 4, 'Pedido corporativo', 1, '10 dias úteis', 4), -- Pedido 14
    ('2024-12-20', 5, 'Pedido VIP', 2, '1 dia útil', 5), -- Pedido 15
    ('2024-01-15', 6, 'Pedido urgente', 1, '2 dias úteis', 6), -- Pedido 16
    ('2024-01-22', 7, 'Pedido padrão', 2, '1 semana', 7), -- Pedido 17
    ('2024-02-10', 8, 'Pedido especial', 1, '3 dias úteis', 8), -- Pedido 18
    ('2024-02-25', 9, 'Pedido corporativo', 3, '5 dias úteis', 9), -- Pedido 19
    ('2024-03-05', 10, 'Pedido VIP', 1, '1 dia útil', 10), -- Pedido 20
    ('2024-03-15', 6, 'Pedido regular', 2, '4 dias úteis', 1), -- Pedido 21
    ('2024-03-30', 7, 'Pedido padrão', 3, '2 semanas', 2), -- Pedido 22
    ('2024-04-10', 8, 'Pedido especial', 1, '3 dias úteis', 3), -- Pedido 23
    ('2024-04-25', 9, 'Pedido corporativo', 2, '7 dias úteis', 4), -- Pedido 24
    ('2024-05-05', 10, 'Pedido VIP', 3, '1 dia útil', 5), -- Pedido 25
    ('2024-05-15', 6, 'Pedido regular', 1, '5 dias úteis', 6), -- Pedido 26
    ('2024-05-25', 7, 'Pedido padrão', 2, '3 semanas', 7), -- Pedido 27
    ('2024-06-05', 8, 'Pedido especial', 3, '4 dias úteis', 8), -- Pedido 28
    ('2024-06-15', 9, 'Pedido corporativo', 1, '10 dias úteis', 9), -- Pedido 29
    ('2024-06-25', 10, 'Pedido VIP', 2, '1 dia útil', 10); -- Pedido 30

-- Inserindo produtos vendidos
INSERT INTO tb_itens_pedido (id_pedido, id_produto, qtde) VALUES 
    (1, 1, 3), (1, 5, 2), (1, 9, 1), -- Produtos vendidos na Venda 1
    (2, 2, 2), (2, 7, 1), (2, 12, 3), -- Produtos vendidos na Venda 2
    (3, 3, 1), (3, 8, 2), -- Produtos vendidos na Venda 3
    (4, 4, 3), (4, 10, 1), (4, 13, 2), -- Produtos vendidos na Venda 4
    (5, 1, 2), (5, 6, 1), (5, 15, 3), -- Produtos vendidos na Venda 5
    (6, 2, 1), (6, 9, 2), -- Produtos vendidos na Venda 6
    (7, 3, 3), (7, 5, 1), (7, 8, 2), (7, 11, 1), -- Produtos vendidos na Venda 7
    (8, 4, 2), (8, 10, 1), (8, 14, 3), -- Produtos vendidos na Venda 8
    (9, 1, 1), (9, 6, 2), -- Produtos vendidos na Venda 9
    (10, 2, 2), (10, 7, 1), (10, 12, 2), -- Produtos vendidos na Venda 10
    (11, 3, 3), (11, 8, 1), (11, 15, 1), -- Produtos vendidos na Venda 11
    (12, 4, 1), (12, 10, 2), -- Produtos vendidos na Venda 12
    (13, 1, 3), (13, 5, 1), (13, 9, 2), -- Produtos vendidos na Venda 13
    (14, 2, 2), (14, 6, 1), (14, 13, 3), -- Produtos vendidos na Venda 14
    (15, 3, 1), (15, 8, 2), (15, 11, 1), -- Produtos vendidos na Venda 15
    (16, 1, 2), (16, 4, 1), (16, 7, 2), -- Produtos vendidos na Venda 16
    (17, 2, 1), (17, 5, 3), -- Produtos vendidos na Venda 17
    (18, 3, 2), (18, 8, 1), (18, 12, 1), (18, 16, 2), -- Produtos vendidos na Venda 18
    (19, 4, 3), (19, 6, 2), -- Produtos vendidos na Venda 19
    (20, 1, 1), (20, 13, 3), (20, 15, 2), (20, 17, 1), -- Produtos vendidos na Venda 20
    (21, 2, 2), (21, 7, 1), (21, 11, 1), -- Produtos vendidos na Venda 21
    (22, 3, 3), (22, 9, 2), -- Produtos vendidos na Venda 22
    (23, 4, 2), (23, 8, 1), (23, 12, 2), -- Produtos vendidos na Venda 23
    (24, 1, 3), -- Produtos vendidos na Venda 24
    (25, 2, 1), (25, 5, 2), (25, 9, 1), -- Produtos vendidos na Venda 25
    (26, 3, 3), (26, 7, 2), (26, 13, 1), (26, 19, 1), -- Produtos vendidos na Venda 26
    (27, 4, 2), (27, 6, 1), (27, 11, 2), (27, 16, 1), -- Produtos vendidos na Venda 27
    (28, 1, 1), (28, 8, 3), (28, 14, 1), (28, 18, 1), -- Produtos vendidos na Venda 28
    (29, 2, 2), (29, 5, 1), (29, 12, 2), (29, 17, 1), -- Produtos vendidos na Venda 29
    (30, 3, 2), (30, 10, 3), (30, 15, 1); -- Produtos vendidos na Venda 30