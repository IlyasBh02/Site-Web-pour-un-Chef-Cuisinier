CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(25) NOT NULL, 
    prenom VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE, 
    tele VARCHAR(15) NOT NULL,
    adress TEXT NOT NULL,   
    password VARCHAR(255) NOT NULL,
    role ENUM('client', 'chef') NOT NULL 
);

CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(25) NOT NULL
);


CREATE TABLE plat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(25) NOT NULL,
    ingridiant TEXT NOT NULL,
    menuId INT NOT NULL, 
    image VARCHAR(255),
    FOREIGN KEY (menuId) REFERENCES menu(id)
);


CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clientId INT NOT NULL,
    menuId INT NOT NULL,
    datereservation DATE NOT NULL,
    heur TIME NOT NULL, 
    nombrePersone INT NOT NULL,
    status ENUM('en attente', 'acceptée', 'refusée') NOT NULL,
    FOREIGN KEY (clientId) REFERENCES client(id),
    FOREIGN KEY (menuId) REFERENCES menu(id)
);


INSERT INTO client (nom, prenom, email, tele, adress, password, role)
VALUES ('Dupont', 'Jean', 'jean.dupont@example.com', '0123456789', '123 Rue Exemple', 'hashed_password_jean', 'client'),
       ('Martin', 'Sophie', 'sophie.martin@example.com', '0987654321', '456 Avenue Exemple', 'hashed_password_sophie', 'client');

INSERT INTO menu (nom) VALUES ('Menu Gourmand'), ('Menu Végétarien');

INSERT INTO plat (nom, ingridiant, menuId, image)
VALUES  ('Steak Frites', 'Steak, pommes de terre', 1, 'steak_frites.jpg'),
        ('Salade de Quinoa', 'Quinoa, légumes frais', 2, 'salade_quinoa.jpg');
        ('Salade César', 'Salade romaine, poulet grillé, sauce César', 1, 'salade_cesar.jpg'),
        ('Bruschetta', 'Pain grillé, tomates fraîches, basilic', 2, 'bruschetta.jpg'),
        ('Lasagne Végétarienne', 'Lasagne aux légumes de saison', 2, 'lasagne_vegetarienne.jpg');

INSERT INTO reservation (clientId, menuId, datereservation, heur, nombrePersone, status)
VALUES (1, 1, '2024-12-20', '19:00', 4, 'en attente'),
       (2, 2, '2024-12-21', '20:00', 2, 'acceptée');




CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(25) NOT NULL,
    email VARCHAR(150) NOT NULL,
    sujet VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP
);
