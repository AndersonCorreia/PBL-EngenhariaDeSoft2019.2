-- MySQL Script generated by MySQL Workbench
-- Fri Dec 20 18:55:19 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema scorpius
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema scorpius
-- ----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `scorpius` DEFAULT CHARACTER SET utf8 ;
USE `scorpius` ;

-- -----------------------------------------------------
-- Table `scorpius`.`exposicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`exposicao` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(50) NOT NULL,
  `Tipo_Evento` ENUM('atividade diferenciada', 'atividade permanente') NOT NULL,
  `Descricao` VARCHAR(300) NOT NULL,
  `Quantidade_Inscritos` INT NOT NULL,
  `Data_Inicial` DATE NOT NULL,
  `Data_Final` DATE NULL DEFAULT NULL,
  `Link_Imagem` MEDIUMBLOB NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `Titulo_UNIQUE` (`Titulo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`cidade_UF`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`cidade_UF` (
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(30) NOT NULL,
  `UF` CHAR(2) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`instituicao` (
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
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
  `nome` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
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
-- Table `scorpius`.`professor_instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`professor_instituicao` (
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
  `cont_Agendamento` SMALLINT NOT NULL,
  `cont_agendamento_cancelado` SMALLINT NOT NULL,
  `ativo` TINYINT NOT NULL,
  `instituicao_ID` INT UNSIGNED NOT NULL,
  `usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_professor_instituicao_instituicao1_idx` (`instituicao_ID` ASC),
  INDEX `fk_professor_instituicao_usuario1_idx` (`usuario_ID` ASC),
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
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(10) NOT NULL,
  `Ano_Escolar` VARCHAR(12) NOT NULL,
  `Ensino` ENUM('Ensino Fundamental', 'Ensino Médio', 'Ensino Técnico', 'Ensino Superior') NOT NULL,
  `professor_instituicao_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_turma_professor_instituicao1_idx` (`professor_instituicao_ID` ASC),
  CONSTRAINT `fk_turma_professor_instituicao1`
    FOREIGN KEY (`professor_instituicao_ID`)
    REFERENCES `scorpius`.`professor_instituicao` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`agendamento` (
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
  `Turma` INT NOT NULL,
  `Visita` INT NOT NULL,
  `Data_Agendamento` DATETIME NOT NULL,
  `Exposicao` INT NOT NULL,
  `Status` ENUM('pendente', 'cancelado', 'confirmado') NOT NULL,
  `turma_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_agendamento_turma1_idx` (`turma_ID` ASC),
  CONSTRAINT `fk_agendamento_turma1`
    FOREIGN KEY (`turma_ID`)
    REFERENCES `scorpius`.`turma` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`visita` (
  `ID` INT UNSIGNED NOT NULL,
  `Data_Visita` DATE NOT NULL,
  `Turno` ENUM('manha', 'tarde', 'noite') NOT NULL,
  `Status` ENUM('realizada', 'não realizada', 'instituição ausente') NOT NULL,
  `agendamento_ID` INT UNSIGNED NOT NULL,
  `ID_acompanhante` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_visita_agendamento1_idx` (`agendamento_ID` ASC),
  INDEX `fk_visita_usuario1_idx` (`ID_acompanhante` ASC),
  CONSTRAINT `fk_visita_agendamento1`
    FOREIGN KEY (`agendamento_ID`)
    REFERENCES `scorpius`.`agendamento` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_visita_usuario1`
    FOREIGN KEY (`ID_acompanhante`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`permissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`permissao` (
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
  `permissao` VARCHAR(40) NOT NULL,
  `tipo_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_permissao_tipo_usuario1_idx` (`tipo_usuario_ID` ASC),
  UNIQUE INDEX `permissao_UNIQUE` (`permissao`, `tipo_usuario_ID`),
  CONSTRAINT `fk_permissao_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_ID`)
    REFERENCES `scorpius`.`tipo_usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`exposicao_agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`exposicao_agendamento` (
  `ID` INT UNSIGNED NOT NULL,
  `exposicao` INT NOT NULL,
  `agendamento` INT NOT NULL,
  `exposicao_ID` INT NOT NULL,
  `agendamento_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_exposicao_agendamento_exposicao1_idx` (`exposicao_ID` ASC),
  INDEX `fk_exposicao_agendamento_agendamento1_idx` (`agendamento_ID` ASC),
  CONSTRAINT `fk_exposicao_agendamento_exposicao1`
    FOREIGN KEY (`exposicao_ID`)
    REFERENCES `scorpius`.`exposicao` (`ID`)
    ON DELETE NO ACTION
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
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
  `Turma` INT NOT NULL,
  `Nome` VARCHAR(50) NOT NULL,
  `Idade` INT NOT NULL,
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
-- Table `scorpius`.`visitante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`visitante` (
  `ID` INT UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT,
  `isAluno` TINYINT(1) NOT NULL,
  `Nome` VARCHAR(50) NOT NULL,
  `Status_Checkin` ENUM('compareceu', 'não compareceu') NOT NULL,
  `Idade` INT NOT NULL,
  `visita_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_visitante_visita1_idx` (`visita_ID` ASC),
  CONSTRAINT `fk_visitante_visita1`
    FOREIGN KEY (`visita_ID`)
    REFERENCES `scorpius`.`visita` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`estagiario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`estagiario` (
  `matricula` VARCHAR(45) NOT NULL,
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
  `dia_semana` VARCHAR(45) NOT NULL,
  `turno` VARCHAR(45) NOT NULL,
  `estagiario_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`dia_semana`, `turno`, `estagiario_usuario_ID`),
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
  `dia_semana` VARCHAR(45) NOT NULL,
  `turno` VARCHAR(45) NOT NULL,
  `estagiario_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`dia_semana`, `turno`, `estagiario_usuario_ID`),
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
  `idAcoes` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `atividade` TINYTEXT NOT NULL,
  PRIMARY KEY (`idAcoes`),
  UNIQUE INDEX `atividade_UNIQUE` (`atividade` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`LOG`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`LOG` (
  `idLOG` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `datahora` DATETIME(1) NOT NULL,
  `Acoes_idAcoes` INT UNSIGNED NOT NULL,
  `usuario_made_ID` INT UNSIGNED NOT NULL,
  `usuario_affected_ID1` INT UNSIGNED NULL,
  PRIMARY KEY (`idLOG`),
  INDEX `fk_LOG_Acoes1_idx` (`Acoes_idAcoes` ASC),
  INDEX `fk_LOG_usuario1_idx` (`usuario_made_ID` ASC),
  INDEX `fk_LOG_usuario2_idx` (`usuario_affected_ID1` ASC),
  CONSTRAINT `fk_LOG_Acoes1`
    FOREIGN KEY (`Acoes_idAcoes`)
    REFERENCES `scorpius`.`Acoes` (`idAcoes`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_LOG_usuario1`
    FOREIGN KEY (`usuario_made_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_LOG_usuario2`
    FOREIGN KEY (`usuario_affected_ID1`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scorpius`.`Notificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scorpius`.`Notificacao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Gerada_em` DATETIME NOT NULL,
  `Mensagem` VARCHAR(100) NOT NULL,
  `usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_Notificacao_usuario1_idx` (`usuario_ID` ASC),
  CONSTRAINT `fk_Notificacao_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `scorpius`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
