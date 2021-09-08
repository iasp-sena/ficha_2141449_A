-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_taller_equipo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_taller_equipo` ;

-- -----------------------------------------------------
-- Schema db_taller_equipo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_taller_equipo` DEFAULT CHARACTER SET utf8 ;
USE `db_taller_equipo` ;

-- -----------------------------------------------------
-- Table `db_taller_equipo`.`tipos_documentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_taller_equipo`.`tipos_documentos` ;

CREATE TABLE IF NOT EXISTS `db_taller_equipo`.`tipos_documentos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(10) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_taller_equipo`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_taller_equipo`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `db_taller_equipo`.`usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_documento_id` INT UNSIGNED NOT NULL,
  `numero_documento` VARCHAR(15) NOT NULL,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `nombre_usuario` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_usuarios_tipos_documentos`
    FOREIGN KEY (`tipo_documento_id`)
    REFERENCES `db_taller_equipo`.`tipos_documentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_usuarios_tipos_documentos_idx` ON `db_taller_equipo`.`usuarios` (`tipo_documento_id` ASC);


-- -----------------------------------------------------
-- Table `db_taller_equipo`.`posiciones_jugador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_taller_equipo`.`posiciones_jugador` ;

CREATE TABLE IF NOT EXISTS `db_taller_equipo`.`posiciones_jugador` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_taller_equipo`.`medicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_taller_equipo`.`medicos` ;

CREATE TABLE IF NOT EXISTS `db_taller_equipo`.`medicos` (
  `usuario_id` INT UNSIGNED NOT NULL,
  `especialidad` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  CONSTRAINT `fk_medicos_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `db_taller_equipo`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_medicos_usuarios1_idx` ON `db_taller_equipo`.`medicos` (`usuario_id` ASC);


-- -----------------------------------------------------
-- Table `db_taller_equipo`.`entrenadores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_taller_equipo`.`entrenadores` ;

CREATE TABLE IF NOT EXISTS `db_taller_equipo`.`entrenadores` (
  `usuario_id` INT UNSIGNED NOT NULL,
  `categorias` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  CONSTRAINT `fk_entrenadores_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `db_taller_equipo`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_entrenadores_usuarios1_idx` ON `db_taller_equipo`.`entrenadores` (`usuario_id` ASC);


-- -----------------------------------------------------
-- Table `db_taller_equipo`.`equipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_taller_equipo`.`equipos` ;

CREATE TABLE IF NOT EXISTS `db_taller_equipo`.`equipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `medico_id` INT UNSIGNED NULL,
  `entrenador_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_equipos_medicos1`
    FOREIGN KEY (`medico_id`)
    REFERENCES `db_taller_equipo`.`medicos` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipos_entrenadores1`
    FOREIGN KEY (`entrenador_id`)
    REFERENCES `db_taller_equipo`.`entrenadores` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_equipos_medicos1_idx` ON `db_taller_equipo`.`equipos` (`medico_id` ASC);

CREATE INDEX `fk_equipos_entrenadores1_idx` ON `db_taller_equipo`.`equipos` (`entrenador_id` ASC);


-- -----------------------------------------------------
-- Table `db_taller_equipo`.`jugadores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_taller_equipo`.`jugadores` ;

CREATE TABLE IF NOT EXISTS `db_taller_equipo`.`jugadores` (
  `usuario_id` INT UNSIGNED NOT NULL,
  `numero` INT NOT NULL,
  `posicion_id` INT UNSIGNED NOT NULL,
  `equipo_id` INT NOT NULL,
  PRIMARY KEY (`usuario_id`),
  CONSTRAINT `fk_jugadores_posiciones_jugador1`
    FOREIGN KEY (`posicion_id`)
    REFERENCES `db_taller_equipo`.`posiciones_jugador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jugadores_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `db_taller_equipo`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jugadores_equipos1`
    FOREIGN KEY (`equipo_id`)
    REFERENCES `db_taller_equipo`.`equipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_jugadores_posiciones_jugador1_idx` ON `db_taller_equipo`.`jugadores` (`posicion_id` ASC);

CREATE INDEX `fk_jugadores_usuarios1_idx` ON `db_taller_equipo`.`jugadores` (`usuario_id` ASC);

CREATE INDEX `fk_jugadores_equipos1_idx` ON `db_taller_equipo`.`jugadores` (`equipo_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `db_taller_equipo`.`tipos_documentos`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_taller_equipo`;
INSERT INTO `db_taller_equipo`.`tipos_documentos` (`id`, `sigla`, `tipo`) VALUES (1, 'CC', 'Cédula de ciudadanía');
INSERT INTO `db_taller_equipo`.`tipos_documentos` (`id`, `sigla`, `tipo`) VALUES (2, 'CE', 'Cédula de extranjería');
INSERT INTO `db_taller_equipo`.`tipos_documentos` (`id`, `sigla`, `tipo`) VALUES (3, 'TI', 'Tarjeta de identidad');

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_taller_equipo`.`posiciones_jugador`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_taller_equipo`;
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (1, 'Arquero');
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (2, 'Defensa Central');
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (3, 'Lateral');
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (4, 'Carrilero');
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (5, 'Medio - Contención');
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (6, 'Medio - Armado');
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (7, 'Delantero');
INSERT INTO `db_taller_equipo`.`posiciones_jugador` (`id`, `nombre`) VALUES (8, 'Extermo Derecho');

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_taller_equipo`.`equipos`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_taller_equipo`;
INSERT INTO `db_taller_equipo`.`equipos` (`id`, `nombre`, `medico_id`, `entrenador_id`) VALUES (1, 'Mi equipo', NULL, NULL);

COMMIT;

