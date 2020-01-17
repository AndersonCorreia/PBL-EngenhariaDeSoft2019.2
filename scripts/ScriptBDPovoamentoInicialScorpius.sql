-- INSERT do tipos de usuarios --
INSERT INTO tipo_usuario (ID, nome) VALUES (10, 'adm');
INSERT INTO tipo_usuario (ID, nome) VALUES (8, 'estagiario');
INSERT INTO tipo_usuario (ID, nome) VALUES (9, 'funcionario');
INSERT INTO tipo_usuario (ID, nome) VALUES (7, 'institucional');
INSERT INTO tipo_usuario (ID, nome) VALUES (6, 'visitante');

-- Insert dos usuarios --
INSERT INTO usuario (ID, nome, email, senha, CPF, telefone, tipo_usuario_ID) VALUES
(601, 'Francisco Hugo Rezende', 'franciscohr@maquinas.com.br', 'fhr601', '92546317599', '75994628820', 6);
INSERT INTO usuario (ID, nome, email, senha, CPF, telefone, tipo_usuario_ID) VALUES
(701, 'Cristiane Benedita Almada', 'crisada@vinhas.fot.br', 'cba701', '25073799526', '75996462376', 7);
INSERT INTO usuario (ID, nome, email, senha, CPF, telefone, tipo_usuario_ID) VALUES
(801, 'Caio Giovanni Gonçalves', 'caiogoncalves@ideia.com.br', 'cgg801', '99559754580', '75994068404', 8);
INSERT INTO usuario (nome, email, senha, CPF, telefone, tipo_usuario_ID) VALUES                -- segundo estagiario --
('Felipe Benjamin Monteiro', 'felipe-6@vente.com.br', 'fbm802', '95244698559', '75983373121', 8);
INSERT INTO usuario (ID, nome, email, senha, CPF, telefone, tipo_usuario_ID) VALUES
(901, 'Isabelly Bruna Souza', 'isabellybrunarocha@rizzo.com', 'ibr901', '01218158549', '75982143156', 9);
INSERT INTO usuario (ID, nome, email, senha, CPF, telefone, tipo_usuario_ID) VALUES
(1001, 'Marcelo Mateus Augusto da Rocha', 'mateusrocha@tema.com.br', 'mmar1001', '08212660559', '75995055492', 10);

-- INSERT das permissões padrões dos  tipos de usuario --
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('realizar check-in',8);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('realizar check-in',9);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('gerenciamento de visitas',9);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('designar horários para estagiarios',9);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('relatorio dos agendamentos',9);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('cadastrar e modificar atividades',9);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('criar usuarios',10);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('gerenciar usuarios',10);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('ver confiabilidade das Instituições',10);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('ver log de atividade',10);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('realizar backup',10);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('gerenciar permissões',10);

-- INSERT das cidades --
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (1, 'Salvador', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (2,'Feira de Santana', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (3,'Bonfim de Feira ', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (4,'Jaguara', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (5,'Governador João Durval Carneir', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (6,'Humildes', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (7,'Jaíba', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (8,'Maria Quitéria', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (9,'Matinha', 'BA');
INSERT INTO cidade_uf (ID, cidade, UF) VALUES (10,'Tiquaruçu', 'BA');

-- INSERT das Instituições --
INSERT INTO instituicao (ID, nome, endereco, numero, cep, telefone, tipo_Instituicao, cidade_UF_ID) VALUES
(201, 'Universidade Estadual de Feira de Santana', 'Av. Transnordestina', 's/n', '44036-900', '7531618000', 'Estadual', 2);
INSERT INTO instituicao (ID, nome, endereco, numero, cep, telefone, tipo_Instituicao, cidade_UF_ID) VALUES
(202, 'Colégio Modelo Luis Eduardo Magalhães', 'Rua Vasco Filho', '15', '44003-246', '7532237666', 'Estadual', 2);
INSERT INTO instituicao (ID, nome, endereco, numero, cep, telefone, tipo_Instituicao, cidade_UF_ID) VALUES
(203, 'Instituto Federal Bahia - Campus Feira de Santana', 'Rodovia BR 324 - Km 102', 's/n', '44135-000', '7532216475', 'Federal', 2);
INSERT INTO instituicao (ID, nome, endereco, numero, cep, telefone, tipo_Instituicao, cidade_UF_ID) VALUES
(204, 'Escola Municipal Ana Brandoa', 'Rotatória da Avenida João Durval Carneiro', 's/n', '44001-001', '7536224055', 'Municipal', 2);
INSERT INTO instituicao (ID, nome, endereco, numero, cep, telefone, tipo_Instituicao, cidade_UF_ID) VALUES
(205, 'Colégio Helyos', 'Avenida Eduardo Fróes da Mota', '1100', '44078-015', '7536254455', 'Privada', 2);

-- INSERT dos estagiários --
INSERT INTO estagiario (matricula, usuario_ID) VALUES('cgg1', 801);
INSERT INTO estagiario (matricula, usuario_ID) VALUES('fbm1', 802);
