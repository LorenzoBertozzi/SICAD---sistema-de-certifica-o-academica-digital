SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`API_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`API_pagamento` (
  `id_proprietario` INT NOT NULL AUTO_INCREMENT,
  `telefone_proprietario` VARCHAR(20) NULL,
  `valor_total_caixa` DECIMAL(10,2) NULL,
  `secret_key` VARCHAR(255) NULL,
  `email_proprietario` VARCHAR(100) NULL,
  `cpf_cnpj` VARCHAR(20) NULL,
  `num_conta_corrente` VARCHAR(20) NULL,
  PRIMARY KEY (`id_proprietario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `assinatura_usuario` BLOB NULL,
  `telefone_usuario` VARCHAR(20) NULL,
  `email_usuario` VARCHAR(100) NOT NULL,
  `nome_usuario` VARCHAR(100) NOT NULL,
  `senha_usuario` VARCHAR(255) NOT NULL,
  `cpf_usuario` VARCHAR(14) NOT NULL,
  `data_cadastro_usuario` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `email_usuario_UNIQUE` (`email_usuario` ASC),
  UNIQUE INDEX `cpf_usuario_UNIQUE` (`cpf_usuario` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pagamento` (
  `id_pagamento` INT NOT NULL AUTO_INCREMENT,
  `taxa_pagamento` DECIMAL(5,2) NOT NULL,
  `data_pagamento` DATETIME NOT NULL,
  `data_vencimento_pagamento` DATETIME NOT NULL,
  `status_pagamento` ENUM('pendente', 'pago', 'cancelado', 'estornado') NOT NULL,
  `valor_pagamento` DECIMAL(10,2) NOT NULL,
  `tipo_pagamento` ENUM('credito', 'debito', 'pix', 'boleto') NOT NULL,
  `API_pagamento_id_proprietario` INT NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_pagamento`),
  INDEX `fk_pagamento_API_pagamento1_idx` (`API_pagamento_id_proprietario` ASC),
  INDEX `fk_pagamento_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_pagamento_API_pagamento1`
    FOREIGN KEY (`API_pagamento_id_proprietario`)
    REFERENCES `mydb`.`API_pagamento` (`id_proprietario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `mydb`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`participante` (
  `instituicao_participante` VARCHAR(100) NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_participante_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`usuario` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`organizador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`organizador` (
  `departamento_organizador` VARCHAR(45) NULL,
  `nivel_acesso_organizador` ENUM('admin', 'organizador', 'assistente') NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_organizador_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`usuario` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evento` (
  `id_evento` INT NOT NULL AUTO_INCREMENT,
  `nome_evento` VARCHAR(100) NOT NULL,
  `data_inicio_evento` DATETIME NOT NULL,
  `data_fim_evento` DATETIME NOT NULL,
  `descricao_evento` TEXT NULL,
  `id_organizador_evento` INT NOT NULL,
  PRIMARY KEY (`id_evento`),
  INDEX `fk_evento_organizador1_idx` (`id_organizador_evento` ASC),
  CONSTRAINT `fk_evento_organizador1`
    FOREIGN KEY (`id_organizador_evento`)
    REFERENCES `mydb`.`organizador` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`modalidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`modalidade` (
  `id_modalidade` INT NOT NULL AUTO_INCREMENT,
  `nome_modalidade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_modalidade`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`atividade` (
  `id_atividade` INT NOT NULL AUTO_INCREMENT,
  `nome_atividade` VARCHAR(100) NOT NULL,
  `status_atividade` ENUM('planejada', 'confirmada', 'cancelada', 'realizada') NOT NULL,
  `ministrante_atividade` VARCHAR(100) NULL,
  `descricao_atividade` TEXT NULL,
  `id_evento` INT NOT NULL,
  `id_modalidade` INT NOT NULL,
  PRIMARY KEY (`id_atividade`),
  INDEX `fk_atividade_evento1_idx` (`id_evento` ASC),
  INDEX `fk_atividade_modalidade1_idx` (`id_modalidade` ASC),
  CONSTRAINT `fk_atividade_evento1`
    FOREIGN KEY (`id_evento`)
    REFERENCES `mydb`.`evento` (`id_evento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_atividade_modalidade1`
    FOREIGN KEY (`id_modalidade`)
    REFERENCES `mydb`.`modalidade` (`id_modalidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`assinatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`assinatura` (
  `id_assinatura` INT NOT NULL AUTO_INCREMENT,
  `assinatura_organizador` BLOB NOT NULL,
  `assinatura_participante` BLOB NULL,
  `assinatura_ministrante` BLOB NULL,
  `data_assinatura` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_assinatura`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`certificado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`certificado` (
  `id_certificado` INT NOT NULL AUTO_INCREMENT,
  `carga_horaria_certificado` INT NULL,
  `texto_certificado` TEXT NULL,
  `data_emissao_certificado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `template_certificado` BLOB NULL,
  `qr_code_certificado` BLOB NOT NULL,
  `id_usuario` INT NOT NULL,
  `id_atividade` INT NOT NULL,
  `id_assinatura` INT NOT NULL,
  PRIMARY KEY (`id_certificado`),
  INDEX `fk_certificado_participante1_idx` (`id_usuario` ASC),
  INDEX `fk_certificado_atividade1_idx` (`id_atividade` ASC),
  INDEX `fk_certificado_assinatura1_idx` (`id_assinatura` ASC),
  CONSTRAINT `fk_certificado_participante1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`participante` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_certificado_atividade1`
    FOREIGN KEY (`id_atividade`)
    REFERENCES `mydb`.`atividade` (`id_atividade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_certificado_assinatura1`
    FOREIGN KEY (`id_assinatura`)
    REFERENCES `mydb`.`assinatura` (`id_assinatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`participante_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`participante_evento` (
  `evento_id_evento` INT NOT NULL,
  `participante_id_usuario` INT NOT NULL,
  PRIMARY KEY (`evento_id_evento`, `participante_id_usuario`),
  INDEX `fk_evento_has_participante_participante1_idx` (`participante_id_usuario` ASC),
  INDEX `fk_evento_has_participante_evento1_idx` (`evento_id_evento` ASC),
  CONSTRAINT `fk_evento_has_participante_evento1`
    FOREIGN KEY (`evento_id_evento`)
    REFERENCES `mydb`.`evento` (`id_evento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_evento_has_participante_participante1`
    FOREIGN KEY (`participante_id_usuario`)
    REFERENCES `mydb`.`participante` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`atividade_participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`atividade_participante` (
  `atividade_id_atividade` INT NOT NULL,
  `participante_id_usuario` INT NOT NULL,
  `presenca` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`atividade_id_atividade`, `participante_id_usuario`),
  INDEX `fk_atividade_has_participante_participante1_idx` (`participante_id_usuario` ASC),
  INDEX `fk_atividade_has_participante_atividade1_idx` (`atividade_id_atividade` ASC),
  CONSTRAINT `fk_atividade_has_participante_atividade1`
    FOREIGN KEY (`atividade_id_atividade`)
    REFERENCES `mydb`.`atividade` (`id_atividade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_atividade_has_participante_participante1`
    FOREIGN KEY (`participante_id_usuario`)
    REFERENCES `mydb`.`participante` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;