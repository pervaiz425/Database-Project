-- Create Society table
CREATE TABLE Society
(
    SocietyID INT PRIMARY KEY,
    SocietyName NVARCHAR(255) NOT NULL,
    MembershipFee DECIMAL(10, 2) NOT NULL,
    CategoryID INT,
    SocietyDescription NVARCHAR(MAX),
    CONSTRAINT FK_Category FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
);

-- Create Category table
CREATE TABLE Category
(
    CategoryID INT PRIMARY KEY,
    CategoryName NVARCHAR(50) NOT NULL
);
