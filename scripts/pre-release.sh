#!/bin/bash
tar \
  --exclude=.travis.yml \
  --exclude=README.md \
  --exclude=scripts \
  -cvzf $FILENAME *
