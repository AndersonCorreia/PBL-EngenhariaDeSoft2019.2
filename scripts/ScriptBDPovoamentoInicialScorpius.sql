-- INSERT do tipos de usuarios --
INSERT INTO tipo_usuario (nome) VALUES ('visitante');
INSERT INTO tipo_usuario (nome) VALUES ('institucional');
INSERT INTO tipo_usuario (nome) VALUES ('estagiario');
INSERT INTO tipo_usuario (nome) VALUES ('funcionario');
INSERT INTO tipo_usuario (nome) VALUES ('adm');

-- INSERT das permissões padrões dos  tipos de usuario --
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('realizar check-in',3);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('realizar check-in',4);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('gerenciamento de visitas',4);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('designar horários para estagiarios',4);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('relatorio dos agendamentos',4);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('cadastrar e modificar atividades',4);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('criar usuarios',5);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('gerenciar usuarios',5);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('ver confiabilidade das Instituições',5);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('ver log de atividade',5);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('realizar backup',5);
INSERT INTO permissao (permissao, tipo_usuario_ID) VALUES ('gerenciar permissões',5);