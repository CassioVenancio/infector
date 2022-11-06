#!/bin/bash

docker run -e URL_ROUTE=$URL_ROUTE --rm -it -v /tmp/sqlmap:/root/.sqlmap/ infector/sqlmap --url "$URL_ROUTE"