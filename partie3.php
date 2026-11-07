<?php
class Personne {
    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";

    public function __set(string $name, mixed $value): void {
        if (!property_exists($this, $name)) {
            echo "Propriété $name inexistante" . PHP_EOL;
            return;
        }
        if ($name === "nom" && (empty($value) || strlen($value) < 2)) {
            throw new InvalidArgumentException("Le nom doit contenir au moins 2 caractères");
        }
        $this->$name = $value;
    }

    public function __get(string $name): mixed {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __isset(string $name): bool {
        return isset($this->$name);
    }

    public function __unset(string $name): void {
        if (property_exists($this, $name)) {
            $this->$name = "";
        }
    }
}

$p = new Personne();
$p->nom = "Hachimi"; // __set
echo $p->nom . PHP_EOL; // __get -> Hachimi
var_dump(isset($p->nom)); // true
unset($p->nom); // __unset -> ""
var_dump(isset($p->nom)); // false car "" est considéré comme isset? en fait isset("") = true, mais ici on a "" -> var_dump(true). Pour avoir false, il faudrait null. Notez-le.
$p->telephone = "0600000000"; // Propriété telephone inexistante