<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieReclamation
 *
 * @ORM\Table(name="categorie_reclamation")
 * @ORM\Entity
 */
class CategorieReclamation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="type_reclamation", type="string", length=255, nullable=true)
     */
    private $typeReclamation;

    /**
     * @var integer
     *
     * @ORM\Column(name="gravite", type="integer", nullable=true)
     */
    private $gravite;



    /**
     * Get idCategorie
     *
     * @return integer
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set typeReclamation
     *
     * @param string $typeReclamation
     *
     * @return CategorieReclamation
     */
    public function setTypeReclamation($typeReclamation)
    {
        $this->typeReclamation = $typeReclamation;

        return $this;
    }

    /**
     * Get typeReclamation
     *
     * @return string
     */
    public function getTypeReclamation()
    {
        return $this->typeReclamation;
    }

    /**
     * Set gravite
     *
     * @param integer $gravite
     *
     * @return CategorieReclamation
     */
    public function setGravite($gravite)
    {
        $this->gravite = $gravite;

        return $this;
    }

    /**
     * Get gravite
     *
     * @return integer
     */
    public function getGravite()
    {
        return $this->gravite;
    }
}
