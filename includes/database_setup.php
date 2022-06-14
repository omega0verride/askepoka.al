<?php
require("../src/config.php");
require(ROOT_DIR . "/src/database.php");

$queries = [
    "SET GLOBAL time_zone = '+2:00';",
    "DROP TABLE `votes`",
    "DROP TABLE `posts`",
    "DROP TABLE `users`",
    "CREATE TABLE IF NOT EXISTS `users` (
        `username` varchar(20) NOT NULL,
        `name` varchar(20) NOT NULL,
        `surname` varchar(20) NOT NULL,
        `role` int NOT NULL, 
        `email` varchar(32) NOT NULL,
        `birthday` date NOT NULL,
        `password` char(32) NOT NULL,
        PRIMARY KEY (username)
      );
      ",
    "INSERT IGNORE INTO `users` (`username`, `name`, `surname`, `role`, `email`, `birthday`, `password`) VALUES
    ('admin', 'admin', 'admin', 0, 'indritbreti@gmail.com', '2000-01-01', '0192023a7bbd73250516f069df18b500'),
    ('notadmin', 'notadmin', 'notadmin', 1, 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
    ('not_admin1', 'notadmin', 'notadmin', 1, 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
    ('indritbreti', 'Indrit', 'Breti', 1, 'indritbreti@gmail.com', '2002-05-08', '268b114460ce1f360d57d8dc03ec8d56'),
    ('test', 'admin', 'admin', 1, 'indritbreti@gmail.com', '2222-02-22', '16d7a4fca7442dda3ad93c9a726597e4');",
    "CREATE TABLE `posts` (
        `postId` int AUTO_INCREMENT NOT NULL,
        `title` varchar(100) NOT NULL,
        `content` TEXT(20000) NOT NULL,
        `username` varchar(20) NOT NULL,
        `timestampPosted` timestamp default '1971-01-01 00:00:01', 
        `timestampUpdated` timestamp default now() on update now(),
    	FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE,    
        PRIMARY KEY (postId)
    );
    ",
    "INSERT  IGNORE INTO `posts` VALUES
    (null, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'admin', null, null), 
    (null, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'test', null, null),
    (null, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.

    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'test', null, null),
    (null,'test','asd','admin','2022-06-09 21:46:14','2022-06-09 21:46:14'),
    (null,'test','asd','admin','2022-06-09 21:46:40','2022-06-09 21:46:40'),
    (null,'What is a technology stack?','The technology stack is a set of frameworks and tools used to develop a software product. This set of frameworks and tools are very specifically chosen to work together in creating a well-functioning software.\r\n\r\nHere are some examples of widely used web development technology stacks in use today:\r\n\r\nMERN (MongoDB, ExpressJS, ReactJS, NodeJS)\r\nLAMP (Linux, Apache, MySQL, PHP)\r\nMEAN (MongoDB, ExpressJS, AngularJS, NodeJS)','admin','2022-06-09 21:49:27','2022-06-09 21:49:27'),
    (null,'9th Career Fair','Dear all,\r\n\r\nHope you are doing well!\r\n\r\nEPOKA University is proud to announce the organization of the \"9th Career Fair\" on May 18, 2022. In the activity will be participating prestigious companies and the aim will be to offer internship opportunities to second-year students and employment opportunities for the last-year students, master students and to our graduates.\r\n\r\nDate: Wednesday, May 18, 2022.\r\nTime: 10:00.\r\nVenue: EPOKA University Campus, A-Building, Ground Floor.','admin','2022-06-09 21:50:11','2022-06-09 21:50:11');
    ",
    "CREATE TABLE `votes` (
        `voteId` int AUTO_INCREMENT NOT NULL,
        `postId` int NOT NULL,
        `username` varchar(20) NOT NULL,
        `value` boolean NOT NULL,
        `timestampSubmitted` timestamp default now() on update now(), 
    	FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE,    
    	FOREIGN KEY (postId) REFERENCES posts(postId) ON DELETE CASCADE,    
        PRIMARY KEY (voteId)
    );
    ",
    "INSERT  IGNORE INTO `votes` VALUES
        (null, 1, 'admin', 1, null),
        (null, 3, 'admin', -1, null),
        (null, 1, 'not_admin1', 1, null),
        (null, 3, 'not_admin1', 1, null),
        (null, 3, 'notadmin', 1, null);
    ",

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
