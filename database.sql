CREATE TABLE Parking_Lot
(
    Lot_ID char(255) PRIMARY KEY,
    Address char(60) UNIQUE NOT NULL
);

CREATE TABLE Parking_Space
(
    Space_ID INT,
    Lot_ID char(255),
    Is_Occupied char(5) NOT NULL,
    Space_Type char(20) NOT NULL,
    PRIMARY KEY (Space_ID, Lot_ID),
    FOREIGN KEY (Lot_ID) REFERENCES Parking_Lot(Lot_ID) ON DELETE CASCADE
);

CREATE TABLE Rate
(
    Rate_ID char(255),
    Description char(60),
    Hourly_Rate DECIMAL(4,2) CHECK (Hourly_Rate > 0),
    Day_Rate DECIMAL(4,2) CHECK (Day_Rate > 0),
    Monthly_Rate DECIMAL(4,2) CHECK (Monthly_Rate > 0),
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
    Issue_Date_Time TIMESTAMP NOT NULL,
    Must_Be_Paid_By_Date TIMESTAMP NOT NULL,
    Date_Time_Paid_On TIMESTAMP,
    FOREIGN KEY (Officer_ID) REFERENCES Officer(Officer_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
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
    Space_ID INT NOT  NULL,
    Lot_ID char(255) NOT  NULL,
    Customer_ID char(255) NOT  NULL,
    FOREIGN KEY (Space_ID, Lot_ID) REFERENCES Parking_Space(Space_ID,Lot_ID) ON DELETE CASCADE,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID) ON DELETE CASCADE
);

CREATE TABLE Parking_Pass
(
    Parking_Pass_ID char(255) PRIMARY KEY,
    Issue_Date_Time TIMESTAMP NOT  NULL,
    Expiry_Date_Time TIMESTAMP NOT  NULL,
    Space_ID INT NOT  NULL,
    Lot_ID char(255) NOT  NULL,
    Customer_ID char(255) NOT  NULL,
    FOREIGN KEY (Space_ID, Lot_ID) REFERENCES Parking_Space(Space_ID,Lot_ID) ON DELETE CASCADE,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID) ON DELETE CASCADE
);

-- INSERT STATEMENTS

INSERT INTO Officer VALUES ('E1', 'O1', 'Day','M1');
INSERT INTO Officer VALUES ('E2', 'O2', 'Day', 'M1');
INSERT INTO Officer VALUES ('E3', 'O3', 'Night', 'M4');
INSERT INTO Officer VALUES ('E4', 'O4', 'Night', 'M4');
INSERT INTO Officer VALUES ('E5', 'O5', 'Night', 'M4');

INSERT INTO Fine_Type_Cost VALUES ('Over Time Limit', 60.00);
INSERT INTO Fine_Type_Cost VALUES ('Parking In Non-designated Space', 150.00);
INSERT INTO Fine_Type_Cost VALUES ('Parking In Handicap Space', 250.00);
INSERT INTO Fine_Type_Cost VALUES ('Parking In Emergency Space', 500.00);
INSERT INTO Fine_Type_Cost VALUES ('No Payment', 100.00);

INSERT INTO Fine VALUES ('F1', 'O1', 'C1', '2020-05-29 07:00:00', '2020-06-05', '2020-06-03 18:15:00');
INSERT INTO Fine VALUES ('F2', 'O1', 'C5', '2020-05-29 12:00:00', '2020-06-05', 'NULL');
INSERT INTO Fine VALUES ('F3', 'O2', 'C7', '2020-06-01 15:03:00', '2020-06-08', 'NULL');
INSERT INTO Fine VALUES ('F4', 'O3', 'C8', '2020-06-09 19:00:00', '2020-06-16', '2020-06-10 13:00:00');
INSERT INTO Fine VALUES ('F5', 'O5', 'C10', '2020-06-09 20:13:00', '2020-06-16', 'NULL');

INSERT INTO Fine_ID_Fine_Type VALUES  ('F1', 'Parking In Handicap Space');
INSERT INTO Fine_ID_Fine_Type VALUES  ('F2', 'Over Time Limit ');
INSERT INTO Fine_ID_Fine_Type VALUES  ('F3', 'Over Time Limit ');
INSERT INTO Fine_ID_Fine_Type VALUES  ('F4', 'Over Time Limit ');
INSERT INTO Fine_ID_Fine_Type VALUES  ('F5', 'Parking In Emergency Vehicle Space');

INSERT INTO Costs VALUES ('L1', 11, 'R1');
INSERT INTO Costs VALUES ('L2', 12, 'R1');
INSERT INTO Costs VALUES ('L3', 14, 'R3');
INSERT INTO Costs VALUES ('L4', 14, 'R4');
INSERT INTO Costs VALUES ('L5', 15, 'R4');

INSERT INTO Patrols VALUES ('O1', 'L1');
INSERT INTO Patrols VALUES ('O2', 'L2');
INSERT INTO Patrols VALUES ('O3', 'L2');
INSERT INTO Patrols VALUES ('O4', 'L4');
INSERT INTO Patrols VALUES ('O5', 'L5');