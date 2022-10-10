CREATE TABLE `intercambio_estudiantil_entrada` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Clave de identificación del intercambio',
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante visitante',
  `ESTUDIANTE` varchar(100) NOT NULL COMMENT 'Nombre del estudiante',
  `ESTUDIANTE_APELLIDO1` varchar(100) NOT NULL COMMENT 'Apellido 1 del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(100) NOT NULL COMMENT 'apellido 2 del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-Otro)',
  `SEXO` varchar(25) NOT NULL COMMENT 'sexo',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  `PERIODO_ID` mediumint unsigned NOT NULL COMMENT 'Clave del periodo escolar',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` mediumint unsigned NOT NULL COMMENT 'Clave del campus',
  `CAMPUS_DESC` varchar(45) NOT NULL COMMENT 'Campus',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica',
  `UNIDAD` varchar(45) NOT NULL COMMENT 'Unidad académica',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT 'Clave del nivel de estudios (1-Licenciatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
  `NIVEL` varchar(45) NOT NULL COMMENT 'Nombre del nivel de estudios(1-Licenciatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
  `PROGRAMA_ID` smallint unsigned NOT NULL COMMENT 'Clave del programa educativo de llegada',
  `PROGRAMA_DESC` varchar(45) NOT NULL COMMENT 'Programa educativo de llegada',
  `AREA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del área de conocimiento del programa educativo de llegada',
  `AREA` varchar(45) NOT NULL COMMENT 'Área de conocimiento del programa educativo de llegada',
  `UE` varchar(45) NOT NULL COMMENT 'Nombre de la unidad emisora',
  `UE_PAIS` varchar(45) NOT NULL COMMENT 'País de la unidad emisora',
  `UE_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unidad emisora',
  `UE_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unidad emisora',
  `FINAN_ID` tinyint unsigned NOT NULL COMMENT 'Recibio financiamiento (1-Sí; 2-No)',
  `FINAN_VAL` mediumint unsigned NOT NULL,
  `DATE_START` date NOT NULL COMMENT 'Fecha de inicio del intercambio ',
  `DATE_END` date NOT NULL COMMENT 'Fecha de término del intercambio',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ID`),
  KEY `ESTUDIANTE_ID` (`ESTUDIANTE_ID`),
  CONSTRAINT `intercambio_estudiantil_ibfk_2` FOREIGN KEY (`ESTUDIANTE_ID`) REFERENCES `perfil_estudiantes_entrada` (`VISITANTE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
