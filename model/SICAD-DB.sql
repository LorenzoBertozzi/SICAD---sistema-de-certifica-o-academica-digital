-- Criação do schema
CREATE SCHEMA IF NOT EXISTS SICAD;
USE SICAD;

-- Tabela de Usuário
CREATE TABLE Usuario (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20) NULL,
    data_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    telefone VARCHAR(20) NULL,
    assinatura BLOB NULL
);

-- Tabela de Modalidade (deve vir antes de Atividade)
CREATE TABLE Modalidade (
    codigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome ENUM('presencial', 'online', 'hibrido') NOT NULL
);

-- Tabela de Evento
CREATE TABLE Evento (
    codigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT,
    nome VARCHAR(100),
    data_inicio DATE,
    data_fim DATE,
    responsavel_evento VARCHAR(255)
);

-- Tabela de Atividade
CREATE TABLE Atividade (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    informacoes_atividade TEXT,
    carga_horaria INT,
    nome VARCHAR(100),
    palestrante VARCHAR(100),
    status_atividade ENUM('confirmada', 'cancelada', 'realizada'),
    num_participantes INT,
    fk_Evento_codigo INT NOT NULL,
    fk_Modalidade_codigo INT NOT NULL,
    FOREIGN KEY (fk_Evento_codigo) REFERENCES Evento(codigo),
    FOREIGN KEY (fk_Modalidade_codigo) REFERENCES Modalidade(codigo)
);

-- Tabela de API de Pagamento
CREATE TABLE API_pagamento (
    id_proprietario INT NOT NULL PRIMARY KEY,
    valor_total_em_caixa DECIMAL(10,2),
    secret_key VARCHAR(255),
    cpf_cnpj VARCHAR(255),
    num_conta_corrente VARCHAR(30),
    nome_proprietario VARCHAR(255),
    telefone_proprietario VARCHAR(30)
);

-- Tabela de Tipo de Pagamento
CREATE TABLE Pagamento_tipo_pagamento (
    codigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    taxa_emolumentos DECIMAL(10,2),
    descricao ENUM('credito', 'debito', 'pix', 'boleto'),
    fk_API_pagamento_id_proprietario INT,
    FOREIGN KEY (fk_API_pagamento_id_proprietario) REFERENCES API_pagamento(id_proprietario)
);

-- Tabela realiza (relacionamento entre Usuário e Pagamento)
CREATE TABLE Realiza (
    fk_Usuario_ID INT NOT NULL,
    fk_Pagamento_tipo_pagamento_codigo INT NOT NULL,
    valor_pago DECIMAL(10,2),
    data_vencimento DATE,
    data_do_pagamento DATE,
    status_ ENUM('pendente', 'pago', 'cancelado', 'estornado') NOT NULL,
    FOREIGN KEY (fk_Usuario_ID) REFERENCES Usuario(ID),
    FOREIGN KEY (fk_Pagamento_tipo_pagamento_codigo) REFERENCES Pagamento_tipo_pagamento(codigo)
);

-- Tabela Gerencia (relacionamento entre Usuário e Evento)
CREATE TABLE Gerencia (
    fk_Usuario_ID INT NOT NULL,
    fk_Evento_codigo INT NOT NULL,
    FOREIGN KEY (fk_Usuario_ID) REFERENCES Usuario(ID),
    FOREIGN KEY (fk_Evento_codigo) REFERENCES Evento(codigo)
);

-- Tabela Participa (relacionamento entre Usuário e Atividade)
CREATE TABLE Participa (
    fk_Usuario_ID INT NOT NULL,
    fk_Atividade_ID INT NOT NULL,
    FOREIGN KEY (fk_Usuario_ID) REFERENCES Usuario(ID),
    FOREIGN KEY (fk_Atividade_ID) REFERENCES Atividade(ID)
);

-- Tabela de Certificados
CREATE TABLE Certificado (
    codigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    data_emissao DATE,
    texto_certificado TEXT,
    descricao TEXT,
    carga_horaria INT,
    template BLOB,
    qr_code BLOB,
    fk_Usuario_ID INT NOT NULL,
    fk_Atividade_ID INT NOT NULL,
    FOREIGN KEY (fk_Usuario_ID) REFERENCES Usuario(ID),
    FOREIGN KEY (fk_Atividade_ID) REFERENCES Atividade(ID)
);

-- Tabela de Tipos de usuário
CREATE TABLE Tipo (
    codigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao ENUM('participante', 'organizador', 'administrador_site')
);

-- Tabela e_do (relacionamento entre Tipo e Usuário)
CREATE TABLE e_do (
    fk_Tipo_codigo INT NOT NULL,
    fk_Usuario_ID INT NOT NULL,
    FOREIGN KEY (fk_Tipo_codigo) REFERENCES Tipo(codigo),
    FOREIGN KEY (fk_Usuario_ID) REFERENCES Usuario(ID)
);

-- Tabela Assinatura (relacionada a um usuário)
CREATE TABLE Assinatura (
    id_assinatura INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_Usuario_ID INT NOT NULL,
    FOREIGN KEY (fk_Usuario_ID) REFERENCES Usuario(ID)
);

-- Tabela de Arquivos CSV (importação de dados)
CREATE TABLE Arquivo_CSV (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_atividade VARCHAR(100),
    num_participantes_atividade INT,
    num_participantes_evento INT,
    num_certificados_emitidos INT,
    palestrante_atividade VARCHAR(100),
    carga_horaria_atividade INT,
    nome_evento VARCHAR(100)
);

-- Tabela importa (relacionamento entre usuário e arquivos importados)
CREATE TABLE Importa (
    fk_Usuario_ID INT NOT NULL,
    fk_Arquivo_CSV_id INT NOT NULL,
    FOREIGN KEY (fk_Usuario_ID) REFERENCES Usuario(ID),
    FOREIGN KEY (fk_Arquivo_CSV_id) REFERENCES Arquivo_CSV(id)
);


-- inserts gerados por IA

-- Usuários
INSERT INTO Usuario (ID, nome, email, senha, cpf, data_cadastro, telefone, assinatura)
VALUES 
(NULL, 'Ana Silva', 'ana@example.com', 'senha123', NULL, '2024-01-01', '31988889999', NULL),
(NULL, 'Bruno Costa', 'bruno@example.com', 'senha456', '98765432100', '2024-01-05', '21977778888', NULL);

-- Modalidades
INSERT INTO Modalidade (nome)
VALUES 
('presencial'),
('online'),
('hibrido');

-- Evento
INSERT INTO Evento (descricao, nome, data_inicio, data_fim, responsavel_evento)
VALUES 
('Feira de tecnologia e inovação', 'TechFest 2024', '2024-06-10', '2024-06-15', 'Ana Silva');

-- Atividade
INSERT INTO Atividade (informacoes_atividade, carga_horaria, nome, palestrante, status_atividade, num_participantes, fk_Evento_codigo, fk_Modalidade_codigo)
VALUES 
('Palestra sobre IA', 2, 'Inteligência Artificial na Prática', 'Dr. Pedro Rocha', 'confirmada', 50, 1, 1),
('Oficina de robótica', 4, 'Robótica com Arduino', 'Profa. Carla Mendes', 'confirmada', 30, 1, 3);

-- Tipos de usuário
INSERT INTO Tipo (descricao)
VALUES 
('participante'),
('organizador'),
('administrador_site');

-- Relação e_do (usuário com tipo)
INSERT INTO e_do (fk_Tipo_codigo, fk_Usuario_ID)
VALUES 
(1, 1),
(2, 2);

-- API de pagamento
INSERT INTO API_pagamento (id_proprietario, valor_total_em_caixa, secret_key, cpf_cnpj, num_conta_corrente, nome_proprietario, telefone_proprietario)
VALUES 
(1, 10000.00, 'sk_test_12345', '12345678901', '00012345-6', 'Ana Silva', '31988889999');

-- Tipos de pagamento
INSERT INTO Pagamento_tipo_pagamento (taxa_emolumentos, descricao, fk_API_pagamento_id_proprietario)
VALUES 
(5.00, 'credito', 1),
(2.00, 'pix', 1);

-- Realiza (pagamento feito por usuário)
INSERT INTO Realiza (fk_Usuario_ID, fk_Pagamento_tipo_pagamento_codigo, valor_pago, data_vencimento, data_do_pagamento, status_)
VALUES 
(1, 1, 100.00, '2024-06-01', '2024-06-01', 'pago'),
(2, 2, 50.00, '2024-06-01', NULL, 'pendente');

-- Participação em atividades
INSERT INTO Participa (fk_Usuario_ID, fk_Atividade_ID)
VALUES 
(1, 1),
(2, 2);

-- Certificados emitidos
INSERT INTO Certificado (data_emissao, texto_certificado, descricao, carga_horaria, template, qr_code, fk_Usuario_ID, fk_Atividade_ID)
VALUES 
('2024-06-16', 'Certificamos que Ana Silva participou da atividade.', 'Participação na palestra de IA', 2, NULL, NULL, 1, 1);

-- Arquivo CSV
INSERT INTO Arquivo_CSV (nome_atividade, num_participantes_atividade, num_participantes_evento, num_certificados_emitidos, palestrante_atividade, carga_horaria_atividade, nome_evento)
VALUES 
('Inteligência Artificial na Prática', 50, 200, 50, 'Dr. Pedro Rocha', 2, 'TechFest 2024');

-- Importa (relação usuário/arquivo)
INSERT INTO Importa (fk_Usuario_ID, fk_Arquivo_CSV_id)
VALUES 
(1, 1);
