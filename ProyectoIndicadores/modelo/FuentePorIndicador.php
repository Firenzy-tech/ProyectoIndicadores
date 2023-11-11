<?php

?><?php

class FuentePorIndicador {
    var $fkidfuente;
    var $fkidindicador;

    public function __construct($fkidfuente, $fkidindicador) {
        $this->fkidfuente = $fkidfuente;
        $this->fkidindicador = $fkidindicador;
    }

    public function getFkidfuente() {
        return $this->fkidfuente;
    }

    public function setFkidfuente($fkidfuente) {
        $this->fkidfuente = $fkidfuente;
    }

    public function getFkidindicador() {
        return $this->fkidindicador;
    }

    public function setFkidindicador($fkidindicador) {
        $this->fkidindicador = $fkidindicador;
    }
}

?>
