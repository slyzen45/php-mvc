<?php
class Genre extends Model{
    public function __construct(){
        $this->table = "Genre";
        $this->getConnection();
    }

    public function findById(string $id){
        $sql = "SELECT * FROM Genre WHERE gen_id = :gen_id";
        $query = $this->_connexion->prepare($sql);
        
        $query->bindValue(':gen_id', $id, PDO::PARAM_INT); 
        // $query->bindValue(':gen_nom', $gen_nom, PDO::PARAM_STR); 
        // $query->bindValue(':gen_desc', $gen_desc, PDO::PARAM_STR); 
        
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }


    public function add(){
            if(isset($_POST["genSubmit"])){
                // on vérifie que les champs ne sont pas vide
                if(!empty($_POST["gen_nom"]) && !empty($_POST["gen_desc"])){
                    
                    $gen_nom = $_POST["gen_nom"];
                    $gen_desc = $_POST["gen_desc"];
                    // $gen_id = $_POST["gen_id"];
            
                    $req = "INSERT INTO Genre (gen_nom, gen_desc) VALUES (:gen_nom, :gen_desc)";
                    
                    $RequestStatement = $this->_connexion->prepare($req);
                    $RequestStatement->bindValue(':gen_nom', $gen_nom, PDO::PARAM_STR);
                    $RequestStatement->bindValue(':gen_desc', $gen_desc, PDO::PARAM_STR);
                    // $RequestStatement->bindValue(':gen_id', $gen_id, PDO::PARAM_INT);
                    $RequestStatement->execute();
                    
                    // on vérifie si le statement =/ false
                    if($RequestStatement){
                        // la bdd rep 00000 si c'est un succès
                        if( $RequestStatement ->errorCode()=='00000'){
                            echo "Réussite de l'insertion ";
                            echo "le genre ".$gen_nom." a bien été ajouté. ";
                        }else{
                            echo "Erreur N°".$RequestStatement->errorCode()." lors de l'insertion.";
                        }
                    }else{
                        echo "Erreur dans le format de la requête";
                    }
                }
            }
        }
}

?>