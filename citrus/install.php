<?php

include "settings.php";
include "utils.php";

$mysql_link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

$queries = array();

$queries[] = "DROP TABLE IF EXISTS `admin`;";
$queries[] = "CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;";

$queries[] = "INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9');";

$queries[] = "DROP TABLE IF EXISTS `comments`;";
$queries[] = "CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `comment_body` text NOT NULL,
  `date_added` datetime NOT NULL,
  `approved` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;";

$queries[] = "INSERT INTO `comments` (`id`, `name`, `email`, `comment_body`, `date_added`, `approved`) VALUES
(3, 'John 1', 'joo@gmx.com', 'Curabitur ac faucibus sapien. Sed ornare, ex sed sagittis maximus, mauris erat maximus eros, suscipit commodo metus lectus ac nisi. Nulla imperdiet tincidunt luctus. Sed ut tincidunt eros, et tincidunt diam. Proin a scelerisque tortor. Pellentesque convallis finibus ipsum, sodales malesuada libero. Aenean non nisl nunc.', '2019-11-07 00:50:31', 1),
(4, 'Ana', 'ana@stagod.com', 'Aenean eu magna cursus, tincidunt magna at, consequat tellus. Curabitur sem nunc, tincidunt id neque ut, vulputate varius magna. Suspendisse potenti. Morbi convallis sollicitudin risus, eget volutpat enim consequat vitae. Pellentesque a nulla vel velit lacinia ullamcorper ultricies ut ex. Sed a finibus sapien. Fusce sagittis nibh eget arcu finibus, et imperdiet est mattis. Phasellus lectus lectus, tempor accumsan gravida ac, venenatis sit amet arcu. In quis ante convallis, bibendum felis eu, lobortis metus. Ut commodo et velit ut dignissim. Donec commodo dapibus varius.\r\n\r\nDonec scelerisque quam dignissim nulla commodo, nec eleifend libero tristique. Duis at nulla a nibh egestas eleifend. Vestibulum est erat, facilisis rutrum scelerisque ut, mattis et ipsum. Integer at ex sit amet odio ultrices viverra in vel odio. Etiam nec elit viverra quam tristique tempor. Nulla feugiat, massa a ultrices tempor, est nulla facilisis lacus, quis auctor dolor elit eget arcu. Nulla tincidunt interdum felis ut efficitur. ', '2019-11-07 00:52:28', 1);";


$queries[] = "DROP TABLE IF EXISTS `products`;";

$queries[] = "CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;";


$queries[] = "INSERT INTO `products` (`id`, `title`, `description`, `image`) VALUES
(1, 'Product I', 'Lorem ipsum dolor sit amet, consectetur', 'a11'),
(3, 'Product II', 'Aenean dapibus lobortis turpis, et viverra libero pulvinar ac', 'a12'),
(4, 'Product III', 'Morbi aliquet nulla in varius posuere', 'a13'),
(5, 'Product IV', 'Donec congue ex ipsum, in molestie odio iaculis porttitor', 'a21'),
(6, 'Product V', 'In tempor purus sit amet lectus viverra, a finibus odio fermentum. Fusce sit amet sollicitudin purus. Cras convallis malesuada interdum.', 'a22'),
(7, 'Product VI', 'Nulla facilisi. Fusce ac leo ac quam egestas maximus. Ut tristique orci ac mi varius iaculis.', 'a23'),
(8, 'Product VII', 'Vivamus bibendum felis viverra, posuere urna id, semper velit. Curabitur sollicitudin mollis nunc non blandit. Donec congue ex ipsum, in molestie odio iaculis porttitor.', 'a31'),
(9, 'Product VIII', 'Some more text', 'a32'),
(21, 'Product IX', 'even more text.', 'a33');";

$ok = true;

foreach($queries as $query)
{
    $result = mysqli_query ( $mysql_link , $query);

}