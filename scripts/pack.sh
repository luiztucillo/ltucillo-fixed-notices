#!/bin/bash
FILENAME=$TRAVIS_BRANCH-$TRAVIS_BUILD_NUMBER.tar.gz
echo $FILENAME
cd pre_release \
  && tar -cvz -f $FILENAME * \
  && mv $FILENAME ../ \
  && cd ../ || exit
