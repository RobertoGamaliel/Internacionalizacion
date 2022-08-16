CREATE TABLE `movilidad_academica_salida` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Clave de identificación de la movilidad',
  `EMPLEADO_ID` int unsigned NOT NULL COMMENT 'Número de empleado',
  `PERIODO_ID` mediumint unsigned NOT NULL COMMENT 'Clave del periodo escolar',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` tinyint unsigned NOT NULL COMMENT 'Clave del campus que visita',
  `CAMPUS_DESC` varchar(45) NOT NULL COMMENT 'Campus que visita',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica que visita',
  `UNIDAD` varchar(45) NOT NULL COMMENT 'Unidad académica que visita',
  `UR` varchar(45) NOT NULL COMMENT 'Nombre de la unidad receptora',
  `UR_PAIS` varchar(45) NOT NULL COMMENT 'País de la unidad receptora',
  `UR_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unidad receptora',
  `UR_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unidad receptora',
  `TMA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del tipo de movilidad académica (1-Docencia; 2-Estancias Sabáticas; 3-Estancia de Investigación)',
  `TMA` varchar(45) NOT NULL COMMENT 'Tipo de movilidad académica (Docencia; Estancias Sabáticas; Estancia de Investigación)',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMPLEADO_ID_UNIQUE` (`ID`),
  KEY `EMPLEADO_ID` (`EMPLEADO_ID`),
  CONSTRAINT `movilidad_academica_ibfk_1` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `academicos_salida` (`EMPLEADO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;