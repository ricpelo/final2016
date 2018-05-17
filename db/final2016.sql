------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS propietarios CASCADE;

CREATE TABLE propietarios
(
    id       bigserial    PRIMARY KEY
  , dni      varchar(9)   NOT NULL UNIQUE
  , nombre   varchar(255)
  , telefono numeric(9)   NOT NULL
);

DROP TABLE IF EXISTS inmuebles CASCADE;

CREATE TABLE inmuebles
(
    id             bigserial    PRIMARY KEY
  , precio         numeric(9,2)
  , habitaciones   smallint
  , banos          smallint
  , lavavajillas   bool
  , garaje         bool
  , trastero       bool
  , propietario_id bigint       NOT NULL REFERENCES propietarios (id)
);
