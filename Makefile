# Makefile for managing Docker containers

# Variables
DOCKER_COMPOSE = docker-compose -f docker/docker-compose.yaml
YELLOW = \033[1;33m
GREEN = \033[1;32m
RESET = \033[0m

# Targets
.PHONY: build up down start stop restart logs help

help:
	@echo "$(YELLOW)Available commands:$(RESET)"
	@echo  "$(GREEN)build$(RESET)   - Build the Docker containers"
	@echo  "$(GREEN)up$(RESET)      - Start the Docker containers"
	@echo  "$(GREEN)down$(RESET)    - Stop and remove the Docker containers"
	@echo  "$(GREEN)start$(RESET)   - Start existing Docker containers"
	@echo  "$(GREEN)stop$(RESET)    - Stop the Docker containers"
	@echo  "$(GREEN)restart$(RESET) - Restart the Docker containers"
	@echo  "$(GREEN)logs$(RESET)    - View the logs of the Docker containers"

build:
	@echo  "$(YELLOW)Building Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) build

up:
	@echo  "$(YELLOW)Starting Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) up -d

down:
	@echo  "$(YELLOW)Stopping and removing Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) down

start:
	@echo  "$(YELLOW)Starting existing Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) start

stop:
	@echo  "$(YELLOW)Stopping Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) stop

restart:
	@echo  "$(YELLOW)Restarting Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) restart

logs:
	@echo  "$(YELLOW)Viewing logs of Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) logs -f