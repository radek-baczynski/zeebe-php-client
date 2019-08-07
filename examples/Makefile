build-docker:
	docker build -t zeebe-client-example .

run:
	docker run --name=zeebe-php -d --rm -v ${PWD}:/app zeebe-client-example

sh:
	docker-compose exec app sh
