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
    Last_Name Char(255) NOT NULL,
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
    Manager_ID CHAR(255),
    Manager_Type CHAR(255),
    PRIMARY KEY (Manager_ID,Manager_Type),
    FOREIGN KEY (Manager_ID) REFERENCES Manager(Manager_ID) ON DELETE CASCADE,
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

INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C1', 'AB123C');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C2', 'DE456F');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C3', 'GH789I');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C4', 'JK012L');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C5', 'MN345O');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C6', 'PQ678R');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C7', 'ST901U');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C8', 'VW234X');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C9', 'YZ567A');
INSERT INTO CUSTOMER (Customer_ID, License_Plate) values ('C10', 'AB890C');

INSERT INTO Pass_Holder (Customer_ID, First_Name, Last_Name, Phone_Number, Address, Email)  values ('C1', 'John', 'Park', '7783456789', '120 Smith St', 'jpark@gmail.com');
INSERT INTO Pass_Holder (Customer_ID, First_Name, Last_Name, Phone_Number, Address, Email)  values ('C2', 'Samantha', 'James', '6043456789', '360 Night Blvd', 'sjames@gmail.com');
INSERT INTO Pass_Holder (Customer_ID, First_Name, Last_Name, Phone_Number, Address, Email)  values ('C3', 'Gagan', 'Patel', '2503456789', '520 Oak Dr', 'gpatel@gmail.com');
INSERT INTO Pass_Holder (Customer_ID, First_Name, Last_Name, Phone_Number, Address, Email)  values ('C4', 'Xiyu', 'Wang', '7789385723', '220 Boulder Ave', 'xwang@gmail.com');
INSERT INTO Pass_Holder (Customer_ID, First_Name, Last_Name, Phone_Number, Address, Email)  values ('C5', 'Franklin', 'Clinton', '2360439587', '55 Ioco Rd', 'fclinton@gmail.com');

INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E1', 'DaMarcus', 'James', '22-mar-19', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E2', 'Charlie', 'Dang', '04-oct-19', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E3', 'Vincent', 'Davidson', '14-jan-20', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E4', 'Hikaru', 'Nakamura', '30-aug-17', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E5', 'Sara', 'Rhodes', '06-jul-18', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E6', 'Margaret', 'Von Dutch', '17-jun-15', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E7', 'Walter', 'White', '01-dec-13', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E8', 'Shannon', 'Fitzgerald', '24-feb-09', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E9', 'Bart', 'Simpson', '05-may-16', 'ACTIVE');
INSERT INTO Parking_Lot_Employee (Employee_ID, First_Name, Last_Name, Hiring_Date, Employment_Status) values ('E10', 'Lisa', 'Samani', '07-jun-06', 'ACTIVE');

INSERT INTO Manager (Employee_ID, Manager_ID, Managed_By_ID) VALUES ('E10', 'M5', null);
INSERT INTO Manager (Employee_ID, Manager_ID, Managed_By_ID) VALUES ('E8', 'M3', 'M5');
INSERT INTO Manager (Employee_ID, Manager_ID, Managed_By_ID) VALUES ('E7', 'M2', 'M3');
INSERT INTO Manager (Employee_ID, Manager_ID, Managed_By_ID) VALUES ('E9', 'M4', 'M2');
INSERT INTO Manager (Employee_ID, Manager_ID, Managed_By_ID) VALUES ('E6', 'M1', 'M2');







