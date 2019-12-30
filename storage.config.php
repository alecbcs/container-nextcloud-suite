<?php
$CONFIG = [
'objectstore' => [
'class' => 'OC\\Files\\ObjectStore\\S3',
'arguments' => [
'bucket' => '[##BUCKET NAME##]',
'autocreate' => true,
'key' => '[##ACCESS KEY##]',
'secret' => '[##SECRETE KEY##]',
'hostname' => '[##example.com##]', // for example: 'hostname' => 'sfo2.digitaloceanspaces.com',
'port' => 1234,
'use_ssl' => true,
'region' => 'optional',
// required for some non Amazon S3 implementations
'use_path_style'=> false, ],
],
];
