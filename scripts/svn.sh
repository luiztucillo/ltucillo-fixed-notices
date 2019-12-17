#!/bin/bash
VERSION=$(grep -E -o 'Version: ([0-9.]+)' ltucillo-fixed-notices.php | grep -E -o '([0-9.]+)')
mkdir release_dir
svn co https://plugins.svn.wordpress.org/ltucillo-fixed-notices release_dir
OLD_VERSION=$(grep -E -o 'Version: ([0-9.]+)' release_dir/trunk/ltucillo-fixed-notices.php | grep -E -o '([0-9.]+)') || OLD_VERSION=first_release

if [ $VERSION == $OLD_VERSION ]; then
  printf "\n\nVersão $VERSION já existe\n\n";
  exit 1;
fi

ls -la
cp -r pre_release/* release_dir/trunk
cd release_dir/trunk || exit

printf '\n\nTrying to add new files...\n'
svn stat | grep \? | awk '{print $2}' | xargs svn add

printf '\n\nTrying to remove unverisoned files...\n'
svn stat | grep \! | awk '{print $2}' |xargs svn rm

printf '\n\nTrying to check-in changes...\n'
svn ci --non-interactive --username $SVN_USERNAME --password $SVN_PASSWORD -m "$TRAVIS_COMMIT_MESSAGE"

printf '\n\nCopy trunk to tag\n'
svn cp --non-interactive --username $SVN_USERNAME --password $SVN_PASSWORD \
  https://plugins.svn.wordpress.org/ltucillo-fixed-notices/trunk https://plugins.svn.wordpress.org/ltucillo-fixed-notices/tags/$VERSION \
  -m "$VERSION"
