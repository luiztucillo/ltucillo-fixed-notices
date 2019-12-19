#!/bin/bash
FILENAME=${TRAVIS_BRANCH}-${TRAVIS_BUILD_NUMBER}.tar.gz
tar \
  --exclude=.travis.yml \
  --exclude=README.md \
  --exclude=scripts \
  -cvf $FILENAME *

mkdir pre_release
cp $FILENAME pre_release
cd pre_release || exit
tar -xzf $FILENAME
rm $FILENAME
printf '\nPRE RELEASE FOLDER\n'
ls -la