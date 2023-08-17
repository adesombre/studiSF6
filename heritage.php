<?php
class  Maman {
    public function getNom()
    {
        return 'je suis la maman';
    }
}
class Enfant extends Maman
{
    public function getNom()
    {
        return 'je suis un enfant'.PHP_EOL;
    }
}

$enfant = new Enfant();
echo $enfant->getNom();
?>
