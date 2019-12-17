#!/bin/bash
VERSION=$(grep -E -o 'Version: ([0-9.]+)' ltucillo-fixed-notices.php | grep -E -o '([0-9.]+)')
mkdir release_dir
svn co https://plugins.svn.wordpress.org/ltucillo-fixed-notices release_dir
cp -r pre_release/* release_dir
ls -la release_dir
cd release_dir/trunk || exit
ls -la
svn stat | grep \? | awk '{print $2}' | xargs svn add
svn ci -m $TRAVIS_COMMIT_MESSAGE
cd ../../ || exit \
  && rm -rf release_dir
svn cp https://plugins.svn.wordpress.org/ltucillo-fixed-notices/trunk https://plugins.svn.wordpress.org/ltucillo-fixed-notices/tags/$VERSION -m "$VERSION"
