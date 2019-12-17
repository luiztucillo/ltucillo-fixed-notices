#!/bin/bash
VERSION=$(grep -E -o 'Version: ([0-9.]+)' ltucillo-fixed-notices.php | grep -E -o '([0-9.]+)')
echo 'mkdir release_dir'
mkdir release_dir
echo 'svn co https://plugins.svn.wordpress.org/ltucillo-fixed-notices release_dir'
svn co https://plugins.svn.wordpress.org/ltucillo-fixed-notices release_dir
echo 'ls -la'
ls -la
echo 'cp -r pre_release/* release_dir'
cp -r pre_release/* release_dir
echo 'cd release_dir/trunk || exit'
cd release_dir/trunk || exit
echo 'stat | grep \? | awk '{print $2}' | xargs svn add'
svn stat | grep \? | awk '{print $2}' | xargs svn add
echo 'svn ci -m $TRAVIS_COMMIT_MESSAGE'
svn ci -m $TRAVIS_COMMIT_MESSAGE
echo 'cd ../../ || exit && rm -rf release_dir'
cd ../../ || exit \
  && rm -rf release_dir
echo 'svn cp https://plugins.svn.wordpress.org/ltucillo-fixed-notices/trunk https://plugins.svn.wordpress.org/ltucillo-fixed-notices/tags/$VERSION -m "$VERSION"'
svn cp https://plugins.svn.wordpress.org/ltucillo-fixed-notices/trunk https://plugins.svn.wordpress.org/ltucillo-fixed-notices/tags/$VERSION -m "$VERSION"
