-- Step: 01
-- ***************************************************************
-- Doel : Maak een nieuwe database aan met de naam Achtbaan-2408c
-- ***************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           13-11-2024      Arjan de Ruijter    Achtbanen van 
--                                                  Europa
-- ***************************************************************

-- Verwijder database Achtbaan-2408c
DROP DATABASE IF EXISTS `Achtbaan-2408c`;

-- Maak een nieuwe database aan Achtbaan-2408c
CREATE DATABASE `Achtbaan-2408c`;

-- Gebruik database Achtbaan-2408c
USE `Achtbaan-2408c`;

-- Step: 02
-- ***************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam AchtbanenVanEuropa
-- ***************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           13-11-2024      Arjan de Ruijter    Tabel Achtbanen van 
--                                                  Europa
-- ***************************************************************

CREATE TABLE AchtbanenVanEuropa
(
     Id                 SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Naam               VARCHAR(50)                 NOT NULL
    ,Pretpark           VARCHAR(50)                 NOT NULL
    ,Land               VARCHAR(50)                 NOT NULL
    ,Topsnelheid        TINYINT         UNSIGNED    NOT NULL
    ,Hoogte             TINYINT         UNSIGNED    NOT NULL
    ,IsActief           BIT                         NOT NULL    DEFAULT 1
    ,Opmerking          VARCHAR(255)                    NULL    DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                 NOT NULL
    ,DatumGewijzigd     DATETIME(6)                 NOT NULL
    ,CONSTRAINT  PK_AchtbanenVanEuropa_Id    PRIMARY KEY    CLUSTERED(Id)
) ENGINE=InnoDB;
