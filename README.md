# Torrent Scanner Crawler - UI
Web interface to manage and automatized torrents search and downloads.

## What is?
Web interface forTorrent Scanner Crawler
The application template is 'Harmony Admin': http://themestruck.com/theme/harmony-admin/

## Required
 * curl
 * sqlite3
 * php7.0 php-fpm php-curl php-dom php-xml  php-sqlite3
 * https://github.com/ruboweb/torrent-scanner-crawler

## Install
```
	$ cd /var/www/
	$ git clone https://github.com/ruboweb/torrent-scanner-ui.git
	$ mv torrent-scanner-ui.git tsui
```

## Configure Paths
Edit this funtions to set correct paths in 'tsui/php/config.php' file:
 * function get_db_path() { ... } // Full path to database
 * function get_path_scanner() { ... } // Full path to php scanner.php script


## Usage
Open browser and got to http://YPUR_IP/tsui
