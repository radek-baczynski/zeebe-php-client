VERSION=`cat VERSION`

build-client:
	docker build -f build/Dockerfile . -t zeebe-client-builder
	docker run --rm -w /zeebe/build -v ${PWD}:/zeebe zeebe-client-builder sh gen.sh $(version)

tag:
	git tag v$(VERSION)

push-release:
	git push origin v$(VERSION)
