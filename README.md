# PROJET PLANTE CONNECTEE

*Thomas Le Naour - Alex Boisseau - Antoine Delbrel*

## Objectif principal

Réaliser une application permettant à un client d’avoir des renseignements sur une liste de plante et de suivre l’état d’une plante, à savoir : la température atmosphérique, l’humidité du sol et la luminosité atmosphérique. Toutes les données seront stockées et actualisées dans une base de données.

## Ressources

Trello : https://trello.com/b/X7B7tMuJ

## Structure de la base de données

Table plants contenant la liste des plantes :
* Identifiant (id)  → INT, A-I, PRIMARY
* Nom de la plante → VARCHAR 255
* Catégorie de la plante → VARCHAR 255
* Description de la plante → TEXT
* Photo(s) de la plante → ?
* Humidité optimale du sol → INT
* Température optimale atmosphérique → INT
* Luminosité optimale → INT
* Période de floraison → VARCHAR 255

Table data contenant les données de la plante :
* Identifiant (id) → INT, A-I, PRIMARY
* Identifiant de la plante → INT
* Humidité → INT
* Température → INT
* Luminosité → INT

## Besoins matériels

* Capteur d’humidité sol https://www.reichelt.com/fr/fr/arduino-capteur-d-humidit-grove-grv-humiditysens-p191174.html?
* Capteur de température https://www.digikey.fr/short/pq991f
* Capteur de luminosité https://www.modmypi.com/raspberry-pi/sensors-1061/lightcolour-1068/adafruit-digital-luminosity-sensor
* Carte Arduino https://store.arduino.cc/arduino-uno-rev3
* Résistances ?
* Câbles ?
* Mini USB vers USB
