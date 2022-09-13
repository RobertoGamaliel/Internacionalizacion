create database inter;

Use inter;

CREATE TABLE `perfil_academicos_entrada` (
  `VISITANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del academico visitante',
  `VISITANTE` varchar(100) NOT NULL COMMENT 'Nombre estudiante visitante',
  `VISITANTE_APELLIDO1` varchar(100) NOT NULL COMMENT 'Apellido paterno del academico visitante',
  `VISITANTE_APELLIDO2` varchar(100) NOT NULL COMMENT 'Apellido materno del academico visitante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `SEXO` varchar(10) NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'SEXO',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`VISITANTE_ID`), 
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`VISITANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `perfil_academicos_salida` (
  `EMPLEADO_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante',
  `EMPLEADO` varchar(100) NOT NULL COMMENT 'Nombre estudiante visitante',
  `EMPLEADO_APELLIDO1` varchar(100) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `EMPLEADO_APELLIDO2` varchar(100) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `SEXO` varchar(10) NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'SEXO',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`EMPLEADO_ID`),
  UNIQUE KEY `EMPLEADO_ID_UNIQUE` (`EMPLEADO_ID`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `perfil_estudiantes_entrada` (
  `VISITANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante visitante',
  `VISITANTE` varchar(100) NOT NULL COMMENT 'Nombre estudiante visitante',
  `VISITANTE_APELLIDO1` varchar(100) NOT NULL COMMENT 'Apellido paterno del estudiante visitante',
  `VISITANTE_APELLIDO2` varchar(100) NOT NULL COMMENT 'Apellido materno del estudiante visitante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `SEXO` varchar(10) NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'SEXO',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`VISITANTE_ID`),
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`VISITANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `perfil_estudiantes_salida` (
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante',
  `ESTUDIANTE` varchar(100) NOT NULL COMMENT 'Nombre estudiante visitante',
  `ESTUDIANTE_APELLIDO1` varchar(100) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(100) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `SEXO` varchar(10) NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'SEXO',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`ESTUDIANTE_ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ESTUDIANTE_ID`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `academicos_entrada` (
  `VISITANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del visitante',
  `VISITANTE` varchar(45) NOT NULL COMMENT 'Nombre del visitante',
  `VISITANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del visitante',
  `VISITANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del visitante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino)',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT ' Clave del nivel de estudios (1-Licencatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`VISITANTE_ID`),
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`VISITANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `academicos_salida` (
  `EMPLEADO_ID` int unsigned NOT NULL COMMENT 'Número de empleado',
  `EMPLEADO` varchar(45) NOT NULL COMMENT 'Nombre del empleado',
  `EMPLEADO_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del empleado',
  `EMPLEADO_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del empleado',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-Otro)',
  PRIMARY KEY (`EMPLEADO_ID`),
  UNIQUE KEY `EMPLEADO_ID_UNIQUE` (`EMPLEADO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `estudiantes_entrada` (
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante visitante',
  `ESTUDIANTE` varchar(45) NOT NULL COMMENT 'Nombre estudiante',
  `ESTUDIANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `CAMPUS_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `UNIDAD_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `PROGRAMA_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `PROGRAMA_DESC` varchar(60) NOT NULL COMMENT 'desconocido',
  `AREA_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `AREA` varchar(80) NOT NULL COMMENT 'desconocido',
  PRIMARY KEY (`ESTUDIANTE_ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ESTUDIANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `estudiantes_salida` (
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante (matricula)',
  `ESTUDIANTE` varchar(45) NOT NULL COMMENT 'Nombre estudiante',
  `ESTUDIANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`ESTUDIANTE_ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ESTUDIANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
   PRIMARY KEY (`ID`)) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `intercambio_estudiantil_entrada` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Clave de identificación del intercambio',
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante visitante',
  `PERIODO_ID` mediumint unsigned NOT NULL COMMENT 'Clave del periodo escolar',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` mediumint unsigned NOT NULL COMMENT 'Clave del campus',
  `CAMPUS_DESC` varchar(45) NOT NULL COMMENT 'Campus',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica',
  `UNIDAD` varchar(45) NOT NULL COMMENT 'Unidad académica',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT 'Clave del nivel de estudios (1-Licenciatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
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
  CONSTRAINT `intercambio_estudiantil_ibfk_2` FOREIGN KEY (`ESTUDIANTE_ID`) REFERENCES `estudiantes_entrada` (`ESTUDIANTE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `intercambio_estudiantil_salida_temporal` (
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante (matricula)',
  `ESTUDIANTE` varchar(45) NOT NULL COMMENT 'Nombre estudiante',
  `ESTUDIANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 0-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 0-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 0-No)',
  `PERIODO_ID` mediumint unsigned NOT NULL COMMENT 'Clave del periodo escolar',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` mediumint unsigned NOT NULL COMMENT 'Clave del campus',
  `CAMPUS_DESC` varchar(45) NOT NULL COMMENT 'Campus',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica',
  `UNIDAD` varchar(45) NOT NULL COMMENT 'Unidad académica',
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
  PRIMARY KEY (`ESTUDIANTE_ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ESTUDIANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `intercambio_estudiantil_salida` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Clave de identificación del intercambio',
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante (matricula)',
  `PERIODO_ID` mediumint unsigned NOT NULL COMMENT 'Clave del periodo escolar',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` mediumint unsigned NOT NULL COMMENT 'Clave del campus',
  `CAMPUS_DESC` varchar(45) NOT NULL COMMENT 'Campus',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica',
  `UNIDAD` varchar(45) NOT NULL COMMENT 'Unidad académica',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT 'Clave del nivel de estudios (1-Licenciatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
  `PROGRAMA_ID` smallint unsigned NOT NULL COMMENT 'Clave del programa educativo',
  `PROGRAMA_DESC` varchar(45) NOT NULL COMMENT 'Programa educativo',
  `AREA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del área de conocimiento del programa educativo',
  `AREA` varchar(45) NOT NULL COMMENT 'Área de conocimiento del programa educativo',
  `UR` varchar(45) NOT NULL COMMENT 'Nombre de la unidad receptora',
  `UR_PAIS` varchar(45) NOT NULL COMMENT 'País de la unidad receptora',
  `UR_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unidad receptora',
  `UR_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unidad receptora',
  `FINAN_ID` tinyint unsigned NOT NULL COMMENT 'Recibio financiamiento (1-Sí; 2-No)',
  `FINAN_VAL` mediumint unsigned NOT NULL,
  `DATE_START` date NOT NULL COMMENT 'Fecha de inicio del intercambio ',
  `DATE_END` date NOT NULL COMMENT 'Fecha de término del intercambio',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ID`),
  KEY `ESTUDIANTE_ID` (`ESTUDIANTE_ID`),
  CONSTRAINT `intercambio_estudiantil_ibfk_1` FOREIGN KEY (`ESTUDIANTE_ID`) REFERENCES `estudiantes_salida` (`ESTUDIANTE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  PRIMARY KEY (`ID`),
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`ID`),
  KEY `VISITANTE_ID` (`VISITANTE_ID`), FOREIGN KEY (`VISITANTE_ID`) REFERENCES `academicos_entrada` (`VISITANTE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `movilidad_academica_entrada` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Clave de identificación de la movilidad',
  `VISITANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del visitante',
  `PERIODO_ID` mediumint unsigned NOT NULL COMMENT 'Clave del periodo escolar',
  `PERIODO` varchar(45) NOT NULL COMMENT 'Periodo escolar',
  `CAMPUS_ID` tinyint unsigned NOT NULL COMMENT 'Clave del campus que visita',
  `CAMPUS_DESC` varchar(45) NOT NULL COMMENT 'Campus que visita',
  `UNIDAD_ID` smallint unsigned NOT NULL COMMENT 'Clave de la unidad académica que visita',
  `UNIDAD` varchar(45) NOT NULL COMMENT 'Unidad académica que visita',
  `UE` varchar(45) NOT NULL COMMENT 'Nombre de la unidad emisora',
  `UE_PAIS` varchar(45) NOT NULL COMMENT 'País de la unidad emisora',
  `UE_ENTIDAD` varchar(45) NOT NULL COMMENT 'Entidad de la unidad emisora',
  `UE_IDIOMA` varchar(45) NOT NULL COMMENT 'Idioma de la unidad emisora',
  `TMA_ID` tinyint unsigned NOT NULL COMMENT 'Clave del tipo de movilidad académica (1-Docencia; 2-Estancias Sabáticas; 3-Estancia de Investigación)',
  `TMA` varchar(45) NOT NULL COMMENT 'Tipo de movilidad académica (Docencia; Estancias Sabáticas; Estancia de Investigación)',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`ID`),
  KEY `VISITANTE_ID` (`VISITANTE_ID`),
  CONSTRAINT `movilidad_academica_ibfk_2` FOREIGN KEY (`VISITANTE_ID`) REFERENCES `academicos_entrada` (`VISITANTE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
  PRIMARY KEY (`ID`),
  KEY `EMPLEADO_ID` (`EMPLEADO_ID`),
  FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `academicos_salida` (`EMPLEADO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `unidades_academicas` (
  `ID` mediumint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Número de empleado',
  `CIUDAD` tinyint unsigned NOT NULL COMMENT 'Nombre del empleado',
  `CLAVE` tinyint unsigned NOT NULL COMMENT 'Apellido paterno del empleado',
  `Nombre` varchar(80) NOT NULL COMMENT 'Apellido materno del empleado',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `apellido_paterno` varchar(45) ,
  `apellido_materno` varchar(45)  NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint NOT NULL,
  `matricula` int unsigned NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

//hecho por cesar xd
