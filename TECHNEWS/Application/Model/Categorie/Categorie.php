<?php

namespace Application\Model\Categorie;


class Categorie
{
    private $_IDCATEGORIE,
            $_LIBELLECATEGORIE,
            $_ROUTECATEGORIE;

    /**
     * @return mixed
     */
    public function getIDCATEGORIE()
    {
        return $this->_IDCATEGORIE;
    }

    /**
     * @return mixed
     */
    public function getLIBELLECATEGORIE()
    {
        return $this->_LIBELLECATEGORIE;
    }

    /**
     * @return mixed
     */
    public function getROUTECATEGORIE()
    {
        return $this->_ROUTECATEGORIE;
    }


}