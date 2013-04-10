<?php

// To create or connect to the database (history.sqlite3) uncomment line 9
// To drop database, simply delete history.sqlite3 file.
// Uncomment line 16 and 17 to create tables but don't forget to comment them after
// You can fill the database with the little script under *TABLE INSERTION*

// Create (connect to) SQLite database in file
// $file_db = new PDO('sqlite:history.sqlite3');


//==================
// TABLES CREATION
// DO IT ONE TIME
//==================
// $file_db->exec('CREATE TABLE IF NOT EXISTS websites (id INTEGER PRIMARY KEY, name TEXT, time TEXT)');
// $file_db->exec('CREATE TABLE IF NOT EXISTS links (id INTEGER PRIMARY KEY, url TEXT, website_id INTEGER, success INTEGER)');
// $file_db->exec('CREATE TABLE IF NOT EXISTS unique_links (id INTEGER PRIMARY KEY, url TEXT, success INTEGER, time TEXT)');
//==================
// END TABLES CREATION
//==================

//==================
// TABLES  INSERTION
//==================

// $websites = array(
//   array('id' => '1',
//         'name' => 'toto.com',
//         'time' => "1327301464"),
//   array('id' => '2',
//         'name' => 'tata.fr',
//         'time' => "1339428612"),
//   array('id' => '3',
//         'name' => 'titi.qsd',
//         'time' => "1327214268")
// );

// $insert = "INSERT INTO websites (id, name, time) VALUES (:id, :name, :time)";
// $stmt = $file_db->prepare($insert);

// $stmt->bindParam(':id', $id);
// $stmt->bindParam(':name', $name);
// $stmt->bindParam(':time', $time);

// foreach ($websites as $w) {
//   // Set values to bound variables
//   $id = $w['id'];
//   $name = $w['name'];
//   $time  = $w['time'];

//   $stmt->execute();
// }
//==================
// END TABLES INSERTION
//==================

//==================
// DISPLAY DATA
// $result = $file_db->query('SELECT * FROM websites');

// foreach($result as $row) {
//   echo "ID: " . $row['id'] . "<br />";
//   echo "Name: " . $row['name'] . "<br />";
//   echo "time: " . $row['time'] . "<br />";
//   echo "<br />";
// }

//==================
// DROP TABLES
// $file_db->exec("DROP TABLE websites");
// $file_db->exec("DROP TABLE links");

?>