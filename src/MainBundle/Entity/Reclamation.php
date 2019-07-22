<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="fk_reclamation_01", columns={"id_categorie"}), @ORM\Index(name="fk_reclamation_02", columns={"id_reclamant"}), @ORM\Index(name="fk_reclamation_03", columns={"id_reclame"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=true)
     */
    private $sujet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reclamation", type="datetime", nullable=true)
     */
    private $dateReclamation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag_traite", type="boolean", nullable=true)
     */
    private $flagTraite;

    /**
     * @var \CategorieReclamation
     *
     * @ORM\ManyToOne(targetEntity="CategorieReclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     * })
     */
    private $idCategorie;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reclamant", referencedColumnName="id_user")
     * })
     */
    private $idReclamant;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reclame", referencedColumnName="id_user")
     * })
     */
    private $idReclame;

    /**
     * Reclamation constructor.
     * @param int $idReclamation
     */
    public function __construct()
    {
        $this->idReclamation = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idReclamation
     *
     * @return integer
     */
    public function getIdReclamation()
    {
        return $this->idReclamation;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Reclamation
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set dateReclamation
     *
     * @param \DateTime $dateReclamation
     *
     * @return Reclamation
     */
    public function setDateReclamation($dateReclamation)
    {
        $this->dateReclamation = $dateReclamation;

        return $this;
    }

    /**
     * Get dateReclamation
     *
     * @return \DateTime
     */
    public function getDateReclamation()
    {
        return $this->dateReclamation;
    }

    /**
     * Set flagTraite
     *
     * @param boolean $flagTraite
     *
     * @return Reclamation
     */
    public function setFlagTraite($flagTraite)
    {
        $this->flagTraite = $flagTraite;

        return $this;
    }

    /**
     * Get flagTraite
     *
     * @return boolean
     */
    public function getFlagTraite()
    {
        return $this->flagTraite;
    }

    /**
     * Set idCategorie
     *
     * @param \MainBundle\Entity\CategorieReclamation $idCategorie
     *
     * @return Reclamation
     */
    public function setIdCategorie(\MainBundle\Entity\CategorieReclamation $idCategorie = null)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    /**
     * Get idCategorie
     *
     * @return \MainBundle\Entity\CategorieReclamation
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set idReclamant
     *
     * @param \MainBundle\Entity\Utilisateur $idReclamant
     *
     * @return Reclamation
     */
    public function setIdReclamant(\MainBundle\Entity\Utilisateur $idReclamant = null)
    {
        $this->idReclamant = $idReclamant;

        return $this;
    }

    /**
     * Get idReclamant
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getIdReclamant()
    {
        return $this->idReclamant;
    }

    /**
     * Set idReclame
     *
     * @param \MainBundle\Entity\Utilisateur $idReclame
     *
     * @return Reclamation
     */
    public function setIdReclame(\MainBundle\Entity\Utilisateur $idReclame = null)
    {
        $this->idReclame = $idReclame;

        return $this;
    }

    /**
     * Get idReclame
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getIdReclame()
    {
        return $this->idReclame;
    }
}
