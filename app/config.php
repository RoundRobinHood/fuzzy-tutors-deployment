<?php

$dbHostname = getenv('DB_HOST') ?: '';
$dbUsername = getenv('DB_USER') ?: '';
$dbPassword = getenv('DB_PASS') ?: '';
$dbName     = getenv('DB_NAME') ?: '';

$nrEmail      = getenv('NR_EMAIL') ?: '';
$nrPassword   = getenv('NR_PASS') ?: '';
$nrHost       = getenv('NR_HOST') ?: '';
$nrEncryption = getenv('NR_ENC') ?: 'tls';
$nrPort       = getenv('NR_PORT') ?: 465;

$domain = getenv('DOMAIN_NAME') ?: 'localhost';
