<?php
class Personne {

    // ----- Attributs publics -----
    public string $nom;
    public string $prenom;

    // ----- Attributs privés -----
    private string $dateNaissance;   // format "AAAA-MM-JJ"
    private string $villeNaissance;
    private string $cin;

    // ----- Constructeur -----
    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin
    ) {
        // TODO : initialiser les 5 attributs avec $this->
    }

    // ----- Méthode publique -----
    public function getName(): string {
        // TODO : retourner "Prénom Nom"
    }

    // ----- Méthode privée -----
    private function getAge(): int {
        // TODO : calculer l'âge avec DateTime
        // Indice : $naissance = new DateTime($this->dateNaissance);
        //          $aujourdhui = new DateTime();
        //          $naissance->diff($aujourdhui)->y
    }
}
```

### Programme de test

```php
$p = new Personne("Hachimi", "Sara", "2000-05-14", "Marrakech", "EE123456");

echo $p->getName() . PHP_EOL;   // à vous de prédire le résultat
echo $p->nom . PHP_EOL;
```

### Expérimentation

Ajoutez **une par une**, exécutez, et notez le message d'erreur obtenu :

```php
echo $p->cin;
echo $p->dateNaissance;
echo $p->getAge();