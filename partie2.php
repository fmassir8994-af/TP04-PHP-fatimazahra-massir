<?php
// ================= PARTIE 2 : Constructeurs et destructeur =================

// ---------- 2.1 Constructeur avec valeurs par défaut + Promotion ----------

class Voiture {
    // Promotion de propriétés PHP 8 : déclaration + initialisation f signature
    public function __construct(
        public string $couleur = "Blanche",
        public int $vitesse = 0
    ) {}

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }

    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

echo "--- 2.1 ---\n";
$v1 = new Voiture();               // valeurs par défaut : Blanche, 0
$v2 = new Voiture("Rouge", 50);    // valeurs personnalisées
$v3 = new Voiture("Noire");        // couleur=Noire, vitesse=0 par défaut
$v1->afficher();
$v2->afficher();
$v3->afficher();

// new Voiture(120) => ERREUR TypeError, 7it 120 machi string, $couleur khasso string

echo PHP_EOL;

// ---------- 2.2 Le piège des deux constructeurs ----------

class Personne {
    public string $nom;
    public string $prenom;

    // F PHP ma kaynach surcharge : ma n9edroch ndiro 2 __construct
    // L7el : wa7ed __construct b valeurs par défaut
    public function __construct(string $nom = "", string $prenom = "") {
        $this->nom = $nom;
        $this->prenom = $prenom;
        echo "Création " . __CLASS__ . " : $prenom $nom" . PHP_EOL;
    }

    // Méthode statique de fabrique (named constructor)
    public static function depuisTableau(array $data): self {
        return new self($data['nom'] ?? "", $data['prenom'] ?? "");
    }

    public function __destruct() {
        echo "Détruire " . __CLASS__ . " : {$this->prenom} {$this->nom}" . PHP_EOL;
    }
}

echo "--- 2.2 ---\n";
$p1 = new Personne(); // création vide
$p2 = new Personne("Hachimi", "Sara"); // création avec infos
$p3 = Personne::depuisTableau(['nom' => 'Benali', 'prenom' => 'Ahmed']);

echo PHP_EOL;

// ---------- 2.3 Le destructeur ----------

echo "--- 2.3 ---\n";
$maVoiture = new Voiture("Blanche");
unset($maVoiture); // kay3ayet l __destruct() daba
echo "Fin du script." . PHP_EOL;

echo PHP_EOL;
echo "--- 2.3.c Deux objets sans unset ---\n";
$a = new Voiture("Rouge");
$b = new Voiture("Bleue");
// Mli kayssali script, kaytdestroyaw b l3ekss dyal création : $b 3ad $a