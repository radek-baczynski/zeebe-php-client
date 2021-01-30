VERSION=`cat VERSION`

build-client:
	docker build -f build/Dockerfile . -t zeebe-client-builder
	docker run --rm -w /zeebe/build -v ${PWD}:/zeebe zeebe-client-builder sh gen.sh $(version)
	git add ./src/

tag:
	git commit --all -m "Zeebe client generated: $(VERSION)"
	git tag -a v$(VERSION) -m "Zeebe client version: $(VERSION)"

push-release:
	git push origin v$(VERSION)

release: build-client tag push-release
