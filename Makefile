NAME = imega/composer
TAG = 1.0.1

build:
	@docker run --rm -v `pwd`:/data $(NAME):$(TAG) install

test:
	php vendor/bin/phpunit

.PHONY: build test
