CURRENT_PATH := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

DockerCommand := docker compose -p backend-hex-dev -f $(CURRENT_PATH)docker/docker-compose.yml
DockerCommandProd := docker compose -p backend-hex-prod -f $(CURRENT_PATH)docker/docker-compose-prod.yml

.PHONY: up down build prod-up prod-down logs

up:
	$(DockerCommand) up -d

down:
	$(DockerCommand) down

build:
	$(DockerCommand) build

prod-up:
	$(DockerCommandProd) up -d

prod-down:
	$(DockerCommandProd) down

logs:
	$(DockerCommand) logs -f