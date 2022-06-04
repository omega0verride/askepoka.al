<?php
include("../src/database.php");

$queries = [
    "CREATE TABLE IF NOT EXISTS `users` (
        `username` varchar(20) NOT NULL,
        `name` varchar(20) NOT NULL,
        `surname` varchar(20) NOT NULL,
        `title` varchar(10) NOT NULL,
        `email` varchar(32) NOT NULL,
        `birthday` date NOT NULL,
        `password` char(32) NOT NULL,
        PRIMARY KEY (username)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      ",
    "INSERT IGNORE INTO `users` (`username`, `name`, `surname`, `title`, `email`, `birthday`, `password`) VALUES
    ('admin', 'admin', 'admin', 'Title 1', 'indritbreti@gmail.com', '2000-01-01', '0192023a7bbd73250516f069df18b500'),
    ('admin1', 'admin', 'admin', 'Title 1', 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
    ('admin2', 'admin', 'admin', 'Title 1', 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
    ('indritbreti', 'Indrit', 'Breti', 'Title 1', 'indritbreti@gmail.com', '2002-05-08', '268b114460ce1f360d57d8dc03ec8d56'),
    ('test', 'admin', 'admin', 'Title 3', 'indritbreti@gmail.com', '2222-02-22', '16d7a4fca7442dda3ad93c9a726597e4');"
];


foreach ($queries as $sql) {
    try {
        $result = $conn->exec($sql);
        if ($result === FALSE) {
            print "Failed : " . $conn->errorInfo();
        }
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}
