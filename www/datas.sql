CREATE TABLE IF NOT EXISTS User (
	id integer PRIMARY KEY AUTO_INCREMENT ON DELETE CASCADE, 
	firstName varchar(50),
	lastName varchar(50) ,
	username varchar(50) UNIQUE,
	password varchar(50), 
	address varchar(50),
	city varchar(50),
	state varchar(50),
	gender varchar(10) CHECK (gender='M' or gender='F'),
	prefix varchar(10),
	phoneNumber varchar(50),
	role integer CHECK (role=0 OR role=1 OR role=2)
);



CREATE TABLE IF NOT EXISTS Car (
	id integer PRIMARY KEY,
	model varchar(50),
	maxSpeed integer,
	numberOfPassengers integer,
	seller integer REFERENCES User(id)
);

CREATE TABLE IF NOT EXISTS Basement (
	id integer PRIMARY KEY AUTO_INCREMENT, 
	name  varchar(50) UNIQUE,
	address varchar(50),
	seller integer REFERENCES User(id)
);

CREATE TABLE IF NOT EXISTS History (
	idHistory integer PRIMARY KEY  AUTO_INCREMENT,
	idCar integer REFERENCES Car(id),
	customer integer REFERENCES User(id),
	idBasementStart integer REFERENCES Basement(id),
	pickUpDay date,
	pickUpHour time,
	idBasementEnd integer REFERENCES Basement(id),
	deliveryDay date,
	deliveryHour time,
	CONSTRAINT UC_Person UNIQUE (idCar, deliveryDay, deliveryHour)
);

INSERT INTO User VALUES (1,'Luisa','Piersanti','admin','admin','via delle rose', 'parma','italy','F','+39','333333333','0');
INSERT INTO User VALUES (2,'Matteo','Azzarelli','matteo','matteo','via degli ulivi', 'pisa','italy','M','+39','333333333','1');
INSERT INTO Car VALUES (123,'Smart EQ fortwo',130,2,2);
INSERT INTO Car VALUES (1234, 'Nissan LEAF',144,5, 2);
# INSERT INTO Car VALUES ('Renault Zoe',135,5);
# INSERT INTO Car VALUES ('Renault Twizy',45,2);
# INSERT INTO Car VALUES ('Toyota Yaris',155,5);
# INSERT INTO Car VALUES ('Toyota c-hr',170,5);
# INSERT INTO Car VALUES ('Kia Niro',162,5);
INSERT INTO Basement VALUES (1,'O Connell Street', 'Parnell Street',2);
INSERT INTO Basement VALUES (2,'Temple Bar', 'Parliament Street',2);
INSERT INTO Basement VALUES (3,'Clontarf', 'Castle Avenue',2);
INSERT INTO Basement VALUES (4,'Ballsbridge', 'Ballsbridge Avenue',2);
INSERT INTO Basement VALUES (5,'Rathmines', 'Cambridge Road',2);
INSERT INTO Basement VALUES (6,'St. Patricks Cathedral', 'Patrick Street',2);
INSERT INTO Basement VALUES (7,'Docklands', 'Dame Street',2);

INSERT INTO History VALUES (1, '123', 1, 1, '2018-12-22', '08:30:00', 2, '2018-12-23', '08:30:00');
INSERT INTO History VALUES (2, '1234', 1, 1, '2018-12-22', '08:30:00', 2, '2018-12-23', '08:30:00');
