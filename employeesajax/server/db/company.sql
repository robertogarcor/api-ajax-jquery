/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Roberto García
 * Created: 04-jul-2016
 */

DROP DATABASE IF EXISTS company;

CREATE DATABASE IF NOT EXISTS company;

USE company;

CREATE TABLE IF NOT EXISTS companies(
    id INTEGER AUTO_INCREMENT,
    nif CHAR(9) NOT NULL,
    name VARCHAR(25) NOT NULL UNIQUE,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT PK_idcompany PRIMARY KEY (id)    
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


CREATE TABLE IF NOT EXISTS departments(
    id INTEGER AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL,
    company_id INTEGER NOT NULL,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT PK_iddeparment PRIMARY KEY(id),
    CONSTRAINT FK_companies_departments FOREIGN KEY (company_id)
        REFERENCES companies(id) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


CREATE TABLE IF NOT EXISTS roles(
    id INTEGER AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL UNIQUE,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT PK_idrole PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


CREATE TABLE IF NOT EXISTS employees(
    id INTEGER AUTO_INCREMENT,
    dni CHAR(9) NOT NULL UNIQUE,
    firstname VARCHAR(45) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    phone INTEGER UNIQUE,
    email VARCHAR(45) UNIQUE,
    department_id INTEGER NOT NULL,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT PK_idemployee PRIMARY KEY(id),
    CONSTRAINT FK_departments_employees FOREIGN KEY (department_id)
        REFERENCES departments(id) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


CREATE TABLE IF NOT EXISTS users(
    id INTEGER NOT NULL,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INTEGER NOT NULL,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT PK_iduser PRIMARY KEY (id),
    CONSTRAINT FK_roles_users FOREIGN KEY (role_id) 
        REFERENCES roles(id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_employees_users FOREIGN KEY(id)
        REFERENCES employees(id) ON UPDATE CASCADE ON DELETE RESTRICT    
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


INSERT INTO companies VALUES
(null,'A11111111','Wonka',NOW(),null);


INSERT INTO departments VALUES
(null,'Marketing','1',NOW(),null),
(null,'Sales','1',NOW(),null),
(null,'Ruman Resourses','1',NOW(),null),
(null,'Accounts','1',NOW(),null);


INSERT INTO roles VALUES
(1,'Admin',NOW(),null),
(2,'User',NOW(),null);

INSERT INTO employees VALUES
(null,'22222222C','Roberto','Garcia','1974/10/10',444555666,'email@email.com',3,NOW(),null),
(null,'33333333D','David','Apellido1','1977/12/10',555666777,'email1@email.com',3,NOW(),null),
(null,'44444444E','Adrian','Apellido2','1978/02/12',555666888,'email2@email.com',1,NOW(),null),
(null,'55555555F','Ferran','Apellido3','1976/01/05',777666999,'email3@email.com',2,NOW(),null),
(null,'66666666G','Winki','Apellido4','1975/03/01',777888000,'email4@email.com',4,NOW(),null),
(null,'88888888D','Ferran','Apellido3','1976/01/01',111222999,'email5@email.com',4,NOW(),null);


INSERT INTO users VALUES
(1,'Roberto','1234','1',NOW(),null),
(2,'David','1234','1',NOW(),null),
(3,'Adrian','4321','1',NOW(),null),
(4,'Ferran','4321','2',NOW(),null),
(5,'Winki','1234','2',NOW(),null),
(6,'Maky','4321','2',NOW(),null);


