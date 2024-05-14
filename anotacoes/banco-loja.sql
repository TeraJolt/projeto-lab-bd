CREATE TABLE tb_cliente(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    endereco VARCHAR(100),
    numero VARCHAR(10),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    estado CHAR(2),
    email VARCHAR(100),
    cpf_cnpj VARCHAR(14),
    rg VARCHAR(9),
    telefone VARCHAR(15),
    celular VARCHAR(15),
    data_nasc DATE,
    salario NUMERIC(12,2)
) engine INNODB;

CREATE TABLE tb_forma_pagto(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100)
) engine INNODB;

CREATE TABLE tb_vendedor(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100),
	endereco VARCHAR(150),
	cidade VARCHAR(50),
	estado VARCHAR(2),
	celular VARCHAR(15),
	email VARCHAR(160),
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
    id_cliente INTEGER REFERENCES tb_cliente(id),
    observacao VARCHAR(100),
    forma_pagto INTEGER REFERENCES tb_forma_pagto(id),
    prazo_entrega VARCHAR(20),
    id_vendedor INTEGER REFERENCES tb_vendedor(id)
) engine INNODB;

CREATE TABLE tb_itens_pedido(
    id_pedido INTEGER REFERENCES tb_pedido(id),
    id_produto INTEGER REFERENCES tb_produto(id),
    qtde INTEGER,
    id_item INTEGER AUTO_INCREMENT PRIMARY KEY
) engine INNODB;
