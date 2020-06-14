CREATE TABLE Parking_Lot
(
    Lot_ID char(255) PRIMARY KEY,
    Address char(255) UNIQUE NOT NULL
);

CREATE TABLE Rate
(
    Rate_Type char(255),
    Hourly_Rate DECIMAL(10,2) CHECK (Hourly_Rate > 0),
    Day_Rate DECIMAL(10,2) CHECK (Day_Rate > 0),
    Monthly_Rate DECIMAL(10,2) CHECK (Monthly_Rate > 0),
    PRIMARY KEY (Rate_Type)
);

CREATE TABLE Parking_Space
(
    Space_ID INT,
    Lot_ID char(255),
    Space_Type char(255) NOT NULL,
    Is_Occupied char(255) NOT NULL,
    PRIMARY KEY (Space_ID, Lot_ID),
    FOREIGN KEY (Lot_ID) REFERENCES Parking_Lot(Lot_ID) ON DELETE CASCADE,
    FOREIGN KEY (Space_Type) References Rate(Rate_Type)
);

CREATE TABLE Customer
(
    Customer_ID Char(255),
    License_Plate Char(255) NOT NULL,
    Primary Key (Customer_ID)
);

CREATE TABLE Pass_Holder
(
    Customer_ID Char(255),
    First_Name Char(255) NOT NULL,
    Last_Name Char(255) NOT NULL,
    Phone_Number Char(255) NOT NULL UNIQUE,
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
    Employment_Status Char(255) DEFAULT 'ACTIVE',
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
    Salary DECIMAL (10,2) CHECK (Salary > 0)
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
    Shift CHAR(255),
    Managed_By_ID CHAR(255) NOT NULL,
    FOREIGN KEY (Employee_ID) REFERENCES Parking_Lot_Employee(Employee_ID) ON DELETE CASCADE,
    FOREIGN KEY (Managed_By_ID) REFERENCES Manager(Manager_ID)
);

CREATE TABLE Fine_Type_Cost
(
    Fine_Type CHAR(255) PRIMARY KEY,
    Cost DECIMAL(10,2) CHECK (Cost > 0)
);

CREATE TABLE Fine
(
    Fine_ID CHAR(255) PRIMARY KEY,
    Officer_ID CHAR(255) NOT NULL,
    Customer_ID CHAR(255) NOT NULL,
    Issue_Date_Time DATETIME NOT NULL,
    Must_Be_Paid_By_Date DATETIME NOT NULL,
    Date_Time_Paid_On DATETIME,
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
    Issue_Date_Time DATETIME NOT  NULL,
    Expiry_Date_Time DATETIME NOT  NULL,
    Lot_ID char(255) NOT  NULL,
    Space_ID INT NOT  NULL,
    Customer_ID char(255) NOT  NULL,
    FOREIGN KEY (Space_ID, Lot_ID) REFERENCES Parking_Space(Space_ID,Lot_ID) ON DELETE CASCADE,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID) ON DELETE CASCADE
);

CREATE TABLE Parking_Pass
(
    Parking_Pass_ID char(255) PRIMARY KEY,
    Issue_Date_Time DATETIME NOT  NULL,
    Expiry_Date_Time DATETIME NOT  NULL,
    Lot_ID char(255) NOT  NULL,
    Space_ID INT NOT  NULL,
    Customer_ID char(255) NOT  NULL,
    FOREIGN KEY (Space_ID, Lot_ID) REFERENCES Parking_Space(Space_ID,Lot_ID) ON DELETE CASCADE,
    FOREIGN KEY (Customer_ID) REFERENCES Pass_Holder(Customer_ID) ON DELETE CASCADE
);
