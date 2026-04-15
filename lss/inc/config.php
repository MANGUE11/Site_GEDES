<?php
// See inc/config.sample.php for documentation and example
if ( basename( $_SERVER['PHP_SELF'] ) == 'config.php' )
	die( 'This page cannot be loaded directly' );

return array (
  'site' => 
  array (
    'url' => 'https://gedesinternational.com/lss/',
    'path' => '/home/gedesxyb/public_html/lss/',
    'geoip_path' => '/home/gedesxyb/public_html/lss/geoipdb/GeoIP.dat',
    'geoipv6_path' => '/home/gedesxyb/public_html/lss/geoipdb/GeoIPv6.dat',
    'debug' => false,
    'csrf' => true,
    'header_ip_address' => true,
  ),
  'mysql' => 
array (
  'host' => 'localhost',
  'user' => 'root',
  'pass' => '',
  'db' => 'gedes_local',
  'prefix' => 'lssx1_',  // ← IDENTIQUE au préfixe des tables en BD
  'persistent' => false,
),
); 