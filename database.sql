SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `phmobile` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `phmobile` ;

-- -----------------------------------------------------
-- Table `phmobile`.`neighbors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phmobile`.`neighbors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NULL,
  `last_name` VARCHAR(50) NULL,
  `address` VARCHAR(100) NULL,
  `email` VARCHAR(50) NULL,
  `phone_number` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phmobile`.`guards`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phmobile`.`guards` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `profile` VARCHAR(50) NULL,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phmobile`.`reports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phmobile`.`reports` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(255) NULL,
  `type` VARCHAR(20) NULL,
  `date_report` DATETIME NULL,
  `address` VARCHAR(100) NULL,
  `longitude` VARCHAR(45) NULL,
  `latitude` VARCHAR(45) NULL,
  `neighbor_id` INT NOT NULL,
  `guards_id` INT NOT NULL,
  PRIMARY KEY (`id`, `neighbor_id`),
  INDEX `fk_reports_neighbors1_idx` (`neighbor_id` ASC),
  INDEX `fk_reports_guards1_idx` (`guards_id` ASC),
  CONSTRAINT `fk_reports_neighbors1`
    FOREIGN KEY (`neighbor_id`)
    REFERENCES `phmobile`.`neighbors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reports_guards1`
    FOREIGN KEY (`guards_id`)
    REFERENCES `phmobile`.`guards` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phmobile`.`locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phmobile`.`locations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `address` VARCHAR(100) NULL,
  `longitude` VARCHAR(45) NULL,
  `latitude` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phmobile`.`suggestions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phmobile`.`suggestions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date_suggestion` DATETIME NULL,
  `description` TEXT NULL,
  `neighbor_id` INT NOT NULL,
  PRIMARY KEY (`id`, `neighbor_id`),
  INDEX `fk_suggestions_neighbors1_idx` (`neighbor_id` ASC),
  CONSTRAINT `fk_suggestions_neighbors1`
    FOREIGN KEY (`neighbor_id`)
    REFERENCES `phmobile`.`neighbors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phmobile`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phmobile`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `description` VARCHAR(255) NULL,
  `date_event` DATETIME NULL,
  `location_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_events_locations1_idx` (`location_id` ASC),
  CONSTRAINT `fk_events_locations1`
    FOREIGN KEY (`location_id`)
    REFERENCES `phmobile`.`locations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phmobile`.`participants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phmobile`.`participants` (
  `neighbors_id` INT NOT NULL,
  `events_id` INT NOT NULL,
  PRIMARY KEY (`neighbors_id`, `events_id`),
  INDEX `fk_neighbors_has_events_events1_idx` (`events_id` ASC),
  INDEX `fk_neighbors_has_events_neighbors1_idx` (`neighbors_id` ASC),
  CONSTRAINT `fk_neighbors_has_events_neighbors1`
    FOREIGN KEY (`neighbors_id`)
    REFERENCES `phmobile`.`neighbors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_neighbors_has_events_events1`
    FOREIGN KEY (`events_id`)
    REFERENCES `phmobile`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
