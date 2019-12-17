#!/bin/bash
mkdir pre_release
echo $REPO
cp -r includes pre_release \
  && cp -r languages pre_release \
  && cp -r templates pre_release \
  && cp ltucillo-fixed-notices.php pre_release \
  && cp readme.txt pre_release
