<?php
class Voiture {
    public $marque;

    public function setMarque($m) {
        $this->marque = $m;      // $this = l'objet qui appelle la méthode
    }

    public function afficher() {
        echo "Marque : " . $this->marque . PHP_EOL;
    }
}

$v1 = new Voiture();
$v1->setMarque("Toyota");
$v1->setCouleur("Gris")
$v1->afficher();

$v1 = new Voiture();
$v1->setMarque("Porche");
$v1->setCouleur("Noir")
$v1->afficher();