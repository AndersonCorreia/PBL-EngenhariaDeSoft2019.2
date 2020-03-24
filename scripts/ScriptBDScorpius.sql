-- MySQL Script generated by MySQL Workbench
-- Fri Dec 20 18:55:19 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema scorpius
-- ----------------------------------------------------
DROP DATABASE IF EXISTS `scorpius`;-- apagando o banco para inserir novamente
CREATE SCHEMA IF NOT EXISTS `scorpius` DEFAULT CHARACTER SET utf8 ;
USE `scorpius` ;
SET GLOBAL max_allowed_packet=8388608;
-- -----------------------------------------------------
-- Table `scorpius`.`exposicao`
-- era bom saber se uma atividade diferenciada pode ocorrer em apenas 1 turno
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`exposicao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) NOT NULL,
  `tipo_evento` ENUM('atividade diferenciada', 'atividade permanente') NOT NULL,
  `tema_evento` ENUM('astronomia', 'biodiversidade', 'origem do humano') DEFAULT NULL,
  `turno` ENUM('diurno', 'noturno') DEFAULT "diurno",
  `descricao` VARCHAR(300) NOT NULL,
  `quantidade_inscritos` INT  DEFAULT NULL,
  `data_inicial` DATE NOT NULL,
  `data_final` DATE DEFAULT NULL,
  `imagem` MEDIUMBLOB DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `titulo_UNIQUE` (`titulo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`cidade_UF`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`cidade_UF` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(30) NOT NULL,
  `UF` CHAR(2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `cidade_UF_UNIQUE` (`cidade`, `UF`) 
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`instituicao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `responsavel` VARCHAR(40) NOT NULL,
  `endereco` VARCHAR(50) NOT NULL,
  `numero` VARCHAR(6) NOT NULL,
  `cep` CHAR(9) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `tipo_instituicao` ENUM('Federal', 'Distrital', 'Estadual', 'Municipal', 'Privada', 'Filantrópica') NOT NULL,
  `cidade_UF_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_instituicao_cidade_UF_idx` (`cidade_UF_ID` ASC),
  UNIQUE INDEX `instituicao_UNIQUE` (`nome`, `endereco`),
  CONSTRAINT `fk_instituicao_cidade_UF`
    FOREIGN KEY (`cidade_UF_ID`)
    REFERENCES `scorpius`.`cidade_UF` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`tipo_usuario` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `nome_UNIQUE` (`tipo` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`usuario` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  `CPF` CHAR(11) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `ativo` TINYINT(1) DEFAULT  0, 
  `tipo_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_usuario_tipo_usuario_idx` (`tipo_usuario_ID` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  CONSTRAINT `fk_usuario_tipo_usuario`
    FOREIGN KEY (`tipo_usuario_ID`)
    REFERENCES `scorpius`.`tipo_usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`email_verificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`email_verificacao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_email` VARCHAR(40) NOT NULL,
  `token` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_email_verficacao_usuario1` (`usuario_email` ASC),
  CONSTRAINT `fk_email_verficacao_usuario1`
    FOREIGN KEY (`usuario_email`)
    REFERENCES `scorpius`.`usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
  )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`professor_instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`professor_instituicao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cont_Agendamento` SMALLINT NOT NULL,
  `cont_agendamento_cancelado` SMALLINT NOT NULL,
  `ativo` TINYINT NOT NULL,
  `instituicao_ID` INT UNSIGNED NOT NULL,
  `usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_professor_instituicao_instituicao1_idx` (`instituicao_ID` ASC),
  INDEX `fk_professor_instituicao_usuario1_idx` (`usuario_ID` ASC),
  UNIQUE INDEX `professor_instituicao_UNIQUE` (`instituicao_ID`, `usuario_ID`),
  CONSTRAINT `fk_professor_instituicao_instituicao1`
    FOREIGN KEY (`instituicao_ID`)
    REFERENCES `scorpius`.`instituicao` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_instituicao_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`turma` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  `ano_escolar` VARCHAR(12) NOT NULL,
  `ensino` ENUM('Ensino Fundamental', 'Ensino Médio', 'Ensino Técnico', 'Ensino Superior') NOT NULL,
  `professor_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_turma_professor_idx` (`professor_ID` ASC),
  CONSTRAINT `fk_turma_professor1`
    FOREIGN KEY (`professor_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`visita` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_visita` DATE NOT NULL,
  `turno` ENUM('manhã', 'tarde', 'noite') NOT NULL,
  `status` ENUM('realizada', 'não realizada', 'instituição ausente', 'atividade diferenciada') NOT NULL DEFAULT 'não realizada',
  `agendamento_institucional_ID` INT UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_visita_agendamento_institucional_ID1_idx` (`agendamento_institucional_ID` ASC),
  UNIQUE INDEX `Data_Turno_UNIQUE` (`data_visita` , `turno`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`agendamento_institucional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`agendamento_institucional` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `visita` INT UNSIGNED NOT NULL,
  `observacao` VARCHAR(100) DEFAULT NULL,
  `status` ENUM('pendente', 'cancelado pelo funcionario', 'cancelado pelo usuario', 'confirmado', 'lista de espera') NOT NULL,
  `turma_ID` INT UNSIGNED,
  `professor_instituicao_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_agendamento_institucional_turma1_idx` (`turma_ID`),
  CONSTRAINT `fk_agendamento_institucional_turma1`
    FOREIGN KEY (`turma_ID`)
    REFERENCES `scorpius`.`turma` (`ID`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  INDEX `fk_agendamento_institucional__professor_instituicao_ID1_idx` (`professor_instituicao_ID`),
  CONSTRAINT `fk_agendamento_institucional_professor_instituicao_ID1`
    FOREIGN KEY (`professor_instituicao_ID`)
    REFERENCES `scorpius`.`professor_instituicao` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  INDEX `fk_Visita_idx` (`visita`),
  CONSTRAINT `fk_agendamento_institucional_visita1`
    FOREIGN KEY (`visita`)
    REFERENCES `scorpius`.`visita` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE `scorpius`.`visita` 
ADD CONSTRAINT `fk_visita_agendamento_institucional_ID1`
    FOREIGN KEY (`agendamento_institucional_ID`)
    REFERENCES `scorpius`.`agendamento_institucional` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

-- -----------------------------------------------------
-- Table `scorpius`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`agendamento` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `visita` INT UNSIGNED NOT NULL,
  `observacao` VARCHAR(100) DEFAULT NULL,
  `status` ENUM('pendente', 'cancelado pelo funcionario', 'cancelado pelo usuario', 'confirmado') NOT NULL,
  `usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_agendamento_usuario1_idx` (`usuario_ID` ASC),
  CONSTRAINT `fk_agendamento_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  INDEX `fk_Visita_idx` (`visita` ASC),
  CONSTRAINT `fk_agendamento_visita1`
    FOREIGN KEY (`visita`)
    REFERENCES `scorpius`.`visita` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE VIEW IF NOT EXISTS visita_institucional
AS SELECT v.ID AS visitaID, v.data_visita AS data, turno, v.status AS visitaStatus,
ai.ID AS agendamentoID, observacao, ai.status AS agendamentoStatus,
t.ID AS turmaID, t.nome AS turma, ano_escolar, ensino,
i.ID AS instituicaoID, endereco, i.nome AS instituicao, responsavel, numero, cep,
tipo_instituicao, i.telefone AS instituicaoTelefone, cidade, UF,
u.ID AS usuarioID, u.nome AS usuario, u.telefone AS usuarioTelefone
FROM visita v INNER JOIN agendamento_institucional ai ON v.ID = ai.visita
LEFT JOIN turma t ON ai.turma_ID = t.ID 
INNER JOIN professor_instituicao pi ON ai.professor_instituicao_ID = pi.ID 
INNER JOIN usuario u ON u.ID = pi.usuario_ID
INNER JOIN instituicao i ON i.ID = pi.instituicao_ID
INNER JOIN cidade_UF cuf ON cuf.ID = i.cidade_UF_ID;

CREATE VIEW IF NOT EXISTS visita_individual
AS SELECT v.ID AS visitaID, v.data_visita AS data, turno, v.status AS visitaStatus,
a.ID AS agendamentoID, observacao, a.status AS agendamentoStatus,
u.ID AS usuarioID, u.nome AS usuario, u.telefone AS usuarioTelefone
FROM visita v INNER JOIN agendamento a ON v.ID = a.visita
INNER JOIN usuario u ON a.usuario_ID = u.ID;
-- -----------------------------------------------------
-- Table `scorpius`.`permissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`permissao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permissao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`)
  )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`permissao_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`permissao_tipo` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permissao_ID` INT UNSIGNED NOT NULL,
  `tipo_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_permissao_tipo_usuario1_idx` (`tipo_usuario_ID` ASC),
  INDEX `fk_permissao1_idx` (`permissao_ID`),
  UNIQUE INDEX `permissao_tipo_UNIQUE` (`permissao_ID`, `tipo_usuario_ID`),
  CONSTRAINT `fk_permissao_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_ID`)
    REFERENCES `scorpius`.`tipo_usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissao1`
    FOREIGN KEY (`permissao_ID`)
    REFERENCES `scorpius`.`permissao` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`exposicao_agendamento_institucional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`exposicao_agendamento_institucional` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `exposicao_ID` INT UNSIGNED NOT NULL,
  `agendamento_institucional_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_exposicao_agendamento_institucional_exposicao1_idx` (`exposicao_ID` ASC),
  INDEX `fk_exposicao_agendamento_institucional_agendamento1_idx` (`agendamento_institucional_ID` ASC),
  CONSTRAINT `fk_exposicao_agendamento_institucional_exposicao1`
    FOREIGN KEY (`exposicao_ID`)
    REFERENCES `scorpius`.`exposicao` (`ID`)
    ON DELETE CASCADE 
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exposicao_agendamento_institucional_agendamento1`
    FOREIGN KEY (`agendamento_institucional_ID`)
    REFERENCES `scorpius`.`agendamento_institucional` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`exposicao_agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`exposicao_agendamento` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `exposicao_ID` INT UNSIGNED NOT NULL,
  `agendamento_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_exposicao_agendamento_exposicao1_idx` (`exposicao_ID` ASC),
  INDEX `fk_exposicao_agendamento_agendamento1_idx` (`agendamento_ID` ASC),
  CONSTRAINT `fk_exposicao_agendamento_exposicao1`
    FOREIGN KEY (`exposicao_ID`)
    REFERENCES `scorpius`.`exposicao` (`ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exposicao_agendamento_agendamento1`
    FOREIGN KEY (`agendamento_ID`)
    REFERENCES `scorpius`.`agendamento` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`aluno` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `idade` INT NOT NULL,
  `turma_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_aluno_turma1_idx` (`turma_ID` ASC),
  CONSTRAINT `fk_aluno_turma1`
    FOREIGN KEY (`turma_ID`)
    REFERENCES `scorpius`.`turma` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`responsavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`responsavel` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cargo` VARCHAR(50) NOT NULL,
  `status_Checkin` ENUM('compareceu', 'não compareceu') NOT NULL,
  `agendamento_institucional_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_responsavel_agendamento_institucional1_idx` (`agendamento_institucional_ID` ASC),
  CONSTRAINT `fk_responsavel_agendamento_institucional1`
    FOREIGN KEY (`agendamento_institucional_ID`)
    REFERENCES `scorpius`.`agendamento_institucional` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`visitante_institucional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`visitante_institucional` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `status_Checkin` ENUM('compareceu', 'não compareceu') DEFAULT 'não compareceu' NOT NULL,
  `idade` INT NOT NULL,
  `agendamento_institucional_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_visitante_institucional_agendamento_institucional1_idx` (`agendamento_institucional_ID` ASC),
  CONSTRAINT `fk_visitante_institucional_agendamento_institucional1`
    FOREIGN KEY (`agendamento_institucional_ID`)
    REFERENCES `scorpius`.`agendamento_institucional` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`visitante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`visitante` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `status_Checkin` ENUM('compareceu', 'não compareceu') NOT NULL,
  `idade` INT NOT NULL,
  `RG` VARCHAR(15) NOT NULL,
  `agendamento_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_visitante_agendamento1_idx` (`agendamento_ID` ASC),
  CONSTRAINT `fk_visitante_agendamento1`
    FOREIGN KEY (`agendamento_ID`)
    REFERENCES `scorpius`.`agendamento` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`estagiario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`estagiario` (
  `hasDemanda` TINYINT(1) DEFAULT  0,
  `guia_matricula` MEDIUMBLOB DEFAULT NULL,
  `observacao` VARCHAR(80) DEFAULT NULL,
  `usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`usuario_ID`),
  CONSTRAINT `fk_estagiario_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`horario_estagiario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`horario_estagiario` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `dia_semana` VARCHAR(45) NOT NULL,
  `turno` VARCHAR(45) NOT NULL,
  `estagiario_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_horario_estagiario_estagiario1_idx` (`estagiario_usuario_ID` ASC),
  CONSTRAINT `fk_horario_estagiario_estagiario1`
    FOREIGN KEY (`estagiario_usuario_ID`)
    REFERENCES `scorpius`.`estagiario` (`usuario_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`proposta_horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`proposta_horario` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `dia_semana` VARCHAR(45) NOT NULL,
  `turno` VARCHAR(45) NOT NULL,
  `estagiario_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_proposta_horario_estagiario1_idx` (`estagiario_usuario_ID` ASC),
  CONSTRAINT `fk_proposta_horario_estagiario1`
    FOREIGN KEY (`estagiario_usuario_ID`)
    REFERENCES `scorpius`.`estagiario` (`usuario_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`Acoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`Acoes` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `atividade` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `atividade_UNIQUE` (`atividade` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`Notificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`notificacao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `gerada_em` DATETIME NOT NULL,
  `mensagem` VARCHAR(100) NOT NULL,
  `usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_Notificacao_usuario1_idx` (`usuario_ID` ASC),
  CONSTRAINT `fk_Notificacao_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`log` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `datahora` DATETIME NOT NULL,
  `acoes_ID` INT UNSIGNED NOT NULL,
  `usuario_made_ID` INT UNSIGNED NOT NULL,
  `usuario_affected_ID` INT UNSIGNED NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_log_Acoes1_idx` (`acoes_ID` ASC),
  INDEX `fk_log_usuario1_idx` (`usuario_made_ID` ASC),
  INDEX `fk_log_usuario2_idx` (`usuario_affected_ID` ASC),
  CONSTRAINT `fk_log_acoes1`
    FOREIGN KEY (`acoes_ID`)
    REFERENCES `scorpius`.`acoes` (`ID`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_log_usuario1`
    FOREIGN KEY (`usuario_made_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_log_usuario2`
    FOREIGN KEY (`usuario_affected_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`backup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`backup` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` INT UNSIGNED NOT NULL,
  `frequencia` ENUM('diario', 'semanal', 'mensal') NOT NULL,
  `diretorio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `id_usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `id_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scorpius`.`freq_backup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`freq_backup` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_backup` INT UNSIGNED NOT NULL,
  `valor` DATETIME NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `id_backup_idx` (`id_backup` ASC),
  CONSTRAINT `id_backup`
    FOREIGN KEY (`id_backup`)
    REFERENCES `scorpius`.`backup` (`ID`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
