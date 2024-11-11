<?php

/**
 * Exemple per a M07.
 *
 * @author:    Dani Prados dprados@cendrassos.net
 * @deprecated 0.1
 *
 * Model les imatges.
 **/

namespace Daw;

/**
 * Imatges
 */
class Imatges
{

    public $imatges = [
        ["titol" => "Museu Dalí", "url" => "museudalí.jpg"],
        ["titol" => "Museu Dalí 2", "url" => "museudalí2.jpg"],
        ["titol" => "Castell Sant Ferran", "url" => "castellstferran.jpg"],
        ["titol" => "Rambla Figueres", "url" => "rambla.jpg"],
        ["titol" => "Plaça de la Vila 2", "url" => "placavila2.jpg"],
        ["titol" => "Plaça de la Vila 3", "url" => "placavila3.jpg"]
    ];

    /**
     * get et retorna la imatge amb l'id
     *
     * @param  int $id
     * @return array imatge amb ["titol", "url"]
     */
    public function get($id)
    {
        return $this->imatges[$id];
    }

    /**
     * llistat de les imatges
     *
     * @return array d'imatges amb ["titol", "url"]
     */
    public function llistat()
    {
        return $this->imatges;
    }
}