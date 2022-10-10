CREATE TABLE `intercambio_estudiantil_entrada_temporal` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id unic',
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante (matricula)',
  `ESTUDIANTE` varchar(45) NOT NULL COMMENT 'Nombre estudiante',
  `ESTUDIANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 0-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 0-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 0-No)',
  `PERIODO_ID` tinyint unsigned NOT NULL COMMENT '',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` mediumint unsigned NOT NULL COMMENT 'Clave del campus',
  `CAMPUS_DESC` varchar(45) NOT NULL,
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica',
  `UNIDAD` varchar(45) NOT NULL,
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT 'Clave del nivel de estudios (1-Licenciatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
  `PROGRAMA_ID` smallint unsigned NOT NULL COMMENT 'Clave del programa educativo',
  `PROGRAMA_DESC` varchar(45) NOT NULL COMMENT 'Programa educativo',
  `AREA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del área de conocimiento del programa educativo',
  `AREA` varchar(45) NOT NULL COMMENT 'Área de conocimiento del programa educativo',
  `UNID` varchar(45) NOT NULL COMMENT 'Nombre de la unidad receptora/emisora',
  `UNID_PAIS` varchar(45) NOT NULL COMMENT 'País de la unidad receptora/emisora',
  `UNID_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unidad receptora/emisora',
  `UNID_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unidad receptora/emisora',
  `FINAN_ID` tinyint unsigned NOT NULL COMMENT 'Recibio financiamiento (1-Sí; 0-No)',
  `FINAN_VAL` mediumint unsigned NOT NULL,
  `DATE_START` date NOT NULL COMMENT 'Fecha de inicio del intercambio ',
  `DATE_END` date NOT NULL COMMENT 'Fecha de término del intercambio',
  `DATE_SOLICITUD` date NOT NULL COMMENT 'Fecha de solicitud de movilidad.',
  `ESTADO` tinyint NOT NULL COMMENT 'Estado de solicitud de movilidad. 1= solicitado, 2= rechazado',
  
   PRIMARY KEY (`ID`)) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
