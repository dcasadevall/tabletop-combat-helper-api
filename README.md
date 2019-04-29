# Tabletop Combat Helper API

This project contains the source for a backend API used to store assets and configuration data
used in the Tabletop Combat Helper Unity Client and Angular frontend client.

You can find these here:

  ## Unity Client

  https://github.com/dcasadevall/tabletop-combat-helper

  ## Web Admin Client (Angular 7)

  https://github.com/dcasadevall/tabletop-combat-helper-admin

# Deploying the server (Locally with docker)

From ./docker:

  docker-compose up
  
This will create a new set of mysql + php + nginx containers running the API.
You will now be able to hit the API by pinging localhost:8080.

NOTE: The db will be persisted in /opt/mysql_data on your machine.
Change the volume entry at ./docker/docker_compose.yml if you wish to change that.

# Deploying the server (Remotely with docker)

Simply use any cloud service to deploy your docker compose setup and access it remotely. This may be quicker and more reliable than going with an FTP dump of the source.

# Deploying the server (without docker)

Simply dump the code into a hosted supporting PHP 7.0 and MySQL 5.3+. This is the least preferred option, but will get you up and running with one of the few free hosting services that let you have a PHP + MySQL instance.
