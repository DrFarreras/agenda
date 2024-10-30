CREATE DATABASE AgendaFigueres;
USE AgendaFigueres;

-- Tabla USUARI
CREATE TABLE USUARI (
    id_usuari INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    cognom VARCHAR(100) NOT NULL,
    nom_usuari VARCHAR(50) NOT NULL,
    imatge_perfil VARCHAR(255),
    correu_electronic VARCHAR(100) NOT NULL
);

-- Tabla ESDEVENIMENTS
CREATE TABLE ESDEVENIMENTS (
    id_esdev INT AUTO_INCREMENT PRIMARY KEY,
    titol VARCHAR(255) NOT NULL,
    descripcio TEXT,
    data DATE,
    hora TIME,
    latitud FLOAT,
    longitud FLOAT,
    valoracio FLOAT,
    numero_de_visites INT,
    filtrar VARCHAR(50),
    cercar VARCHAR(50)
);

-- Tabla COMENTARI
CREATE TABLE COMENTARI (
    id_coment INT AUTO_INCREMENT PRIMARY KEY,
    contingut TEXT NOT NULL,
    estat VARCHAR(50),
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_usuari INT,
    id_esdev INT,
    FOREIGN KEY (id_usuari) REFERENCES USUARI(id_usuari),
    FOREIGN KEY (id_esdev) REFERENCES ESDEVENIMENTS(id_esdev)
);

-- Tabla ESDEVENIMENT-USUARI (Favoritos)
CREATE TABLE ESDEVENIMENT_USUARI (
    id_favorit INT AUTO_INCREMENT PRIMARY KEY,
    favorit BOOLEAN,
    id_usuari INT,
    id_esdev INT,
    FOREIGN KEY (id_usuari) REFERENCES USUARI(id_usuari),
    FOREIGN KEY (id_esdev) REFERENCES ESDEVENIMENTS(id_esdev)
);

-- Tabla ANUNCI
CREATE TABLE ANUNCI (
    id_anunci INT AUTO_INCREMENT PRIMARY KEY,
    titol VARCHAR(255) NOT NULL,
    descripcio TEXT,
    estat VARCHAR(50),
    categoria VARCHAR(100),
    id_usuari INT,
    FOREIGN KEY (id_usuari) REFERENCES USUARI(id_usuari)
);

-- Tabla IMATGE (Asociada a anuncios y eventos)
CREATE TABLE IMATGE (
    id_imatge INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255),
    id_esdev INT,
    id_anunci INT,
    FOREIGN KEY (id_esdev) REFERENCES ESDEVENIMENTS(id_esdev),
    FOREIGN KEY (id_anunci) REFERENCES ANUNCI(id_anunci)
);

-- Tabla CONSELL DE SOSTENIBILITAT
CREATE TABLE CONSELL_DE_SOSTENIBILITAT (
    id_consell INT AUTO_INCREMENT PRIMARY KEY,
    titol VARCHAR(255),
    descripcio TEXT,
    contingut TEXT,
    etiquetes VARCHAR(255)
);

-- Relación N:N entre USUARI y CONSELL DE SOSTENIBILITAT
CREATE TABLE USUARI_CONSELL (
    id_usuari INT,
    id_consell INT,
    PRIMARY KEY (id_usuari, id_consell),
    FOREIGN KEY (id_usuari) REFERENCES USUARI(id_usuari),
    FOREIGN KEY (id_consell) REFERENCES CONSELL_DE_SOSTENIBILITAT(id_consell)
);
