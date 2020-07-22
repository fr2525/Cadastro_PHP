-----------------------------------------------------------------------------

CREATE DATABASE if not exists db_cadastro default character set utf8 default collate utf8_general_ci;


CREATE TABLE if not exists tb_clientes (
  id      int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome      varchar(40) NOT NULL,
  email  varchar(50) NOT NULL UNIQUE,
  telefone  varchar(15) NOT NULL
) default character set utf8 default collate utf8_general_ci;

