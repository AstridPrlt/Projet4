<?php
    namespace OCR\P4\model;
    use PDO;

   //connexion à la bdd
    abstract class Database {
       
        CONST DB_HOST = 'mysql:host=localhost;port=3308;dbname=blogp4;charset=utf8';
        CONST DB_USER = 'root';
        const DB_PW = '';

        public function dbConnect() 
        {
            try
            {
                $this->bdd = new PDO(self::DB_HOST, self::DB_USER, self::DB_PW,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                return $this->bdd;
            }
            catch(PDOException $e)
            {
                echo '<p>Erreur : '.$e->getMessage() . '</p>';
            }

        }
    

}
