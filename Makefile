NAME = imega/composer
TAG = 1.0.1

build:
	@docker run --rm -v `pwd`:/data $(NAME):$(TAG) install --dev --prefer-source --no-interaction

test:
	@docker run --rm -v `pwd`:/usr/src/myapp -w /usr/src/myapp php:5.6-cli vendor/bin/phpunit

.PHONY: build test
