#!/bin/bash
curl -sS https://get.symfony.com/cli/installer | bash
mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
cd /var/www
symfony server
exec "$@"