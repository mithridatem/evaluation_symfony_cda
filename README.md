# evaluation_symfony_cda
Pour récupérer la correction :
1 cloner le repository :
```bash
git clone https://github.com/mithridatem/evaluation_symfony_cda.git
```
2 Se déplacer dans le répertoire :
```bash
cd evaluation_symfony
```
3 Créer un fichier .env
4 installer les dépendances :
```bash
composer install
```
5 créer la base de données :
```bash
symfony console d:d:c
```
6 appliquer le fichier de migration :
```bash
symfony console d:m:m
```
7 lancer le serveur :
```bash
symfony server:start -d
```
