CREATE TABLE `movilidad_academica_entrada_temporal` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Clave de identificación de la movilidad',
  `VISITANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del visitante',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` tinyint unsigned NOT NULL COMMENT 'Clave del campus que visita',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica que visita',
  `UE` varchar(45) NOT NULL COMMENT 'Nombre de la unidad emisora',
  `UE_PAIS` varchar(45) NOT NULL COMMENT 'País de la unidad emisora',
  `UE_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unidad emisora',
  `UE_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unidad emisora',
  `TMA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del tipo de movilidad académica (1-Docencia; 2-Estancias Sabáticas; 3-Estancia de Investigación)',
  `ESTADO` tinyint unsigned NOT NULL COMMENT '1 = en espera de aprovación, 2 = rechazado',
  `DATE_SOLICITUD` date NOT NULL COMMENT 'Fecha de solicitud de movilidad.',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`ID`),
  KEY `VISITANTE_ID` (`VISITANTE_ID`), FOREIGN KEY (`VISITANTE_ID`) REFERENCES `academicos_entrada` (`VISITANTE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
