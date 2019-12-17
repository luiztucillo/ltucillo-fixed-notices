#!/bin/bash
FILENAME=teste.tar.gz
tar \
  --exclude=.travis.yml \
  --exclude=README.md \
  --exclude=scripts \
  -cvf $FILENAME *

mkdir pre_release
cp $FILENAME pre_release
cd pre_release || exit
tar -xzf $FILENAME
ls -la
rm $FILENAME
