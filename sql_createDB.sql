CREATE DATABASE databasebpruebaback;

USE databasebpruebaback;

CREATE TABLE tickets (
  id int PRIMARY KEY AUTO_INCREMENT,
  usuario varchar(255) NOT NULL,
  fecha_creacion varchar(255) NOT NULL,
  fecha_actaulizacion varchar(255) NOT NULL,
  estatus_id int,
  FOREIGN KEY (estatus_id) REFERENCES estatus(id)
);

CREATE TABLE estatus(
  id int PRIMARY KEY AUTO_INCREMENT,
  descripcion varchar(255) NOT NULL
);

INSERT INTO tickets (id, usuario, fecha_creacion, fecha_actaulizacion,estatus_id) VALUES
(1, 'marcos', '1/11/2022', '2/11/2022',1),
(2, 'juan', '31/10/2022', '5/11/2022',2);

INSERT INTO estatus (id, descripcion) VALUES
(1, 'abierto'),
(2, 'cerrado');