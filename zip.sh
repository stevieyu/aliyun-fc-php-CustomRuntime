#!/bin/sh

cd lumen && composer update --no-dev && cd ../
rm -f default.zip
zip -ry -9 default.zip * .[!.][!git]*