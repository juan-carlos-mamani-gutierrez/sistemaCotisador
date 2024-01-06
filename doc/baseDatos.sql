USE cotizador;

SELECT * FROM tm_usuario;

CREATE TABLE tm_cliente (
cli_id INT PRIMARY KEY AUTO_INCREMENT,
cli_nom VARCHAR(255),
cli_ruc VARCHAR(20),
cli_telf VARCHAR(20),
cli_email VARCHAR(255),
est int
);

tm_categoriaCREATE TABLE tm_categoria(
cat_id INT PRIMARY KEY AUTO_INCREMENT,
cat_nom VARCHAR(255),
cat_descrip VARCHAR(255),
est int
);

CREATE TABLE tm_producto(
prod_id INT PRIMARY KEY AUTO_INCREMENT,
cat_id INT ,
prod_nom VARCHAR(255),
prod_descrip VARCHAR(255),
prod_precio DECIMAL(10,2),
est int
);
/*TODO tavla contacto*/
CREATE TABLE tm_contacto(
con_id INT PRIMARY KEY AUTO_INCREMENT,
cli_id INT NOT NULL,
car_id INT NOT NULL,
con_nom VARCHAR(255) NOT null,
con_email VARCHAR(255) NOT NULL,
con_telf VARCHAR(20) NOT NULL,
est INT NOT null
);

CREATE TABLE tm_empresa(
emp_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
emp_nom VARCHAR(255),
emp_porcen INT NOT NULL
);

create table tm_cargo(
  car_id int primary key auto_increment ,
  car_nom varchar(50) ,
  est int
   )