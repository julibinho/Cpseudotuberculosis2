-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cop` DEFAULT CHARACTER SET latin1 ;
USE `cop` ;

-- -----------------------------------------------------
-- Table `cop`.`cladehits_new`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`cladehits_new` (
  `evalue` VARCHAR(30) NOT NULL,
  `startHit` INT(11) NOT NULL,
  `endHit` INT(11) NOT NULL,
  `sequenceId` VARCHAR(30) NOT NULL,
  `pfam_acc_number` VARCHAR(7) NOT NULL,
  `startdomain` INT(11) NOT NULL,
  `end_domain` INT(11) NOT NULL,
  `clade_model` VARCHAR(30) NOT NULL,
  `pfam_domain_name` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`startHit`, `endHit`, `sequenceId`, `pfam_acc_number`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`coghit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`coghit` (
  `seqID` INT(11) NOT NULL,
  `type` VARCHAR(30) NOT NULL,
  `startPosition` INT(10) NOT NULL,
  `endPosition` INT(10) NOT NULL,
  `Evalue` VARCHAR(30) NOT NULL,
  `bitscore` VARCHAR(30) NOT NULL,
  `CogId` VARCHAR(30) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`sequence_new`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`sequence_new` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sequence` VARCHAR(5000) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12590
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`cogs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`cogs` (
  `CogId` VARCHAR(30) NOT NULL,
  `categorie` VARCHAR(1000) NULL DEFAULT NULL,
  `sequence_new_id_Seq` INT(11) NOT NULL,
  `sequence_new_id` INT(11) NOT NULL,
  PRIMARY KEY (`CogId`),
  INDEX `fk_cogs_sequence_new1_idx` (`sequence_new_id_Seq` ASC),
  INDEX `fk_cogs_sequence_new1_idx1` (`sequence_new_id` ASC),
  CONSTRAINT `fk_cogs_sequence_new1`
    FOREIGN KEY (`sequence_new_id`)
    REFERENCES `cop`.`sequence_new` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`strains`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`strains` (
  `strainID` VARCHAR(30) NOT NULL,
  `biovar` VARCHAR(30) NOT NULL,
  `size` INT(10) NOT NULL,
  `GC` INT(5) NOT NULL,
  `genes` INT(5) NOT NULL,
  `proteins` INT(5) NOT NULL,
  `ClinicalDescription` VARCHAR(5000) NOT NULL,
  `country` VARCHAR(30) NOT NULL,
  `host` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`strainID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`groupe_orthologue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`groupe_orthologue` (
  `gene` VARCHAR(30) NOT NULL,
  `groupe` INT(11) NOT NULL,
  PRIMARY KEY (`groupe`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`genes_new`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`genes_new` (
  `id` VARCHAR(30) NOT NULL DEFAULT '',
  `sequence` VARCHAR(5000) NOT NULL DEFAULT '',
  `strainID` VARCHAR(30) NULL DEFAULT NULL,
  `start` INT(30) NULL DEFAULT NULL,
  `stop` INT(30) NULL DEFAULT NULL,
  `proteinID` VARCHAR(5000) NULL DEFAULT NULL,
  `length` INT(30) NULL DEFAULT NULL,
  `protein_name` VARCHAR(5000) NULL DEFAULT NULL,
  `strand` VARCHAR(10) NULL DEFAULT NULL,
  `sequence_new_id_Seq` INT(11) NOT NULL,
  `groupe_orthologue_groupe` INT(11) NOT NULL,
  `groupe_orthologue_groupe1` INT(11) NOT NULL,
  `sequence_new_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `strainID` (`strainID` ASC),
  INDEX `fk_genes_new_sequence_new1_idx` (`sequence_new_id_Seq` ASC),
  INDEX `fk_genes_new_groupe_orthologue1_idx` (`groupe_orthologue_groupe` ASC),
  INDEX `fk_genes_new_groupe_orthologue1_idx1` (`groupe_orthologue_groupe1` ASC),
  INDEX `fk_genes_new_sequence_new1_idx1` (`sequence_new_id` ASC),
  CONSTRAINT `genes_new_ibfk_2`
    FOREIGN KEY (`strainID`)
    REFERENCES `cop`.`strains` (`strainID`),
  CONSTRAINT `fk_genes_new_groupe_orthologue1`
    FOREIGN KEY (`groupe_orthologue_groupe1`)
    REFERENCES `cop`.`groupe_orthologue` (`groupe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_genes_new_sequence_new1`
    FOREIGN KEY (`sequence_new_id`)
    REFERENCES `cop`.`sequence_new` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`pathogenicity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`pathogenicity` (
  `Putative_genomic_island` VARCHAR(30) NOT NULL,
  `G+C_deviation` VARCHAR(30) NOT NULL,
  `codon_usage_deviation` VARCHAR(30) NOT NULL,
  `Virulence_factors` VARCHAR(30) NOT NULL,
  `Hypothetical_proteins` VARCHAR(30) NOT NULL,
  `Gene_composition` VARCHAR(30) NOT NULL,
  `start` INT(30) NOT NULL,
  `stop` INT(30) NOT NULL,
  `Prediction Score` VARCHAR(30) NOT NULL,
  `strainID` VARCHAR(30) NULL DEFAULT NULL,
  `strains_strainID` VARCHAR(30) NOT NULL,
  INDEX `fk_pathogenicity_strains1_idx` (`strains_strainID` ASC),
  CONSTRAINT `fk_pathogenicity_strains1`
    FOREIGN KEY (`strains_strainID`)
    REFERENCES `cop`.`strains` (`strainID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`pfam`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`pfam` (
  `pfam_acc_number` VARCHAR(7) NULL DEFAULT NULL,
  `pfam_domain_name` VARCHAR(30) NOT NULL,
  `domain_average_length` VARCHAR(30) NOT NULL,
  `clan` VARCHAR(30) NOT NULL,
  `sequence_new_id` INT(11) NOT NULL,
  INDEX `fk_pfam_sequence_new1_idx` (`sequence_new_id` ASC),
  CONSTRAINT `fk_pfam_sequence_new1`
    FOREIGN KEY (`sequence_new_id`)
    REFERENCES `cop`.`sequence_new` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cop`.`tab`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cop`.`tab` (
  `replicon_accession` VARCHAR(30) NOT NULL,
  `start` INT(30) NOT NULL,
  `stop` INT(30) NOT NULL,
  `strand` VARCHAR(30) NOT NULL,
  `gene_id` VARCHAR(30) NOT NULL,
  `locus` VARCHAR(30) NOT NULL,
  `locus_tag` VARCHAR(30) NOT NULL DEFAULT '',
  `proteiID` VARCHAR(30) NOT NULL,
  `length` INT(30) NOT NULL,
  `protein_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`locus_tag`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;