<?php
// 6.1
class Animal {
    public function manger(): void { echo "Je mange." . PHP_EOL; }
}
class Chien extends Animal {
    public function aboyer(): void { echo "Wouf !" . PHP_EOL; }
}
class Chat extends Animal {
    public function miauler(): void { echo "Miaou !" . PHP_EOL; }
}
// $c->miauler() impossible : Chien n'hérite pas de Chat.

// 6.4 Exercice principal
class Personne {
    public function __construct(
        protected string $nom,
        protected string $prenom,
        protected string $dateNaissance,
        protected string $villeNaissance,
        protected string $cin
    ) {}
    protected function getAge(): int {
        return (new DateTime($this->dateNaissance))->diff(new DateTime())->y;
    }
    public function __toString(): string {
        return $this->prenom . " " . $this->nom . " (" . $this->getAge() . " ans)";
    }
}

class Etudiant extends Personne {
    private string $cne;
    public function __construct(string $nom, string $prenom, string $dateNaissance, string $villeNaissance, string $cin, string $cne) {
        parent::__construct($nom, $prenom, $dateNaissance, $villeNaissance, $cin);
        $this->cne = $cne;
    }
    public function getCne(): string { return $this->cne; }
    public function __toString(): string {
        return parent::__toString() . " - CNE : " . $this->cne;
    }
}

$etudiants = [];
$etudiants[] = new Etudiant("Hachimi", "Sara", "2000-05-14", "Marrakech", "EE123456", "CNE001");
$etudiants[] = new Etudiant("Benali", "Ahmed", "2001-03-10", "Casablanca", "EE654321", "CNE002");
$etudiants[] = new Etudiant("El Idrissi", "Salma", "1999-11-02", "Rabat", "EE111222", "CNE003");
$etudiants[] = new Etudiant("Tazi", "Youssef", "2002-07-20", "Fès", "EE333444", "CNE004");
$etudiants[] = new Etudiant("Alaoui", "Nour", "2000-01-15", "Agadir", "EE555666", "CNE005");

foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
}