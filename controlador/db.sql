create table presentacion (
id_presentacion int not null auto_increment primary key,
nb_presentacion varchar(50) not null unique
);

create table medicamento (
id_medicamento int not null auto_increment primary key,
nombre varchar(50) not null,
descripcion text not null,
precio numeric(10) not null,
existencia int not null,
imagen varchar(35) not null,
id_presentacion int not null,
foreign key (id_presentacion) references presentacion (id_presentacion),
unique (nombre, id_presentacion),
check (existencia >= 0)
);

create table usuarios (
id_usuario int not null auto_increment primary key,
nombre varchar(50) not null,
apellido varchar(50) not null,
correo varchar(35) not null unique,
password varchar(35) not null
);

create table carrito (
id_usuario int not null,
id_medicamento int not null,
primary key (id_usuario, id_medicamento),
foreign key (id_usuario) references usuarios (id_usuario),
foreign key (id_medicamento) references medicamento (id_medicamento)
);

create table compra(
id_compra int not null auto_increment primary key,
fecha date not null,
id_usuario int not null,
foreign key (id_usuario) references usuarios (id_usuario)
);


create table detalle_compra(
id_detalle int not null auto_increment primary key,
id_compra int not null,
id_medicamento int not null,
cantidad int not null,
unique (id_compra,id_medicamento),
foreign key (id_compra) references compra (id_compra),
foreign key (id_medicamento) references medicamento (id_medicamento)
);