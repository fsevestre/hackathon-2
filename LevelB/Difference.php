<?php

namespace Hackathon\LevelB;

/**
 * Class Difference
 * En réalité, il suffit d'implémenter un algorythme bien spécifique.
 * http://jeux-et-mathematiques.davalan.org/lang/algo/lev/index.html
 * https://openclassrooms.com/forum/sujet/distance-de-levenshtein-79426.
 */
class Difference
{
    private $a;     // Chaine A
    private $b;     // Chaine A
    public $cost;   // Coût de changement

    /**
     * @param $a    // Chaine A
     * @param $b    // Chaine B
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->cost = $this->whatIsTheCostPlease($a, $b);
    }

    /**
     * @param $this->a
     * @param $this->b
     *
     * @return mixed
     */
    public function whatIsTheCostPlease()
    {
        return levenshtein($this->a, $this->b);
    }
}
