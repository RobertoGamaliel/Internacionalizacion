CREATE TABLE `movilidad_academica_salida_temporal` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Clave de identificación de la movilidad',
  `EMPLEADO_ID` int unsigned NOT NULL COMMENT 'Número de empleado',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` tinyint unsigned NOT NULL COMMENT 'Clave del campus al que pertenece',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica a la que pertenece',
  `UR` varchar(45) NOT NULL COMMENT 'Nombre de la unidad receptora',
  `UR_PAIS` varchar(45) NOT NULL COMMENT 'País de la unidad receptora',
  `UR_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unidad receptora',
  `UR_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unidad receptora',
  `TMA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del tipo de movilidad académica (1-Docencia; 2-Estancias Sabáticas; 3-Estancia de Investigación)',
  `ESTADO` tinyint unsigned NOT NULL COMMENT '1 = en espera de aprovación, 2 = rechazado',
  `DATE_SOLICITUD` date NOT NULL COMMENT 'Fecha de solicitud de movilidad.',
  PRIMARY KEY (`ID`),
  KEY `EMPLEADO_ID` (`EMPLEADO_ID`),
  FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `academicos_salida` (`EMPLEADO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
