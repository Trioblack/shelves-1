CREATE TABLE Account(
  userID INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
  fName VARCHAR(25) NOT NULL,
  lName VARCHAR(25) NOT NULL,
  email VARCHAR(50) NOT NULL,
  specialSub TINYINT(1) DEFAULT 0,
  PRIMARY KEY(userID)
);

CREATE TABLE Category(
  catID INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
  catName VARCHAR(15) NOT NULL,
  PRIMARY KEY (catID)
);

CREATE TABLE Promotion(
  promotionID INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
  promotionTitle VARCHAR(255) NOT NULL,
  promotionDesc VARCHAR(255),
  startDate DATE NOT NULL,
  endDate DATE NOT NULL,
  PRIMARY KEY(promotionID)
);

CREATE TABLE Product(
  prodID INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
  prodName VARCHAR(128) NOT NULL,
  price DECIMAL(8, 2) NOT NULL,
  priceUnit VARCHAR(15),
  decript VARCHAR(255),
  quantity INTEGER NOT NULL,
  image VARCHAR(128),
  catID INTEGER NOT NULL,
  subCatID INTEGER,
  FOREIGN KEY(catID) REFERENCES Category(catID),
  FOREIGN KEY(subCatID) REFERENCES SubCategory(subCatID),
  PRIMARY KEY(prodID)
);

CREATE TABLE ProductPromotion(
  promotionID INTEGER NOT NULL,
  prodID INTEGER NOT NULL,
  discount INTEGER NOT NULL,
  FOREIGN KEY(promotionID) REFERENCES Promotion(promotionID),
  FOREIGN KEY(prodID) REFERENCES Product(prodID),
  PRIMARY KEY(promotionID, prodID)
);

CREATE TABLE Address(
  addressID INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
  userID Integer NOT NULL,
  unit VARCHAR(30),
  streetNo VARCHAR(7) NOT NULL,
  streetName VARCHAR(30) NOT NULL,
  street VARCHAR(15) NOT NULL,
  city VARCHAR(15) NOT NULL,
  postcode INTEGER NOT NULL,
  state VARCHAR(15) NOT NULL,
  primaryAddress TINYINT(1) NOT NULL DEFAULT 0,
  FOREIGN KEY(userID) REFERENCES Account(userID),
  PRIMARY KEY(addressID, userID)
);

CREATE TABLE OrderBag(
  orderBagID INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
  userID INTEGER NOT NULL,
  totalCharge DECIMAL(4, 2) NOT NULL,
  dateMade DATE NOT NULL,
  dateDelivered DATE,
  addressID INTEGER NOT NULL,
  orderBagNotes VARCHAR(100),
  FOREIGN KEY(userID) REFERENCES Account(userID),
  FOREIGN KEY(addressID) REFERENCES Address(addressID),
  PRIMARY KEY(orderBagID)
);

CREATE TABLE OrderBagList(
  orderBagID INTEGER NOT NULL,
  prodID INTEGER NOT NULL,
  quantity INTEGER NOT NULL,
  FOREIGN KEY(orderBagID) REFERENCES OrderBag(orderBagID),
  FOREIGN KEY(prodID) REFERENCES Product(prodID),
  PRIMARY KEY(orderBagID, prodID)
);

CREATE TABLE Login(
  userID INTEGER UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  userLevel INTEGER NOT NULL,
  FOREIGN KEY(userID) REFERENCES Account(userID),
  PRIMARY KEY(userID)
);

CREATE TABLE SubCategory(
  subCatID INTEGER UNIQUE NOT NULL AUTO_INCREMENT,
  catID INTEGER NOT NULL,
  subCatName VARCHAR(15) NOT NULL,
  FOREIGN KEY(catID) REFERENCES Category(catID),
  PRIMARY KEY(subCatID)
);
