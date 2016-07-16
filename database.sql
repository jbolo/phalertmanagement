create table locales(
  id             int(10) not null auto_increment ,
  descripcion    varchar(255),
  direccion      varchar(255),
  posicion_gps   varchar(100),
  created_at     date,
  updated_at     date,
  PRIMARY KEY(id)
);
create table eventos(
  id          int(10) not null auto_increment,
  nombre      varchar(100),
  descripcion varchar(255),
  fecha       date,
  hora        time,
  created_at     date,
  updated_at     date,
  local_id    int(10),
  PRIMARY KEY (id),
  FOREIGN KEY (local_id) REFERENCES locales(id)
);
