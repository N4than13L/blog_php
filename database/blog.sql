-- MySQL Workbench Synchronization
-- Generated: 2024-07-05 10:01
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: natha

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `blog`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `blog`.`entradas` 
DROP FOREIGN KEY `fk_entradas_categorias1`;

ALTER TABLE `blog`.`usuarios` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `id` `id` INT(255) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `apellido` `apellidos` VARCHAR(45) NOT NULL ;

ALTER TABLE `blog`.`categorias` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `id` `id` INT(255) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `blog`.`entradas` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `usuarios_id` `usuarios_id` INT(255) NOT NULL ,
CHANGE COLUMN `categorias_id` `categorias_id` INT(255) NOT NULL ;

ALTER TABLE `blog`.`entradas` 
DROP FOREIGN KEY `fk_entradas_usuarios`;

ALTER TABLE `blog`.`entradas` ADD CONSTRAINT `fk_entradas_usuarios`
  FOREIGN KEY (`usuarios_id`)
  REFERENCES `blog`.`usuarios` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_entradas_categorias1`
  FOREIGN KEY (`categorias_id`)
  REFERENCES `blog`.`categorias` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
