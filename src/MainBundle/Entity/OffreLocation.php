<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OffreLocation
 *
 * @ORM\Table(name="offre_location", indexes={@ORM\Index(name="fk_0001", columns={"id_user"})})
 * @ORM\Entity
 */
class OffreLocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="datetime", nullable=true)
     */
    private $datePublication;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_jour_max", type="integer", nullable=true)
     */
    private $nbrJourMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_jour_min", type="integer", nullable=true)
     */
    private $nbrJourMin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag_loue", type="boolean", nullable=true)
     */
    private $flagLoue;

    /**
     * @var string
     *
     * @ORM\Column(name="constructeur_voiture", type="string", length=255, nullable=true)
     */
    private $constructeurVoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="marque_voiture", type="string", length=255, nullable=true)
     */
    private $marqueVoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="type_voiture", type="string", length=255, nullable=true)
     */
    private $typeVoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_voiture", type="blob", nullable=true)
     */
    private $photoVoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="carburant", type="string", length=255, nullable=true)
     */
    private $carburant;

    /**
     * @var string
     *
     * @ORM\Column(name="motorisation", type="string", length=255, nullable=true)
     */
    private $motorisation;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;



    /**
     * Get idOffre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return OffreLocation
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return OffreLocation
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set nbrJourMax
     *
     * @param integer $nbrJourMax
     *
     * @return OffreLocation
     */
    public function setNbrJourMax($nbrJourMax)
    {
        $this->nbrJourMax = $nbrJourMax;

        return $this;
    }

    /**
     * Get nbrJourMax
     *
     * @return integer
     */
    public function getNbrJourMax()
    {
        return $this->nbrJourMax;
    }

    /**
     * Set nbrJourMin
     *
     * @param integer $nbrJourMin
     *
     * @return OffreLocation
     */
    public function setNbrJourMin($nbrJourMin)
    {
        $this->nbrJourMin = $nbrJourMin;

        return $this;
    }

    /**
     * Get nbrJourMin
     *
     * @return integer
     */
    public function getNbrJourMin()
    {
        return $this->nbrJourMin;
    }

    /**
     * Set flagLoue
     *
     * @param boolean $flagLoue
     *
     * @return OffreLocation
     */
    public function setFlagLoue($flagLoue)
    {
        $this->flagLoue = $flagLoue;

        return $this;
    }

    /**
     * Get flagLoue
     *
     * @return boolean
     */
    public function getFlagLoue()
    {
        return $this->flagLoue;
    }

    /**
     * Set constructeurVoiture
     *
     * @param string $constructeurVoiture
     *
     * @return OffreLocation
     */
    public function setConstructeurVoiture($constructeurVoiture)
    {
        $this->constructeurVoiture = $constructeurVoiture;

        return $this;
    }

    /**
     * Get constructeurVoiture
     *
     * @return string
     */
    public function getConstructeurVoiture()
    {
        return $this->constructeurVoiture;
    }

    /**
     * Set marqueVoiture
     *
     * @param string $marqueVoiture
     *
     * @return OffreLocation
     */
    public function setMarqueVoiture($marqueVoiture)
    {
        $this->marqueVoiture = $marqueVoiture;

        return $this;
    }

    /**
     * Get marqueVoiture
     *
     * @return string
     */
    public function getMarqueVoiture()
    {
        return $this->marqueVoiture;
    }

    /**
     * Set typeVoiture
     *
     * @param string $typeVoiture
     *
     * @return OffreLocation
     */
    public function setTypeVoiture($typeVoiture)
    {
        $this->typeVoiture = $typeVoiture;

        return $this;
    }

    /**
     * Get typeVoiture
     *
     * @return string
     */
    public function getTypeVoiture()
    {
        return $this->typeVoiture;
    }

    /**
     * Set photoVoiture
     *
     * @param string $photoVoiture
     *
     * @return OffreLocation
     */
    public function setPhotoVoiture($photoVoiture)
    {
        $this->photoVoiture = $photoVoiture;

        return $this;
    }

    /**
     * Get photoVoiture
     *
     * @return string
     */
    public function getPhotoVoiture()
    {
        return $this->photoVoiture;
    }

    /**
     * Set carburant
     *
     * @param string $carburant
     *
     * @return OffreLocation
     */
    public function setCarburant($carburant)
    {
        $this->carburant = $carburant;

        return $this;
    }

    /**
     * Get carburant
     *
     * @return string
     */
    public function getCarburant()
    {
        return $this->carburant;
    }

    /**
     * Set motorisation
     *
     * @param string $motorisation
     *
     * @return OffreLocation
     */
    public function setMotorisation($motorisation)
    {
        $this->motorisation = $motorisation;

        return $this;
    }

    /**
     * Get motorisation
     *
     * @return string
     */
    public function getMotorisation()
    {
        return $this->motorisation;
    }

    /**
     * Set idUser
     *
     * @param \MainBundle\Entity\Utilisateur $idUser
     *
     * @return OffreLocation
     */
    public function setIdUser(\MainBundle\Entity\Utilisateur $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
