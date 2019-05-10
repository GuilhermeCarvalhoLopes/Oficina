-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mecanica` DEFAULT CHARACTER SET utf8 ;
USE `mecanica` ;

-- -----------------------------------------------------
-- Table `mydb`.`loja_mecanica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mecanica`.`loja_mecanica` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cliente` VARCHAR(85),
  `dt_orcamento` DATETIME,
  `vendedor` VARCHAR(85),
  `descricao` MEDIUMTEXT ,
  `valor_orcado` DOUBLE,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO loja_mecanica VALUES(NULL,  "Guilherme"," 10/02/2019 16:40", "Thiago", "Trocar o Paralama", "820");

select * from loja_mecanica;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
