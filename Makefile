NAME = imega/composer
TAG = 1.0.1

build:
	@docker run --rm -v `pwd`:/data $(NAME):$(TAG) install --dev --prefer-source --no-interaction

load:
	@docker run --rm -v `pwd`:/data $(NAME):$(TAG) dumpautoload

test:
	php vendor/bin/phpunit

.PHONY: build test
