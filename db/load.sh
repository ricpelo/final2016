#!/bin/sh

BASE_DIR=$(dirname $(readlink -f "$0"))
if [ "$1" != "test" ]
then
    psql -h localhost -U final2016 -d final2016 < $BASE_DIR/final2016.sql
fi
psql -h localhost -U final2016 -d final2016_test < $BASE_DIR/final2016.sql
