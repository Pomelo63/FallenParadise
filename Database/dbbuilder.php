<?php
//Local Server variable
$hostname = 'localhost';
$database = 'fallenparadise';
$username = 'root';
$password = '';

//Admin Account pswd variable
$adminPwd = 'AdminFP0123+'; // Admin Password
$adminHashedPwd = password_hash($adminPwd, PASSWORD_BCRYPT, array('cost' => 10));
$bytes = bin2hex(random_bytes(20));

try {
  $dbco = new PDO("mysql:host=$hostname", $username, $password);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Delete DB if one already exist (for quick reset) and creat it again
  $sql = "drop DATABASE if exists $database;
    CREATE DATABASE $database";
  $dbco->exec($sql);

  $dbco = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Creat all needed table in our DB
  $sql = "
                /*Création de la table des joueurs*/
                create table Player (
                  player_id  integer primary key auto_increment,
                  player_name varchar(50) not null,
                  player_level integer not null,
                  player_reputation integer not null,
                  player_gold integer not null
                )ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;
                
                /*Création de la table des images*/
                create table Images (
                  img_id  integer primary key auto_increment,
                  img_src varchar(50) not null,
                  img_desc varchar(300)  not null
                )ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

                CREATE USER if not exists 'basicuser'@'localhost' IDENTIFIED BY 'password';
                GRANT SELECT ON * . * TO 'basicuser'@'localhost';
                
                insert into Player(player_name, player_level, player_reputation,player_gold) values
                ('Cromenberg',  '3', '0' , '300');

                ";

  $dbco->exec($sql);
  echo 'La base de donnée et les différents tables sont créées !';
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>
</body>

</html>