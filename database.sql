CREATE TABLE Parking_Lot
(
    Lot_ID char(255) PRIMARY KEY,
    Address char(255) UNIQUE NOT NULL
);

CREATE TABLE Parking_Space
(
    Space_ID INT,
    Lot_ID char(255),
    Space_Type char(255) NOT NULL,
    Is_Occupied char(255) NOT NULL,
    PRIMARY KEY (Space_ID, Lot_ID),
    FOREIGN KEY (Lot_ID) REFERENCES Parking_Lot(Lot_ID) ON DELETE CASCADE
);

CREATE TABLE Rate
(
    Rate_ID char(255),
    Description char(255),
    Hourly_Rate DECIMAL(10,2) CHECK (Hourly_Rate > 0),
    Day_Rate DECIMAL(10,2) CHECK (Day_Rate > 0),
    Monthly_Rate DECIMAL(10,2) CHECK (Monthly_Rate > 0),
    PRIMARY KEY (Rate_ID)
);

CREATE TABLE Customer
(
    Customer_ID Char(255),
    License_Plate Char(6) NOT NULL,
    Primary Key (Customer_ID)
);

CREATE TABLE Pass_Holder
(
    Customer_ID Char(255),
    First_Name Char(255) NOT NULL,
    Last_Name Char(255) NOT NULL,
    Phone_Number Char(10) NOT NULL UNIQUE,
    Address Char(255) NOT NULL,
    Email Char(255) NOT NULL UNIQUE,
    Primary Key (Customer_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID) ON DELETE CASCADE
);

CREATE TABLE Parking_Lot_Employee
(
    Employee_ID Char(255),
    First_Name Char(255) NOT NULL,
    Hiring_Date DATE NOT NULL,
    Employment_Status Char(8) DEFAULT 'ACTIVE',
    Primary Key (Employee_ID)
);

CREATE TABLE Manager
(
    Employee_ID Char(255),
    Manager_ID Char(255) NOT NULL UNIQUE,
    Managed_By_ID Char(255),
    Primary Key (Employee_ID),
    FOREIGN KEY (Employee_ID) REFERENCES Parking_Lot_Employee(Employee_ID) ON DELETE CASCADE,
    FOREIGN KEY (Managed_By_ID) REFERENCES Manager(Manager_ID) ON DELETE SET NULL
);


CREATE TABLE Manager_Salary
(
    Manager_Type CHAR(255) PRIMARY KEY,
    Salary DECIMAL (7,2) CHECK (Salary > 0)
);

CREATE TABLE Manager_ID_Manager_Type
(
    Employee_ID CHAR(255),
    Manager_Type CHAR(255),
    PRIMARY KEY (Employee_ID,Manager_Type),
    FOREIGN KEY (Employee_ID) REFERENCES Parking_Lot_Employee(Employee_ID) ON DELETE CASCADE,
    FOREIGN KEY (Manager_Type) REFERENCES Manager_Salary(Manager_Type)
);


CREATE TABLE Officer
(
    Employee_ID CHAR(255) PRIMARY KEY,
    Officer_ID CHAR(255) NOT NULL UNIQUE,
    Shift CHAR(8),
    Managed_By_ID CHAR(255) NOT NULL,
    FOREIGN KEY (Employee_ID) REFERENCES Parking_Lot_Employee(Employee_ID) ON DELETE CASCADE,
    FOREIGN KEY (Managed_By_ID) REFERENCES Manager(Manager_ID)
);


CREATE TABLE Fine_Type_Cost
(
    Fine_Type CHAR(255) PRIMARY KEY,
    Cost DECIMAL(4,2) CHECK (Cost > 0)
);

CREATE TABLE Fine
(
    Fine_ID CHAR(255) PRIMARY KEY,
    Officer_ID CHAR(255) NOT NULL,
    Customer_ID CHAR(255) NOT NULL,
    Fine_Type CHAR(255) NOT NULL,
    Issue_Date_Time TIMESTAMP NOT NULL,
    Must_Be_Paid_By_Date TIMESTAMP NOT NULL,
    Date_Time_Paid_On TIMESTAMP,
    FOREIGN KEY (Officer_ID) REFERENCES Officer(Officer_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID),
    FOREIGN KEY (Fine_Type) REFERENCES Fine_Type_Cost(Fine_Type)
);

CREATE TABLE Fine_ID_Fine_Type
(
    Fine_ID CHAR(255),
    Fine_Type CHAR(255),
    PRIMARY KEY (Fine_ID, Fine_Type),
    FOREIGN KEY (Fine_ID) REFERENCES Fine(Fine_ID) ON DELETE CASCADE,
    FOREIGN KEY (Fine_Type) REFERENCES Fine_Type_Cost(Fine_Type)
);


CREATE TABLE Costs
(
    Lot_ID CHAR(255),
    Space_ID INT,
    Rate_ID CHAR(255) NOT NULL,
    PRIMARY KEY (Lot_ID, Space_ID),
    FOREIGN KEY (Lot_ID, Space_ID) REFERENCES Parking_Space(Lot_ID, Space_ID),
    FOREIGN KEY (Rate_ID) References Rate(Rate_ID)
);

CREATE TABLE Patrols
(
    Officer_ID CHAR(255),
    Lot_ID CHAR(255),
    PRIMARY KEY (Officer_ID, Lot_ID),
    FOREIGN KEY (Officer_ID) REFERENCES Officer(Officer_ID) ON DELETE CASCADE,
    FOREIGN KEY (Lot_ID) REFERENCES Parking_Lot(Lot_ID) ON DELETE CASCADE
);

CREATE TABLE Parking_Slip
(
    Parking_Slip_ID char(255) PRIMARY KEY,
    Issue_Date_Time TIMESTAMP NOT  NULL,
    Expiry_Date_Time TIMESTAMP NOT  NULL,
    Lot_ID char(255) NOT  NULL,
    Space_ID INT NOT  NULL,
    Customer_ID char(255) NOT  NULL,
    FOREIGN KEY (Space_ID, Lot_ID) REFERENCES Parking_Space(Space_ID,Lot_ID) ON DELETE CASCADE,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID) ON DELETE CASCADE
);

CREATE TABLE Parking_Pass
(
    Parking_Pass_ID char(255) PRIMARY KEY,
    Issue_Date_Time TIMESTAMP NOT  NULL,
    Expiry_Date_Time TIMESTAMP NOT  NULL,
    Lot_ID char(255) NOT  NULL,
    Space_ID INT NOT  NULL,
    Customer_ID char(255) NOT  NULL,
    FOREIGN KEY (Space_ID, Lot_ID) REFERENCES Parking_Space(Space_ID,Lot_ID) ON DELETE CASCADE,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID) ON DELETE CASCADE
);

INSERT INTO Parking_Lot VALUES ('L1', '3363  Hamilton Street');
INSERT INTO Parking_Lot VALUES ('L2', '726 Nelson Street');
INSERT INTO Parking_Lot VALUES ('L3', '3074 Montreal Road');
INSERT INTO Parking_Lot VALUES ('L4', '4894 York St');
INSERT INTO Parking_Lot VALUES ('L5', '3355 3rd Avenue');

INSERT INTO Parking_Space VALUES (11 , 'L1', 'Small', 'TRUE');
INSERT INTO Parking_Space VALUES (12 , 'L2', 'Small', 'TRUE');
INSERT INTO Parking_Space VALUES (13 , 'L3', 'Charging', 'TRUE');
INSERT INTO Parking_Space VALUES (14 , 'L4', 'Handicap', 'TRUE');
INSERT INTO Parking_Space VALUES (15 , 'L5', 'Small', 'TRUE');
INSERT INTO Parking_Space VALUES (16 , 'L4', 'Small', 'TRUE');
INSERT INTO Parking_Space VALUES (17 , 'L4', 'Small', 'TRUE');
INSERT INTO Parking_Space VALUES (18 , 'L5', 'Small', 'TRUE');
INSERT INTO Parking_Space VALUES (19 , 'L5', 'Small', 'TRUE');
INSERT INTO Parking_Space VALUES (20 , 'L5', 'Small', 'TRUE');

INSERT INTO Rate VALUES ('R1' , 'Small', 2.50, 20.00, 600.00);
INSERT INTO Rate VALUES ('R2' , 'Charging', 3.50, 30.00, 800.00);
INSERT INTO Rate VALUES ('R3' , 'Handicap', 2.00, 15.00, 500.00);
INSERT INTO Rate VALUES ('R4' , 'Large', 3.00, 30.00, 700.00);
INSERT INTO Rate VALUES ('R5' , 'Medium', 2.80, 25.00, 650.00);

INSERT INTO Parking_Slip VALUES ('PS1' , '2019-08-01 19:00:00', '2019-08-01 20:00:00', 'L1', 11, 'C6');
INSERT INTO Parking_Slip VALUES ('PS2' , '2019-09-01 15:00:00', '2019-09-01 16:00:00', 'L2', 12, 'C7');
INSERT INTO Parking_Slip VALUES ('PS3' , '2019-10-01 12:00:00', '2019-10-01 13:00:00', 'L3', 13, 'C8');
INSERT INTO Parking_Slip VALUES ('PS4' , '2019-12-01 04:00:00', '2019-12-01 05:00:00', 'L4', 14, 'C9');
INSERT INTO Parking_Slip VALUES ('PS5' , '2020-01-01 20:00:00', '2020-01-01 21:00:00', 'L5', 15, 'C10');

INSERT INTO Parking_Pass VALUES ('PP1' , '2019-08-01 00:00:00', '2019-08-31 23:59:59', 'L1', 11, 'C6');
INSERT INTO Parking_Pass VALUES ('PP2' , '2019-09-01 00:00:00', '2019-09-30 23:59:59', 'L2', 12, 'C7');
INSERT INTO Parking_Pass VALUES ('PP3' , '2019-10-01 00:00:00', '2019-10-31 23:59:59', 'L3', 13, 'C8');
INSERT INTO Parking_Pass VALUES ('PP4' , '2019-12-01 00:00:00', '2019-12-31 23:59:59', 'L4', 14, 'C9');
INSERT INTO Parking_Pass VALUES ('PP5' , '2020-01-01 00:00:00', '2020-01-31 23:59:59', 'L5', 15, 'C10');
