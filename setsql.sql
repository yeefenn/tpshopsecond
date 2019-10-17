SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `dun` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dun` ;

-- -----------------------------------------------------
-- Table `dun`.`dun_admin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dun`.`dun_admin` (
  `admin_id` INT NOT NULL ,
  `admin_name` VARCHAR(45) NOT NULL ,
  `admin_pwd` VARCHAR(45) NOT NULL ,
  `admin_status` TINYINT NOT NULL COMMENT '0为有权限1为没权限' ,
  `admin_last_time` VARCHAR(45) NOT NULL ,
  `admin_ip` VARCHAR(45) NOT NULL ,
  `admin_time` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`admin_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dun`.`dun_log`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dun`.`dun_log` (
  `log_id` INT NOT NULL ,
  `log_content` VARCHAR(45) NOT NULL ,
  `log_time` VARCHAR(45) NOT NULL ,
  `admin_id` VARCHAR(45) NOT NULL ,
  `admin_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`log_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dun`.`dun_cate`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dun`.`dun_cate` (
  `cate_id` INT NOT NULL ,
  `cate_name` VARCHAR(45) NOT NULL ,
  `cate_order` VARCHAR(45) NOT NULL ,
  `cate_status` VARCHAR(45) NOT NULL ,
  `cate_pid` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`cate_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dun`.`dun_img`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dun`.`dun_img` (
  `img_id` INT NOT NULL ,
  `img_path` VARCHAR(45) NOT NULL ,
  `img_desc` VARCHAR(45) NOT NULL ,
  `img_status` VARCHAR(45) NOT NULL ,
  `img_link` VARCHAR(45) NOT NULL ,
  `img_order` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`img_id`) )
ENGINE = InnoDB;

USE `dun` ;

-- -----------------------------------------------------
-- Placeholder table for view `dun`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dun`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `dun`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dun`.`view1`;
USE `dun`;
;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
