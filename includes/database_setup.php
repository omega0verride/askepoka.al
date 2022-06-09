<?php
require("../src/config.php");
require(ROOT_DIR . "/src/database.php");

$queries = [
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
    ('admin1', 'admin', 'admin', 1, 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
    ('admin2', 'admin', 'admin', 1, 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
    ('indritbreti', 'Indrit', 'Breti', 1, 'indritbreti@gmail.com', '2002-05-08', '268b114460ce1f360d57d8dc03ec8d56'),
    ('test', 'admin', 'admin', 1, 'indritbreti@gmail.com', '2222-02-22', '16d7a4fca7442dda3ad93c9a726597e4');",
    "CREATE TABLE `posts` (
        `postId` int AUTO_INCREMENT NOT NULL,
        `title` varchar(100) NOT NULL,
        `content` TEXT(20000) NOT NULL,
        `username` varchar(20) NOT NULL,
        `timestampPosted` timestamp default '1970-01-01 00:00:01', 
        `timestampUpdated` timestamp default now() on update now(),
    	FOREIGN KEY (username) REFERENCES users(username),    
        PRIMARY KEY (postId)
    );
    ",
    "insert into `posts` VALUES
    (null, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'admin', null, null), 
    (null, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'test', null, null),
    (null, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.

    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'test', null, null);
    ;
    ",

];

// insert into posts VALUES(null, "What is Lorem Ipsum?", "asdasdasdasdasdsfsdfsdgsg", "admin", null, null);
// insert into posts VALUES(null, "What is Lorem Ipsum?", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", "admin", null, null), (null, "What is Lorem Ipsum?", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", "test", null, null);
// update posts set title="post2" where postId=1

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
