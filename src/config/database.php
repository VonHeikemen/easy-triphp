<?php

return [
  'use' => getenv('DB_USE'),

  'connection' => [ //connection for mysql or pgsql
    'conn' => getenv('DB_MAN').':host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE'),
    'username' => getenv('DB_PASSWORD'),
    'password' => getenv('DB_USERNAME')
  ],
    
  'path' => getenv('DB_PATH'), // use path for sqlite databases

  'freeze' => FALSE //if 'false' will change database schema
];