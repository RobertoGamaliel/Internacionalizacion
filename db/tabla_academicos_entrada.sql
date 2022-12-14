CREATE TABLE `academicos_entrada` (
  `PERIODO_ID` int unsigned unsigned NOT NULL COMMENT 'Clave del periodo escolar',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` tinyint unsigned NOT NULL COMMENT 'Clave del campus que visita',
  `CAMPUS` varchar(45) NOT NULL COMMENT 'Campus que visita',
  `UNIDAD_ID` int unsigned unsigned NOT NULL COMMENT 'Clave de la unidad académica que visita',
  `UNIDAD` varchar(45) NOT NULL COMMENT 'Unidad académica que visita',
  `VISITANTE_ID` int unsigned unsigned NOT NULL COMMENT 'Clave de identificación del visitante',
  `VISITANTE` varchar(45) NOT NULL COMMENT 'Nombre del visitante',
  `VISITANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del visitante',
  `VISITANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del visitante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino)',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT ' Clave del nivel de estudios (1-Licencatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
  `NIVEL` varchar(45) NOT NULL COMMENT 'Nivel de estudios (Licenciatura, Especialidad, Maestría, Doctorado)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  `UE` varchar(45) NOT NULL COMMENT 'Nombre de la unida emisora',
  `UE_PAIS` varchar(45) NOT NULL COMMENT 'País de la unida emisora',
  `UE_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unida emisora',
  `UE_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unida emisora',
  `TMA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del tipo de movilidad académica (1-Docencia; 2-Estancias Sabáticas; 3-Estancia de Investigación)',
  `TMA` varchar(45) NOT NULL COMMENT 'Tipo de movilidad académica (Docencia; Estancias Sabáticas; Estancia de Investigación)',
  
  PRIMARY KEY (`VISITANTE_ID`),
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`VISITANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
