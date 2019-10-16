<?php


class DirectorsManager {

    /**
     * @param Director $director
     */
    public function addDirector(Director $director) {

        require_once 'connection.php';

        try {
            $connection = connect_bd();

            $sql = "INSERT INTO REALISATEURS (Nom, DateNaiss) VALUES (:nom, :dateNaiss)";
            $stmt = $connection->prepare($sql);

            $name = $director->getName();
            $birthDate = $director->getBirthDate();

            $stmt->bindParam(':nom', $name);
            $stmt->bindParam(':dateNaiss', $birthDate, PDO::PARAM_STR);

            $stmt->execute();

            $connection=null;

        } catch (PDOException $e) {
            echo "Une erreur est survenue lors de l'ajout du réalisateur : " . $e->getMessage();
        }
    }

    public function getDirector($nom) {

        require_once 'connection.php';

        try {
            $connection = connect_bd();
            $director = null;

            $sql = "SELECT * FROM REALISATEURS WHERE Nom=?";
            $stmt = $connection->prepare($sql);

//            $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
            $stmt->execute(array($nom));

            if(!$stmt) throw new DirectorHandlingException();
            else {
                if($stmt->rowCount()!=0) {
                    foreach($stmt as $row) {
                        $director = Director::withBirthDate($row['Nom'], $row['DateNaiss']);
                    }
                }
            }

            $connection=null;
            return $director;

        } catch (Exception $e) {
            echo "Une erreur est survenue lors de l'accès à la liste des réalisateurs : " . $e->getMessage();
        }

    }

    public function getAllDirectors() {
        // TODO
    }

}