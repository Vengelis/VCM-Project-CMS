<?php
$indicesServer = array('PHP_SELF',
'argv',
'argc',
'GATEWAY_INTERFACE',
'SERVER_ADDR',
'SERVER_NAME',
'SERVER_SOFTWARE',
'SERVER_PROTOCOL',
'REQUEST_METHOD',
'REQUEST_TIME',
'REQUEST_TIME_FLOAT',
'QUERY_STRING',
'DOCUMENT_ROOT',
'HTTP_ACCEPT',
'HTTP_ACCEPT_CHARSET',
'HTTP_ACCEPT_ENCODING',
'HTTP_ACCEPT_LANGUAGE',
'HTTP_CONNECTION',
'HTTP_HOST',
'HTTP_REFERER',
'HTTP_USER_AGENT',
'HTTPS',
'REMOTE_ADDR',
'REMOTE_HOST',
'REMOTE_PORT',
'REMOTE_USER',
'REDIRECT_REMOTE_USER',
'SCRIPT_FILENAME',
'SERVER_ADMIN',
'SERVER_PORT',
'SERVER_SIGNATURE',
'PATH_TRANSLATED',
'SCRIPT_NAME',
'REQUEST_URI',
'PHP_AUTH_DIGEST',
'PHP_AUTH_USER',
'PHP_AUTH_PW',
'AUTH_TYPE',
'PATH_INFO',
'ORIG_PATH_INFO') ;

echo '<table cellpadding="10">' ;
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
    }
    else {
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
    }
}
echo '</table>' ;
echo 'sys_get_temp_dir() = '.sys_get_temp_dir()
/*

That will give you the result of each variable like (if the file is server_indices.php at the root and Apache Web directory is in E:\web) :

PHP_SELF    /server_indices.php
argv    -
argc    -
GATEWAY_INTERFACE    CGI/1.1
SERVER_ADDR    127.0.0.1
SERVER_NAME    localhost
SERVER_SOFTWARE    Apache/2.2.22 (Win64) PHP/5.3.13
SERVER_PROTOCOL    HTTP/1.1
REQUEST_METHOD    GET
REQUEST_TIME    1361542579
REQUEST_TIME_FLOAT    -
QUERY_STRING   
DOCUMENT_ROOT    E:/web/
HTTP_ACCEPT    text/html,application/xhtml+xml,application/xml;q=0.9,**;q=0.8
HTTP_ACCEPT_CHARSET    ISO-8859-1,utf-8;q=0.7,*;q=0.3
HTTP_ACCEPT_ENCODING    gzip,deflate,sdch
HTTP_ACCEPT_LANGUAGE    fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4
HTTP_CONNECTION    keep-alive
HTTP_HOST    localhost
HTTP_REFERER    http://localhost/
HTTP_USER_AGENT    Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17
HTTPS    -
REMOTE_ADDR    127.0.0.1
REMOTE_HOST    -
REMOTE_PORT    65037
REMOTE_USER    -
REDIRECT_REMOTE_USER    -
SCRIPT_FILENAME    E:/web/server_indices.php
SERVER_ADMIN    myemail@personal.us
SERVER_PORT    80
SERVER_SIGNATURE   
PATH_TRANSLATED    -
SCRIPT_NAME    /server_indices.php
REQUEST_URI    /server_indices.php
PHP_AUTH_DIGEST    -
PHP_AUTH_USER    -
PHP_AUTH_PW    -
AUTH_TYPE    -
PATH_INFO    -
ORIG_PATH_INFO    -

*/
?>