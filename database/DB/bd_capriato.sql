create database capriato;
use capriato;

create table cliente(
    RUC char(11) primary key,
    razon_social varchar(50) not null,
    direccion varchar(50) not null,
    email varchar(30),
    telefono varchar(14) not null
);

create table vehiculo(
	placa char(7) primary key,
    marca varchar(20) not null,
    cod_configuracion char(5) not null,
    nro_contacto varchar(9) not null,
    estado enum('DISPONIBLE','NO DISPONIBLE') not null
);

create table chofer(
	dni char(8) primary key,
    nro_licencia char(9) not null,
    ap_paterno varchar(20) not null,
    ap_materno varchar(20) not null,
    nombres varchar(25) not null, 
    direecion varchar (30) not null,
    telefono varchar(9) not null
);

create table guia_remision(
	id int(7) zerofill auto_increment primary key,
    placa char(7) not null ,
    fecha_remision date not null,
    fecha_traslado date not null,
    pto_partida varchar(50) not null,
    pto_llegada varchar(50) not null,
    hora_partida time not null,
    estado enum('registrado','anulado','sellado') not null 
);
alter table guia_remision add FOREIGN KEY(placa) references vehiculo(placa) on delete cascade on update cascade;

create table chofer_guia(
	id_guia int(7) zerofill not null,
    dni char(8) not null,
    primary key(id_guia,dni)
);
alter table chofer_guia add FOREIGN KEY(id_guia) references guia_remision(id) on delete cascade ON UPDATE CASCADE;
alter table chofer_guia add FOREIGN KEY(dni) references chofer(dni) on delete cascade ON UPDATE CASCADE;

create table carga(
	id int(7)zerofill auto_increment primary key,
    id_guia int(7) zerofill not null ,
    descripcion varchar(40) not null, 
    cantidad int unsigned not null ,
    u_medida enum('kg','T') not null,
    peso decimal(6,2) not null
);
alter table carga add FOREIGN KEY (id_guia) references guia_remision(id) on delete cascade ON UPDATE CASCADE;

create table factura(
	id int(7)zerofill auto_increment primary key,
    RUC char(11) not null,
    id_guia int(7) zerofill not null ,
    fecha date not null,
    total decimal(7,2) not null,
    descripcion varchar(80) not null,
    estado enum('registrado','cancelado','anulado') not null
);
alter table factura add FOREIGN KEY(RUC) references cliente(RUC) on delete cascade ON UPDATE CASCADE;
alter table factura add FOREIGN KEY(id_guia) references guia_remision(id) on delete cascade ON UPDATE CASCADE;

create table ubicacion(
id_ubicacion int auto_increment primary key,
id_guia int(7) zerofill not null ,
latitud varchar(15) not null,
longitud varchar(15) not null,
fecha date not null,
hora time not null
);
alter table ubicacion add foreign key(id_guia) references guia_remision(id) on delete cascade ON UPDATE CASCADE;

INSERT INTO cliente VALUES('20561396567','ASTILLEROS SANTA CECILIA S.A.C','Cal. Antenor Orrego Nro. 200 Centro (Cerca al Complejo Deportivo Maximiliano) Lambayeque, Perú',NULL,'948934224');
INSERT INTO cliente VALUES('20544125681','CORPORACION FRUTOS DEL MAR S.A.C.','Jr. Mineria Nro. 177 (Paralela al Mall Aventura Santa Anita) Lima, Perú',NULL,'017196782');
INSERT INTO cliente VALUES('20518043847','M. CH. E. EIRL','Cal. Daniel Hernandez Nro. 713 (Primer Piso Alt.Cda.13 Av. Bolivar) Lima, Perú',NULL,'012623511');
INSERT INTO cliente VALUES('20512868046','C.F.G. INVESTMENT S.A.C.','Cal.Francisco Graña Nro. 155 Urb. Santa Catalina, La Victoria, Lima',NULL,'014181000');
INSERT INTO cliente VALUES('20100003351','SERVICIOS INDUSTRIALES DE LA MARINA S.A.','AV. CONTRALMIRANTE MORA NRO. 1102 BASE NAVAL - CALLAO PERU','jdiazr@sima.com.pe','014131152');
INSERT INTO cliente VALUES('20100971779','TECNOLOGICA DE ALIMENTOS S.A.',' Jr. Carpaccio N°250, piso 11 – San Borja','info@tasa.com.pe','016111400');
INSERT INTO cliente VALUES('20380336384','PESQUERA EXALMAR S.A.A.','Av. Argentina N° 357 Zona Industrial, Callao, Perú.','central@exalmar.com.pe','014296469');
INSERT INTO cliente VALUES('20516456001','VARADERO ANDESA S.A.','CALETA TIERRA COLORADA, PAITA, PIURA','jpajares@varaderoandesa.com','073211033');
INSERT INTO cliente VALUES('20445417263','INVERSIONES GANDER E.I.R.L.','Jr. Buenos Aires Nro. 380 A.H. el Progreso, Ancash, Perú',NULL,'43327564');
INSERT INTO cliente VALUES('20330862450','COMPAÑIA PESQUERA DEL PACIFICO CENTRO S.A.','Av. Del Parque Norte Nº 1112 Urb.Corpac- San Borja','cppc@pacificocentro.com.pe','012256700');
INSERT INTO cliente VALUES('20445291731','FACTORIA AGROMAR S.A.C.',' Jr. Tacna # 248 Florida Baja  Chimbote','factoria_agromarsac@hotmail.com',' 43350532');
INSERT INTO cliente VALUES('20531854871','ASTILLERO LUGUENSI',' AV. Los Pescadores Mz. "K" Lote 4 - Zona Industrial- 27 De Octubre - Chimbote, Ancash, Perú.','astillero@luguensi.com','43350758');
INSERT INTO cliente VALUES('20514863408','INDUSTRIAS BELSA S.A.C.','Pj. a Nro. S/n Int. 45 Mcdo.Productores , Santa Anita, Lima',NULL,'013543257');
INSERT INTO cliente VALUES('20107759736','CONSTRUCCIONES Y REPARACIONES MARINAS S.A.C.','Av. Manuel Olguin Nro. 211 Int. 1202, Santiago de Surco, Lima',NULL,'014215778');
INSERT INTO cliente VALUES('20231190644','ASTILLEROS DON FERNANDO','Avenida Los Pescadores 354 P.J. 27 De Octubre',NULL,'01351039');
INSERT INTO cliente VALUES('20530596193','VARAJES BAZALAR E.I.R.L','Av. Luna Arrieta Nro. S/n Ba. Puerto de Huacho (Fte a la Capitania del Puerto de Huacho), Lima, Peru',NULL,'018681628');
INSERT INTO cliente VALUES('10175946247','ASTILLERO EL NAZARENO','Carretera Chiclayo - San Jose Sector Gallito, Lambayeque, Peru',NULL,'971897402');
INSERT INTO cliente VALUES('20504595863','PESQUERA CANTABRIA S.A.',' Amador Merino Reyna 339 – Of. 501  San Isidro',' pkulisic@pesqueracantabria.com','014225492');
INSERT INTO cliente VALUES('20114186199','PESQUERA SEÑOR DE LA JUSTICIA S.C.R.L','Av. Jose Pardo Nro. 650 Chimbote, Ancash, Peru',NULL,'43326796');

INSERT INTO vehiculo VALUES('C4A-817','INTERNATIONAL','T4-S3','969249261','DISPONIBLE');
INSERT INTO vehiculo VALUES('C8H-928','INTERNATIONAL','T4-S3','954678323','DISPONIBLE');
INSERT INTO vehiculo VALUES('C5D-705','KENWORTH','T4-S5','983239323','DISPONIBLE');
INSERT INTO vehiculo VALUES('T3X-970','INMPSAC','T3-S3','958973920','DISPONIBLE');
INSERT INTO vehiculo VALUES('B4G-989','KVR TRAILERS','T3-S1','983728392','DISPONIBLE');
INSERT INTO vehiculo VALUES('T9U-985','ARFAMET','T2-S2','989736239','DISPONIBLE');

INSERT INTO chofer VALUES('32835066','E-32835066','OSORIO','JIMENEZ','EMILIO FERNANDO','Garatea','954235312');
INSERT INTO chofer VALUES('32111948','E-32111948','LOPEZ','SANTOLALLA','MARIO VICENTE','Bellamar','944192310');
INSERT INTO chofer VALUES('32762650','E-32762650','CARRION','LOPEZ','JEFRY ANTONY','Pardo','943209323');
INSERT INTO chofer VALUES('46207503','E-46207503','AVILA','CAPRISTAN','JUNIOR SANTIAGO','Psj. Bolivar 125 El Progreso','944928228');
INSERT INTO chofer VALUES('32901379','E-32901379','LOPEZ','POLO','WALTER ','Javier Herau','971727355');
INSERT INTO chofer VALUES('46915484','Q-46915484','SANCHEZ','RIVERA','CARLOS MANUEL','Miramar','932531923');
INSERT INTO chofer VALUES('32820533','E-32820533','MILLA','CABALLERO','ENRIQUE ARTURO ','Trapecio','953401234');
INSERT INTO chofer VALUES('32107624','Q-32107624','LOPEZ','SANTOLALLA','JOSE ALBERTO','Las Gardenias','950525141');

INSERT INTO guia_remision VALUES('0000831','C4A-817','2015-09-01','2015-09-01','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','CAL ANTENOR ORREGO NRO 200 CENTRO SAN JOSE LAMBAYEQUE','11:15:24','SELLADO');
INSERT INTO guia_remision VALUES('0000815','C4A-817','2015-07-12','2015-07-12','PROLONGACION PARDO NRO A - 9 03 OCTUBRE NVO CHIMBOTE','CARQUIN BAJO S/N CALERA CARQUIN LIMA HUARA HUACHO','11:15:25','SELLADO');
INSERT INTO guia_remision VALUES('0000836','C8H-928','2015-09-17','2015-09-17','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','11:15:26','ANULADO');
INSERT INTO guia_remision VALUES('0000827','C4A-817','2015-08-25','2015-08-25','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','09:36:00','SELLADO');
INSERT INTO guia_remision VALUES('0000826','C4A-817','2015-08-24','2015-08-24','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','13:07:23','SELLADO');
INSERT INTO guia_remision VALUES('0000824','B4G-989','2015-08-22','2015-08-22','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','10:52:09','SELLADO');
INSERT INTO guia_remision VALUES('0000823','B4G-989','2015-08-18','2015-08-18','CARRETERA PANAMERICANA SUR KM 690 ATICO, CARAVELI, AREQUIPA','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','08:12:01','SELLADO');
INSERT INTO guia_remision VALUES('0000820','C8H-928','2015-08-02','2015-08-02','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','CARRETERA PANAMERICANA SUR KM 690 ATICO, CARAVELI, AREQUIPA','09:07:15','SELLADO');
INSERT INTO guia_remision VALUES('0000819','T3X-970','2015-07-25','2015-07-25','AV LAS CALDERAS 330, PUNTA HERMOSA, LIMA','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','07:00:32','SELLADO');
INSERT INTO guia_remision VALUES('0000818','B4G-989','2015-07-18','2015-07-18','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','CARRETERA PANAMERICANA SUR KM 690 ATICO, CARAVELI, AREQUIPA','08:03:12','SELLADO');
INSERT INTO guia_remision VALUES('0000817','C4A-817','2015-07-17','2015-07-17','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','10:02:31','SELLADO');
INSERT INTO guia_remision VALUES('0000816','B4G-989','2015-07-13','2015-07-13','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','AV LAS CALDERAS 330, PUNTA HERMOSA, LIMA','11:23:51','SELLADO');
INSERT INTO guia_remision VALUES('0000814','C4A-817','2015-07-11','2015-07-11','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','07:31:11','SELLADO');
INSERT INTO guia_remision VALUES('0000813','B4G-989','2015-07-09','2015-07-09','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','09:15:05','SELLADO');
INSERT INTO guia_remision VALUES('0000812','T9U-985','2015-07-07','2015-07-07','PASAJE SANTA MARTHA S/N 27 DE OCTUMBRE CHIMBOTE, SANTA, ANCASH','PUERTO CALETA, LA SILLETITA, HUARMEY, ANCASH','08:11:12','SELLADO');

INSERT INTO chofer_guia VALUES('0000831','32835066');
INSERT INTO chofer_guia VALUES('0000815','32835066');
INSERT INTO chofer_guia VALUES('0000836','32111948');
INSERT INTO chofer_guia VALUES('0000827','32835066');
INSERT INTO chofer_guia VALUES('0000826','32111948');
INSERT INTO chofer_guia VALUES('0000824','32111948');
INSERT INTO chofer_guia VALUES('0000823','32820533');
INSERT INTO chofer_guia VALUES('0000820','32111948');
INSERT INTO chofer_guia VALUES('0000820','46207503');
INSERT INTO chofer_guia VALUES('0000813','32111948');
INSERT INTO chofer_guia VALUES('0000818','46207503');
INSERT INTO chofer_guia VALUES('0000818','32111948');
INSERT INTO chofer_guia VALUES('0000817','32820533');
INSERT INTO chofer_guia VALUES('0000816','32835066');
INSERT INTO chofer_guia VALUES('0000814','32835066');
INSERT INTO chofer_guia VALUES('0000813','32835066');
INSERT INTO chofer_guia VALUES('0000812','32835066');

INSERT INTO carga VALUES('000001','0000831','CABALLETES DE FIERRO',4,'kg',65);
INSERT INTO carga VALUES('000002','0000831','TACOS DE DIFERENTES MEDIDAS',18,'kg',90);
INSERT INTO carga VALUES('000003','0000815','DOMO ENFRIADOR diametro: 1.5 m altura: 1.9 m CON PLATAFORMA',1,'T',1.6);
INSERT INTO carga VALUES('000004','0000815','ENFRIADOR DE HARINA  diametro: 1.6 m longitud: 5 m',1,'T',2);
INSERT INTO carga VALUES('000005','0000815','DOMO ENFRIADOR MOLINO CON PLATAFORMA',1,'T',1.2);
INSERT INTO carga VALUES('000006','0000815','CUELLO GANSO diametro: 0.30 m',1,'kg',120);
INSERT INTO carga VALUES('000007','0000815','CHIMENEA diametro: 0.35 m largo: 3 m',1,'kg',112);
INSERT INTO carga VALUES('000008','0000815','CHIMENEA diametro: 0.20 m largo: 2.5 m',1,'kg',104);
INSERT INTO carga VALUES('000009','0000815','ESCALERA DE GATO 0.60 m x 3 m',2,'kg',32);
INSERT INTO carga VALUES('000010','0000836','CARGADOR FRONTAL',1,'T',1.6);
INSERT INTO carga VALUES('000011','0000827','CARGADOR FRONTAL',1,'T',1.2);
INSERT INTO carga VALUES('000012','0000827','TORNAMESA',1,'kg',75);
INSERT INTO carga VALUES('000013','0000826','PATINES 16 LLANTAS',2,'T',5);
INSERT INTO carga VALUES('000014','0000826','TACOS DE 12''',5,'kg',87);
INSERT INTO carga VALUES('000015','0000826','GRILLETES',1,'kg',43);
INSERT INTO carga VALUES('000016','0000824','PATINES',2,'T',5.02);
INSERT INTO carga VALUES('000017','0000824','CABALLETES DE FIERRO',2,'kg',62);
INSERT INTO carga VALUES('000018','0000824','TACOS DE DIFERENTES MEDIDAS',20,'kg',76);
INSERT INTO carga VALUES('000019','0000823','CARRETA',1,'kg',200);
INSERT INTO carga VALUES('000020','0000823','LLANTAS DE AVION',10,'kg',250);
INSERT INTO carga VALUES('000021','0000823','CABALLETES DE FIERRO',4,'kg',69);
INSERT INTO carga VALUES('000022','0000820','CARRETA',1,'kg',78);
INSERT INTO carga VALUES('000023','0000820','LLANTAS DE AVION',10,'kg',250);
INSERT INTO carga VALUES('000024','0000820','MOTOR GASOLINERO',1,'kg',59);
INSERT INTO carga VALUES('000025','0000820','TACOS DE DIFERENTES MEDIDAS',14,'kg',78);
INSERT INTO carga VALUES('000026','0000820','CHALANA',1,'kg',150);
INSERT INTO carga VALUES('000027','0000820','GRILLETES',3,'kg',67);
INSERT INTO carga VALUES('000028','0000813','VIGAS DE FIERRO',2,'kg',92);
INSERT INTO carga VALUES('000029','0000813','TORTUGAS DE FIERRO',4,'kg',57);
INSERT INTO carga VALUES('000030','0000818','CADENAS TRAMAS',4,'kg',15);
INSERT INTO carga VALUES('000031','0000818','GRILLETES CHICOS',10,'kg',62);
INSERT INTO carga VALUES('000032','0000818','PLANCHAS',4,'kg',73);
INSERT INTO carga VALUES('000033','0000818','CABALLETES',3,'kg',74);
INSERT INTO carga VALUES('000034','0000818','VIGAS',4,'kg',81);
INSERT INTO carga VALUES('000035','0000818','TORTUGAS',9,'kg',63);
INSERT INTO carga VALUES('000036','0000817','TILFO',1,'kg',73);
INSERT INTO carga VALUES('000037','0000817','CABALLETES',4,'kg',67);
INSERT INTO carga VALUES('000038','0000817','VIGAS DE FIERRO',2,'kg',62);
INSERT INTO carga VALUES('000039','0000817','TORTUGAS',4,'kg',75);
INSERT INTO carga VALUES('000040','0000817','RAMFLAS',2,'kg',61);
INSERT INTO carga VALUES('000041','0000816','VIGAS',2,'kg',74);
INSERT INTO carga VALUES('000042','0000816','CABALLETES',4,'kg',63);
INSERT INTO carga VALUES('000043','0000816','TACOS DE DIFERENTES MEDIDAS',16,'kg',89);
INSERT INTO carga VALUES('000044','0000816','PLANCHAS',9,'kg',73);
INSERT INTO carga VALUES('000045','0000816','MOTOR HIDRAULICO',1,'kg',37);
INSERT INTO carga VALUES('000046','0000816','LLANTAS DE REPUESTO',2,'kg',25);
INSERT INTO carga VALUES('000047','0000814','CARGADOR FRONTAL CAT. 950 H',1,'T',1.5);
INSERT INTO carga VALUES('000048','0000813','CARGADOR FRONTAL CAT. 950 H',1,'T',1.5);
INSERT INTO carga VALUES('000049','0000813','PLANCHAS',2,'kg',63);
INSERT INTO carga VALUES('000050','0000812','PATINES CON LLANTAS DE AVION',2,'T',5.5);
INSERT INTO carga VALUES('000051','0000812','GRILLETES DE DIFERENTES MEDIDAS',14,'kg',47);
INSERT INTO carga VALUES('000052','0000812','ESTROBOS',3,'kg',36);

INSERT INTO factura VALUES('0000967','20561396567','0000831','2015-09-01','35500','Transporte de Chimbote a Lambayeque','CANCELADO');
INSERT INTO factura VALUES('0000938','20544125681','0000815','2015-07-12','34500','Transporte de Nuevo Chimbote a Lima','CANCELADO');
INSERT INTO factura VALUES('0000970','20518043847','0000836','2015-09-17','2500','Transporte de Huarmey a Chimbote','ANULADO');
INSERT INTO factura VALUES('0000962','20512868046','0000827','2015-08-25','2800','Transporte de Chimbote a Huarmey','CANCELADO');
INSERT INTO factura VALUES('0000961','20512868046','0000826','2015-08-24','3100','Transporte de Chimbote a Huarmey','CANCELADO');
INSERT INTO factura VALUES('0000958','20512868046','0000824','2015-08-22','2500','Transporte de Chimbote a Huarmey','CANCELADO');
INSERT INTO factura VALUES('0000957','20561396567','0000823','2015-08-18','21000','Transporte de Arequipa a Chimbote','CANCELADO');
INSERT INTO factura VALUES('0000950','20100971779','0000820','2015-08-02','20400','Transporte de Chimbote a Arequipa','CANCELADO');
INSERT INTO factura VALUES('0000948','20531854871','0000819','2015-07-25','4200','Transporte de Lima a Chimbote','CANCELADO');
INSERT INTO factura VALUES('0000945','20100971779','0000818','2015-07-18','22050','Transporte de Chimbote a Arequipa','CANCELADO');
INSERT INTO factura VALUES('0000943','20512868046','0000817','2015-07-17','5300','Transporte de Huarmey a Chimbote','CANCELADO');
INSERT INTO factura VALUES('0000939','20514863408','0000816','2015-07-13','3450','Transporte de Chimbote a Lima','CANCELADO');
INSERT INTO factura VALUES('0000934','20512868046','0000814','2015-07-11','4300','Transporte de Huarmey a Chimbote','CANCELADO');
INSERT INTO factura VALUES('0000933','20512868046','0000813','2015-07-09','3640','Transporte de Chimbote a Huarmey','CANCELADO');
INSERT INTO factura VALUES('0000929','20512868046','0000812','2015-07-07','4100','Transporte de Chimbote a Huarmey','CANCELADO');

INSERT INTO ubicacion VALUES(1,'0000831','-9.114648',' -78.561376','2015-09-01','11:15:24');
INSERT INTO ubicacion VALUES(2,'0000831','-8.192897','-78.999825','2015-09-01','13:30:52');
INSERT INTO ubicacion VALUES(3,'0000831','-7.798812','-79.248979','2015-09-01','15:05:12');
INSERT INTO ubicacion VALUES(4,'0000831','-6.995807','-79.619250','2015-09-01','16:30:02');
INSERT INTO ubicacion VALUES(5,'0000831','-6.736494','-79.743359','2015-09-01','17:03:28');
INSERT INTO ubicacion VALUES(6,'0000815','-9.139190','-78.518710','2015-07-12','11:15:25');
INSERT INTO ubicacion VALUES(7,'0000815','-9.725091','-78.274584','2015-07-12','12:30:05');
INSERT INTO ubicacion VALUES(8,'0000815','-10.244446','-78.027392','2015-07-12','14:45:12');
INSERT INTO ubicacion VALUES(9,'0000815','-10.816912','-77.681322','2015-07-12','16:32:25');
INSERT INTO ubicacion VALUES(10,'0000815','-11.093214','-77.626223','2015-07-12','17:54:34');
INSERT INTO ubicacion VALUES(11,'0000836','-10.050618','-78.161571','2015-09-17','11:15:26');
INSERT INTO ubicacion VALUES(12,'0000836','-9.815061','-78.182353','2015-09-17','11:24:56');
INSERT INTO ubicacion VALUES(13,'0000836','-9.557856','-78.267494','2015-09-17','13:14:04');
INSERT INTO ubicacion VALUES(14,'0000836','-9.319429','-78.408943','2015-09-17','14:21:29');
INSERT INTO ubicacion VALUES(15,'0000836','-9.114648',' -78.561376','2015-09-17','14:53:12');
INSERT INTO ubicacion VALUES(16,'0000827','-9.114648',' -78.561376','2015-08-25','09:36:00');
INSERT INTO ubicacion VALUES(17,'0000827','-9.195941','-78.465784','2015-08-25','10:15:34');
INSERT INTO ubicacion VALUES(18,'0000827','-9.531301','-78.274897','2015-08-25','10:49:19');
INSERT INTO ubicacion VALUES(19,'0000827','-9.896772','-78.222712','2015-08-25','13:21:53');
INSERT INTO ubicacion VALUES(20,'0000827','-10.050618','-78.161571','2015-08-25','13:56:02');
INSERT INTO ubicacion VALUES(21,'0000826','-9.114648',' -78.561376','2015-08-24','13:07:23');
INSERT INTO ubicacion VALUES(22,'0000826','-9.546502','-78.279469','2015-08-24','13:47:04');
INSERT INTO ubicacion VALUES(23,'0000826','-10.211297','-78.032442','2015-08-24','14:29:53');
INSERT INTO ubicacion VALUES(24,'0000826','-11.654682','-77.200987','2015-08-24','17:02:30');
INSERT INTO ubicacion VALUES(25,'0000826','-10.050618','-78.161571','2015-08-24','17:24:12');
INSERT INTO ubicacion VALUES(26,'0000824','-9.114648',' -78.561376','2015-08-22','10:52:09');
INSERT INTO ubicacion VALUES(27,'0000824','-9.195941','-78.465784','2015-08-22','11:43:23');
INSERT INTO ubicacion VALUES(28,'0000824','-9.531301','-78.274897','2015-08-22','12:38:09');
INSERT INTO ubicacion VALUES(29,'0000824','-9.896772','-78.222712','2015-08-22','14:04:53');
INSERT INTO ubicacion VALUES(30,'0000824','-10.050618','-78.161571','2015-08-22','14:23:42');
INSERT INTO ubicacion VALUES(31,'0000823','-15.544141','-74.758277','2015-08-18','08:12:01');
INSERT INTO ubicacion VALUES(32,'0000823','-14.174336','-75.736060','2015-08-18','18:53:13');
INSERT INTO ubicacion VALUES(33,'0000823','-12.774782','-76.603980','2015-08-18','20:46:05');
INSERT INTO ubicacion VALUES(34,'0000823','-10.849973','-77.757544','2015-08-19','14:30:23');
INSERT INTO ubicacion VALUES(35,'0000823','-9.444127','-78.405737','2015-08-19','15:15:41');
INSERT INTO ubicacion VALUES(36,'0000823','-9.114648',' -78.561376','2015-08-19','16:45:12');
INSERT INTO ubicacion VALUES(37,'0000820','-9.114648',' -78.561376','2015-08-02','09:07:15');
INSERT INTO ubicacion VALUES(38,'0000820','-9.562354','-78.277521','2015-08-02','10:26:42');
INSERT INTO ubicacion VALUES(39,'0000820','-10.481931','-77.909479','2015-08-02','13:02:09');
INSERT INTO ubicacion VALUES(40,'0000820','-13.012111','-76.453790','2015-08-02','19:49:41');
INSERT INTO ubicacion VALUES(41,'0000820','-15,037171','-75.091486','2015-08-03','11:23:04');
INSERT INTO ubicacion VALUES(42,'0000820','-15.544141','-74.758277','2015-08-03','20:12:53');
INSERT INTO ubicacion VALUES(43,'0000819','-12.306602','-76.824376','2015-07-25','07:00:32');
INSERT INTO ubicacion VALUES(44,'0000819','-11.383113','-77.435964','2015-07-25','10:35:06');
INSERT INTO ubicacion VALUES(45,'0000819','-10.294300','-78.938467','2015-07-25','11:53:42');
INSERT INTO ubicacion VALUES(46,'0000819','9.207486','-78.452241','2015-07-25','14:15:05');
INSERT INTO ubicacion VALUES(47,'0000819','-9.114648',' -78.561376','2015-07-25','15:03:43');
INSERT INTO ubicacion VALUES(48,'0000818','-9.114648',' -78.561376','2015-07-18','08:03:12');
INSERT INTO ubicacion VALUES(49,'0000818','-9.655507','-78.299872','2015-07-18','09:34:03');
INSERT INTO ubicacion VALUES(50,'0000818','-11.037500','-77.558048','2015-07-18','12:46:48');
INSERT INTO ubicacion VALUES(51,'0000818','-13.360172','-76.206067','2015-07-18','18:21:09');
INSERT INTO ubicacion VALUES(52,'0000818','-14.362798','-75.557874','2015-07-18','20:19:12');
INSERT INTO ubicacion VALUES(53,'0000818','-15.544141','-74.758277','2015-07-19','18:05:31');
INSERT INTO ubicacion VALUES(54,'0000817','-10.050618','-78.161571','2015-07-17','10:02:31');
INSERT INTO ubicacion VALUES(55,'0000817','-9.753339','-78.252924','2015-07-17','12:32:52');
INSERT INTO ubicacion VALUES(56,'0000817','-9.450258','-78.337609','2015-07-17','13:01:46');
INSERT INTO ubicacion VALUES(57,'0000817','-9.190659','-78.469994','2015-07-17','13:32:08');
INSERT INTO ubicacion VALUES(58,'0000817','-9.114648',' -78.561376','2015-07-17','14:04:25');
INSERT INTO ubicacion VALUES(59,'0000816','-9.114648',' -78.561376','2015-07-13','11:23:51');
INSERT INTO ubicacion VALUES(60,'0000816','-9.546502','-78.279469','2015-07-13','12:31:53');
INSERT INTO ubicacion VALUES(61,'0000816','-10.211297','-78.032442','2015-07-13','14:03:21');
INSERT INTO ubicacion VALUES(62,'0000816','-11.654682','-77.200987','2015-07-13','16:12:43');
INSERT INTO ubicacion VALUES(63,'0000816','-12.306602','-76.824376','2015-07-13','19:05:23');
INSERT INTO ubicacion VALUES(64,'0000814','-10.050618','-78.161571','2015-07-11','07:31:11');
INSERT INTO ubicacion VALUES(65,'0000814','-9.753339','-78.252924','2015-07-11','08:56:02');
INSERT INTO ubicacion VALUES(66,'0000814','-9.450258','-78.337609','2015-07-11','09:24:28');
INSERT INTO ubicacion VALUES(67,'0000814','-9.190659','-78.469994','2015-07-11','09:45:23');
INSERT INTO ubicacion VALUES(68,'0000814','-9.114648',' -78.561376','2015-07-11','11:03:12');
INSERT INTO ubicacion VALUES(69,'0000813','-9.114648',' -78.561376','2015-07-09','09:15:05');
INSERT INTO ubicacion VALUES(70,'0000813','-9.195941','-78.465784','2015-07-09','10:23:12');
INSERT INTO ubicacion VALUES(71,'0000813','-9.531301','-78.274897','2015-07-09','11:02:46');
INSERT INTO ubicacion VALUES(72,'0000813','-9.896772','-78.222712','2015-07-09','11:20:31');
INSERT INTO ubicacion VALUES(73,'0000813','-10.050618','-78.161571','2015-07-09','11:32:23');
INSERT INTO ubicacion VALUES(74,'0000812','-9.114648',' -78.561376','2015-07-07','08:11:12');
INSERT INTO ubicacion VALUES(75,'0000812','-9.235930','-78.458918','2015-07-07','09:20:12');
INSERT INTO ubicacion VALUES(76,'0000812','-9.569220','-78.274897','2015-07-07','10:58:12');
INSERT INTO ubicacion VALUES(77,'0000812','-9.834535','-78.187006','2015-07-07','11:30:23');
INSERT INTO ubicacion VALUES(78,'0000812','-10.050618','-78.161571','2015-07-07','11:40:39');