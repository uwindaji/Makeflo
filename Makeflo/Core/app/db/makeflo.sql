#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id_user  Int  Auto_increment  NOT NULL ,
        nom      Varchar (40) NOT NULL ,
        prenom   Varchar (40) NOT NULL ,
        tel      Varchar (40) NOT NULL ,
        mail     Varchar (40) NOT NULL ,
        password Varchar (40) NOT NULL ,
        type     Varchar (40) NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Abonnement
#------------------------------------------------------------

CREATE TABLE Abonnement(
        id_services Int  Auto_increment  NOT NULL ,
        nom         Varchar (40) NOT NULL ,
        description Varchar (255) NOT NULL ,
        prix        DECIMAL (15,3)  NOT NULL ,
        date_achat  Date NOT NULL ,
        date_exp    Date NOT NULL
	,CONSTRAINT Abonnement_PK PRIMARY KEY (id_services)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Messages
#------------------------------------------------------------

CREATE TABLE Messages(
        id_message Int  Auto_increment  NOT NULL ,
        sujet      Varchar (255) NOT NULL ,
        message    Varchar (255) NOT NULL ,
        date       Datetime NOT NULL ,
        id_user    Int NOT NULL
	,CONSTRAINT Messages_PK PRIMARY KEY (id_message)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Token
#------------------------------------------------------------

CREATE TABLE Token(
        id_token Int  Auto_increment  NOT NULL ,
        token    Varchar (40) NOT NULL ,
        date     Int NOT NULL ,
        state    Bool
	,CONSTRAINT Token_PK PRIMARY KEY (id_token)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Paiement
#------------------------------------------------------------

CREATE TABLE Paiement(
        id_paiement Int  Auto_increment  NOT NULL ,
        date        Date NOT NULL ,
        next        Date NOT NULL
	,CONSTRAINT Paiement_PK PRIMARY KEY (id_paiement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Souscrire
#------------------------------------------------------------

CREATE TABLE Souscrire(
        id_services Int NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT Souscrire_PK PRIMARY KEY (id_services,id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: `Change`
#------------------------------------------------------------

CREATE TABLE `Change`(
        id_token Int NOT NULL ,
        id_user  Int NOT NULL
	,CONSTRAINT Change_PK PRIMARY KEY (id_token,id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Paie
#------------------------------------------------------------

CREATE TABLE Paie(
        id_paiement Int NOT NULL ,
        id_services Int NOT NULL
	,CONSTRAINT Paie_PK PRIMARY KEY (id_paiement,id_services)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Project
#------------------------------------------------------------

CREATE TABLE Project(
        id_project  Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        description Varchar (255) NOT NULL ,
        deadline    Date NOT NULL ,
        id_user     Int NOT NULL ,
        id_file     Int NOT NULL
	,CONSTRAINT Project_PK PRIMARY KEY (id_project)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: File
#------------------------------------------------------------

CREATE TABLE File(
        id_file    Int  Auto_increment  NOT NULL ,
        url        Varchar (20) NOT NULL ,
        id_project Int NOT NULL ,
        id_user    Int NOT NULL
	,CONSTRAINT File_PK PRIMARY KEY (id_file)
)ENGINE=InnoDB;




ALTER TABLE Messages
	ADD CONSTRAINT Messages_User0_FK
	FOREIGN KEY (id_user)
	REFERENCES User(id_user);

ALTER TABLE Souscrire
	ADD CONSTRAINT Souscrire_Abonnement0_FK
	FOREIGN KEY (id_services)
	REFERENCES Abonnement(id_services);

ALTER TABLE Souscrire
	ADD CONSTRAINT Souscrire_User1_FK
	FOREIGN KEY (id_user)
	REFERENCES User(id_user);

ALTER TABLE `Change`
	ADD CONSTRAINT Change_Token0_FK
	FOREIGN KEY (id_token)
	REFERENCES Token(id_token);

ALTER TABLE `Change`
	ADD CONSTRAINT Change_User1_FK
	FOREIGN KEY (id_user)
	REFERENCES User(id_user);

ALTER TABLE Paie
	ADD CONSTRAINT Paie_Paiement0_FK
	FOREIGN KEY (id_paiement)
	REFERENCES Paiement(id_paiement);

ALTER TABLE Paie
	ADD CONSTRAINT Paie_Abonnement1_FK
	FOREIGN KEY (id_services)
	REFERENCES Abonnement(id_services);

ALTER TABLE Project
	ADD CONSTRAINT Project_User0_FK
	FOREIGN KEY (id_user)
	REFERENCES User(id_user);

ALTER TABLE Project
	ADD CONSTRAINT Project_File1_FK
	FOREIGN KEY (id_file)
	REFERENCES File(id_file);

ALTER TABLE Project 
	ADD CONSTRAINT Project_File0_AK 
	UNIQUE (id_file);

ALTER TABLE File
	ADD CONSTRAINT File_Project0_FK
	FOREIGN KEY (id_project)
	REFERENCES Project(id_project);

ALTER TABLE File
	ADD CONSTRAINT File_User1_FK
	FOREIGN KEY (id_user)
	REFERENCES User(id_user);

ALTER TABLE File 
	ADD CONSTRAINT File_Project0_AK 
	UNIQUE (id_project);
