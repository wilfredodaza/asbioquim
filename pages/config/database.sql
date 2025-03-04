-- MySQL Script generated by MySQL Workbench
-- Fri Dec 17 21:02:07 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gestion_lab
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gestion_lab
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gestionlabs__gestionlabs` DEFAULT CHARACTER SET utf8 ;
USE `gestionlabs__gestionlabs` ;

-- -----------------------------------------------------
-- Table `gestion_lab`.`banner`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`banner` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(60) NOT NULL,
  `description` TEXT NOT NULL,
  `img` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`about_us`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`about_us` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `img` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`detail_about_us`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`detail_about_us` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(60) NOT NULL,
  `icon` VARCHAR(60) NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`services` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `icon` VARCHAR(60) NOT NULL,
  `img` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`detail_services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`detail_services` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `services_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_detail_services_services_idx` (`services_id` ASC),
  CONSTRAINT `fk_detail_services_services`
    FOREIGN KEY (`services_id`)
    REFERENCES `gestionlabs__gestionlabs`.`services` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`accreditations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`accreditations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(60) NOT NULL,
  `description` TEXT NOT NULL,
  `document` VARCHAR(60) NOT NULL,
  `img` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`contacto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description_redes` TEXT NOT NULL,
  `direction` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(12) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`redes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`redes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `icon` VARCHAR(60) NOT NULL,
  `link` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion_lab`.`general`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestionlabs__gestionlabs`.`general` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `logo` VARCHAR(60) NOT NULL,
  `keywords` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
