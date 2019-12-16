#!/bin/bash
cd pre_release \
  && tar -cvz -f $REPO-$TRAVIS_BRANCH-$TRAVIS_BUILD_NUMBER.tar.gz * \
  && mv $REPO-$TRAVIS_BRANCH-$TRAVIS_BUILD_NUMBER.tar.gz ../ \
  && cd ../ || exit
