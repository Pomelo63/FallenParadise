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
                /*Création de la table des utilisateurs*/
                create table USERS (
                  user_id  integer primary key auto_increment,
                  user_name varchar(50) not null,
                  user_email varchar(255) not null unique,
                  user_password varchar(255) not null,
                  user_token varchar(100) not null unique,
                  user_profil varchar(10) not null default 'user'
                )ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

                CREATE USER if not exists 'basicuser'@'localhost' IDENTIFIED BY 'password';
                GRANT SELECT ON * . * TO 'basicuser'@'localhost';
                
                insert into USERS(user_name, user_email, user_password,user_profil,user_log,user_token,user_lang) values
                ('AdminFP',  'admin@fallenparadise.com', '$adminHashedPwd' , 'admin', false, '$bytes', 'fr');

                ";

  $dbco->exec($sql);
  echo 'La base de donnée et les différents tables sont créées !';
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>
</body>

</html>