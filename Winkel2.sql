CREATE DATABASE Winkel2;

USE Winkel2;

CREATE TABLE IF NOT EXISTS producten (
    product_code INT,
    product_naam VARCHAR(255), 
    prijs_per_stuk DECIMAL(10, 2),
    omschrijving TEXT 
);

