<?php

namespace Hackathon\LevelD;

class Brute
{
    private $hash;
    public $origin;
    private $method; // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @TODO :
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
        if (preg_match('/^[a-f0-9]{32}$/', $this->hash)) { // md5
            $continue = true;
            $val = 'aaaa';
            while ($continue) {
                if (md5($val) === $this->hash) {
                    $this->origin = $val;
                    $continue = false;
                }

                ++$val;
            }
        } elseif (is_numeric($this->hash)) { // crc32
            $continue = true;
            $val = 'aaaa';
            while ($continue) {
                if ((string) crc32($val) === $this->hash) {
                    $this->origin = $val;
                    $continue = false;
                }

                ++$val;
            }
        } elseif (preg_match('/^[a-f0-9]{40}$/', $this->hash)) { // md5
            $continue = true;
            $val = 'aaaa';
            while ($continue) {
                if (sha1($val) === $this->hash) {
                    $this->origin = $val;
                    $continue = false;
                }

                ++$val;
            }
        } else {
            $this->origin = base64_decode($this->hash);
        }
    }
}
