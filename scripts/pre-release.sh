#!/bin/bash
mkdir pre_release
cp -r * pre_release
rm -rf pre_release/.travis.yml \
       pre_release/README.md \
       pre_release/scripts
