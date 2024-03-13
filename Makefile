install:
	composer install
validate:
	composer validate
brain-games:
	./bin/brain-games
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	./bin/brain-even
brain-calc:
	./bin/brain-calc


