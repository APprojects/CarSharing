CREATE TABLE IF NOT EXISTS User (
	id integer PRIMARY KEY AUTO_INCREMENT, 
	firstName varchar(50),
	lastName varchar(50) ,
	userName varchar(50) UNIQUE,
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
	name  varchar(50) PRIMARY KEY,
	address varchar(50),
	seller integer REFERENCES User(id)
);

CREATE TABLE IF NOT EXISTS BasementsCars (
	idCar integer REFERENCES Car(id),
	basement varchar(50) REFERENCES Basement(name),
	no integer,
	PRIMARY KEY(idCar,basement)
);

CREATE TABLE IF NOT EXISTS History (
	idHistory integer PRIMARY KEY,
	idCar integer,
	basement varchar(50),
	user integer REFERENCES User(id),
	PickUpDay date,
	PickUpHour time,
	DeliveryDay date,
	DeliveryHour time,
	FOREIGN KEY (idCar, basement) REFERENCES BasementsCars(idCar, basement)
);

INSERT INTO User VALUES (1,'Luisa','Piersanti','admin','admin','via delle rose', 'parma','italy','F','+39','333333333','0');
INSERT INTO User VALUES (2,'Matteo','Piersanti','matteo','matteo','via delle rose', 'parma','italy','F','+39','333333333','1');
INSERT INTO Car VALUES (123,'Smart EQ fortwo',130,2,2);
-- INSERT INTO Car VALUES ('Nissan LEAF',144,5);
-- INSERT INTO Car VALUES ('Renault Zoe',135,5);
-- INSERT INTO Car VALUES ('Renault Twizy',45,2);
-- INSERT INTO Car VALUES ('Toyota Yaris',155,5);
-- INSERT INTO Car VALUES ('Toyota c-hr',170,5);
-- INSERT INTO Car VALUES ('Kia Niro',162,5);
INSERT INTO Basement VALUES ('O Connell Street', 'Parnell Street',2);
INSERT INTO Basement VALUES ('Temple Bar', 'Parliament Street',2);
INSERT INTO Basement VALUES ('Clontarf', 'Castle Avenue',2);
INSERT INTO Basement VALUES ('Ballsbridge', 'Ballsbridge Avenue',2);
INSERT INTO Basement VALUES ('Rathmines', 'Cambridge Road',2);
INSERT INTO Basement VALUES ('St. Patricks Cathedral', 'Patrick Street',2);
INSERT INTO Basement VALUES ('Docklands', 'Dame Street',2);

