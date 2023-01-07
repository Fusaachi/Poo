<?php

/*$int = 56 ;
$float = 5.162;
$boolean = false;
$string = "Hello world ! ";
$null = null;
$arrays = ["pomme", "poire", "orange"];
$associativeArray = [ 
    "valeur 1" =>  "Raisin ",
    "valeur 2" => "Ananas"
];
$prenom = "fatima";
$nom = "amara";
$dateDeNaissance = "20-01-1990";

$eleve = [ 
    "prenom" => "Fatima",
    "nom" => "amara",
    "dateDeNaissance" => "20-01-1990"
];

$eleves = [ 
    "prenom" => "Liudmyla",
    "name" => "Vykliuk"
];*/
class Personne
{
    public string $nom; # public : On peux le lire comme on veux != private :  On ne peux pas le lire comme on veux
    public string $prenom;

    function __construct(string $nom, string $prenom)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
    function direBonjour()
    {
        echo "<p> Bonjour, je m'appelle " . $this->nom . " " . $this->prenom  . " ";
    }
}

class Eleve extends Personne
{

    public string $dateDeNaissance;
    // Création d'une propriété statique qui seras commune a tous mes élèves
    public static int $nombre = 0;

    function __construct(string $nom, string $prenom, string $dateDeNaissance)
    {
        parent::__construct($nom, $prenom);
        //echo "J'ai créé un élève !"; 
        $this->dateDeNaissance = $dateDeNaissance;
        //Incrémenter le nombre d'élève
        self::$nombre++;
    }

    function direBonjour()
    {
        parent::direBonjour();
        echo "je suis né le " . $this->dateDeNaissance . "</p>";
    }
}

class Professeur extends Personne
{
    public string $adresse_mail;
    public string $matiere;

    function __construct(string $nom, string $prenom, string $adresse_mail, string $matiere)
    {
        parent::__construct($nom, $prenom);
        //echo "J'ai créé un professeur !";
        $this->adresse_mail = $adresse_mail;
        $this->matiere = $matiere;
    }

    function direBonjour()
    {
        parent::direBonjour();
        echo " , je suis votre professeur de " . $this->matiere . " " . ", si vous avez besoin de me contacter voici mon adresse e-mail " . $this->adresse_mail . " ";
    }
}
class Promo
{
    public int $niveau;
    public string $nom;

    function __construct(int $niveau, string $nom)
    {
        //echo "J'ai créé une classe ! , ";
        $this->niveau = $niveau;
        $this->nom = $nom;
    }

    function afficher()
    {
        echo "<p> Voici les informations sur la classe " . $this->niveau . $this->nom . " :</p>";
    }
}

$tati = new Eleve("Monkey D", "Luffy", "1995-10-02");
$toto = new Eleve("Roronoa", "Zoro", "1995-10-02");
$professeur = new Professeur("Gold D", "Roger", "Montrésor@jevouslelaisse.com", "Geographie");
$classe = new Promo(5, "A");

$tati->direBonjour();
$tati->direBonjour();
$professeur->direBonjour();
$classe->afficher();

echo "<p> Voici le nombre d'élèves : " . Eleve::$nombre ."</p>";



//DEPUIS LA PROMO ACCEDER AUX INFORMATIONS DU PROFESSEUR PRINCIPAL ET LA LISTE DES ELEVES