#!/bin/bash
tar \
  --exclude=.travis.yml \
  --exclude=README.md \
  --exclude=scripts \
  -cvf $FILENAME *
