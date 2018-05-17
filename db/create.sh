#!/bin/sh

if [ "$1" = "travis" ]
then
    psql -U postgres -c "CREATE DATABASE final2016_test;"
    psql -U postgres -c "CREATE USER final2016 PASSWORD 'final2016' SUPERUSER;"
else
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists final2016
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists final2016_test
    [ "$1" != "test" ] && sudo -u postgres dropuser --if-exists final2016
    sudo -u postgres psql -c "CREATE USER final2016 PASSWORD 'final2016' SUPERUSER;"
    [ "$1" != "test" ] && sudo -u postgres createdb -O final2016 final2016
    sudo -u postgres createdb -O final2016 final2016_test
    LINE="localhost:5432:*:final2016:final2016"
    FILE=~/.pgpass
    if [ ! -f $FILE ]
    then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE
    then
        echo "$LINE" >> $FILE
    fi
fi
