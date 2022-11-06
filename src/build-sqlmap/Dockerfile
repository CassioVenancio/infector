FROM alpine:3.1
MAINTAINER Cássio Venâncio
RUN apk add --update python
COPY sqlmap/ /sqlmap/
WORKDIR /sqlmap
ENTRYPOINT ["python", "sqlmap.py"]
