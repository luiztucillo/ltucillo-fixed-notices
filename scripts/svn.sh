#!/bin/bash
VERSION=$(grep -E -o 'Version: ([0-9.]+)' ltucillo-fixed-notices.php | grep -E -o '([0-9.]+)')
mkdir release_dir
svn co https://plugins.svn.wordpress.org/ltucillo-fixed-notices release_dir
cp -r pre_release/* release_dir/trunk
cd release_dir/trunk || exit
printf '\n\nTrying to add new files...\n\n'
svn stat | grep \? | awk '{print $2}' | xargs svn add
printf '\n\nTrying to check-in changes...\n\n'
scn stat
svn ci --non-interactive --username $SVN_USERNAME --password $SVN_PASSWORD -m $TRAVIS_COMMIT_MESSAGE
cd ../../ || exit \
  && rm -rf release_dir
svn rm --non-interactive --username $SVN_USERNAME --password $SVN_PASSWORD \
  https://plugins.svn.wordpress.org/ltucillo-fixed-notices/tags/$VERSION
svn cp --non-interactive --username $SVN_USERNAME --password $SVN_PASSWORD \
  https://plugins.svn.wordpress.org/ltucillo-fixed-notices/trunk https://plugins.svn.wordpress.org/ltucillo-fixed-notices/tags/$VERSION \
  -m "$VERSION"
