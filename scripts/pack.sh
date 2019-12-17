#!/bin/bash
FILENAME=(${REPO}-${TRAVIS_BRANCH}-${TRAVIS_BUILD_NUMBER}).tar.gz
cd pre_release \
  && tar -cvz -f $FILENAME * \
  && mv FILENAME ../ \
  && cd ../ || exit
