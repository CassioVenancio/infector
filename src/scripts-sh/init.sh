#!/bin/bash
cd ..

mkdir build-sqlmap

cd build-sqlmap

git clone https://github.com/sqlmapproject/sqlmap.git

rm -rf ./sqlmap/.git/

# create Dockerfile
cat > Dockerfile << _EOF_
FROM alpine:3.1
MAINTAINER Cássio Venâncio
RUN apk add --update python
COPY sqlmap/ /sqlmap/
WORKDIR /sqlmap
ENTRYPOINT ["python", "sqlmap.py"]
_EOF_

# build the image
docker build -t infector/sqlmap .

# exit with code 0