<?php
class Utilisateur {
    public string $nom;
    public int $age;
    private string $motDePasse;

    public function __construct(string $nom, int $age, string $motDePasse) {
        $this->nom = $nom; $this->age = $age; $this->motDePasse = $motDePasse;
    }
    public function __serialize(): array {
        return ['nom' => $this->nom, 'age' => $this->age];
    }
    public function __unserialize(array $data): void {
        $this->nom = $data['nom'];
        $this->age = $data['age'];
        $this->motDePasse = "";
    }
}
$u = new Utilisateur("Alice", 25, "secret123");
$s = serialize($u);
echo "Sérialisé : $s" . PHP_EOL;
$r = unserialize($s);
var_dump($r);