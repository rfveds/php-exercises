# Makefile for managing Docker containers

# Variables
DOCKER_COMPOSE = docker-compose -f docker/docker-compose.yaml
YELLOW = \033[1;33m
GREEN = \033[1;32m
RESET = \033[0m

# Targets
.PHONY: build up down start stop restart logs help composer-install dump-autoload test

help:
	@echo "$(YELLOW)Available commands:$(RESET)"
	@echo  "$(GREEN)build$(RESET)   - Build the Docker containers"
	@echo  "$(GREEN)up$(RESET)      - Start the Docker containers"
	@echo  "$(GREEN)down$(RESET)    - Stop and remove the Docker containers"
	@echo  "$(GREEN)logs$(RESET)    - View the logs of the Docker containers"
	@echo  "$(GREEN)composer-install$(RESET) - Install composer dependencies"
	@echo  "$(GREEN)dump-autoload$(RESET) - Dump autoload files"
	@echo  "$(GREEN)test$(RESET)    - Run tests"

build:
	@echo  "$(YELLOW)Building Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) build

up:
	@echo  "$(YELLOW)Starting Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) up -d

down:
	@echo  "$(YELLOW)Stopping and removing Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) down

logs:
	@echo  "$(YELLOW)Viewing logs of Docker containers...$(RESET)"
	$(DOCKER_COMPOSE) logs -f

composer-install:
	@echo  "$(YELLOW)Installing composer dependencies...$(RESET)"
	$(DOCKER_COMPOSE) exec app composer install

dump-autoload:
	@echo  "$(YELLOW)Dumping autoload files...$(RESET)"
	$(DOCKER_COMPOSE) exec app composer dump-autoload

test:
	@echo  "$(YELLOW)Running tests...$(RESET)"
	$(DOCKER_COMPOSE) exec app ./vendor/bin/phpunit