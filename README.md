
# Backend Hexagonal

Backend Hexagonal application is an attempt to apply my understanding of Hexagonal architecture (Ports and Adapters) style in PHP. Lots of improvements can be done of course (i.e. introducing CI and autowiring.. etc).

# Installation
First off, you need to verify if you have Docker installed by running this command in your console.

`> docker -v`

If not, refer to the Docker installation [here](https://docs.docker.com/get-docker/).

## Docker commands
**Note:** Run the following commands from the root directory **not** from the docker directory!
> Build and run **dev** container

`> docker compose -p backend-hex-dev -f docker/docker-compose.yml up -d --build`

For developers on MAC you could use:

`> make up`

You can now start the development and your local application will be available here: http://localhost:8098

> Stop and remove **dev** container

`> docker compose -p backend-hex-dev -f docker/docker-compose.yml down`

For developers on MAC you could use:

`> make down`

## Production (simulation)

You could perhaps set up a local SSL and use this container to simulate running your endpoints via SSL! But I'll leave this to you 🙂

> Build and run **dev** container

`> docker compose -p backend-hex-prod -f docker/docker-compose-prod.yml up -d --build`

For developers on MAC you could use:

`> make prod-up`

You can now start the development and your local application will be available here: http://localhost:8099/

> Stop and remove **dev** container

`> docker compose -p backend-hex-prod -f docker/docker-compose-prod.yml down`

For developers on MAC you could use:

`> make prod-down`