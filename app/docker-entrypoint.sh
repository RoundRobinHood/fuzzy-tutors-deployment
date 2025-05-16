#!/usr/bin/env bash

until nc -z db 3306 \
  && mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" -e "SELECT 1;"; do
  echo "Waiting for MySQL to be ready..."
  sleep 2
done

set -e
shopt -s dotglob

echo "Running app entrypoint script"

echo "Copying doc_root to /var/www/html"
cp -r /app/doc_root/* /var/www/html

cd /app/scripts
echo "Executing db setup script"
php install.php --auto

exec "$@"
