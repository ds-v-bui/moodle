<?php 

function distro_get_config() {

    $config = new stdClass();

    $config->installername = 'Moodle Windows Installer';
    $config->installerversion = '2017051500';
    $config->packname = 'Xampp Portable';
    $config->packversion = '7.0.9-1 Portable';
    $config->webname = 'Apache';
    $config->webversion = '2.4.23';
    $config->phpname = 'PHP';
    $config->phpversion = '7.0.9 (VC14 X86 32bit thread safe) + PEAR';
    $config->dbname = 'MariaDB';
    $config->dbversion = '10.1.16';
    $config->moodlerelease = '3.4dev (Build: 20170928)';
    $config->moodleversion = '2017092800.00';
    $config->dbtype='mariadb';
    $config->dbhost='localhost';
    $config->dbuser='root';

    return $config;
}

function distro_pre_create_db($database, $dbhost, $dbuser, $dbpass, $dbname, $prefix, $dboptions, $distro) {

/// We need to change the database password in windows installer, only if != ''
    if ($dbpass !== '') {
        try {
            if ($database->connect($dbhost, $dbuser, '', 'mysql', $prefix, $dboptions)) {
                $sql = "UPDATE user SET password=password(?) WHERE user='root'";
                $params = array($dbpass);
                $database->execute($sql, $params);
                $sql = "flush privileges";
                $database->execute($sql);
            }
        } catch (Exception $ignore) {
        }
    }
}
?>
