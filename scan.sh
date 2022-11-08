#!/bin/bash



docker run -e URL_ROUTE=$URL_ROUTE --rm -it -v /tmp/sqlmap:/root/.sqlmap/ infector/sqlmap -u $URL_ROUTE --random-agent
