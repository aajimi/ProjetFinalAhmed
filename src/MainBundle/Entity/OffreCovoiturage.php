<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OffreCovoiturage
 *
 * @ORM\Entity(repositoryClass="MainBundle\Repository\OffreCovoiturageRepository")
 * @ORM\Table(name="offre_covoiturage", indexes={@ORM\Index(name="fk_offre_cov_01", columns={"test"})})
 */
class OffreCovoiturage
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
     * @var string
     *
     * @ORM\Column(name="lieu_depart", type="string", length=255, nullable=true)
     */
    private $lieuDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_arrivee", type="string", length=255, nullable=true)
     */
    private $lieuArrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="datetime", nullable=true)
     */
    private $dateDepart;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_places_dispo", type="integer", nullable=true)
     */
    private $nbrPlacesDispo;

    /**
     * @var string
     *
     * @ORM\Column(name="trajet", type="string", length=255, nullable=true)
     */
    private $trajet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag_annule", type="boolean", nullable=true)
     */
    private $flagAnnule;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag_termine", type="boolean", nullable=true)
     */
    private $flagTermine;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag_fumeur", type="boolean", nullable=true)
     */
    private $flagFumeur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag_female_only", type="boolean", nullable=true)
     */
    private $flagFemaleOnly;

    /**
     * @var string
     *
     * @ORM\Column(name="type_covoiturage", type="string", length=255, nullable=true)
     */
    private $typeCovoiturage;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test", referencedColumnName="id_user")
     * })
     */
    private $test;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="idOffreCovoiturage")
     */
    private $idUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUser = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set lieuDepart
     *
     * @param string $lieuDepart
     *
     * @return OffreCovoiturage
     */
    public function setLieuDepart($lieuDepart)
    {
        $this->lieuDepart = $lieuDepart;

        return $this;
    }

    /**
     * Get lieuDepart
     *
     * @return string
     */
    public function getLieuDepart()
    {
        return $this->lieuDepart;
    }

    /**
     * Set lieuArrivee
     *
     * @param string $lieuArrivee
     *
     * @return OffreCovoiturage
     */
    public function setLieuArrivee($lieuArrivee)
    {
        $this->lieuArrivee = $lieuArrivee;

        return $this;
    }

    /**
     * Get lieuArrivee
     *
     * @return string
     */
    public function getLieuArrivee()
    {
        return $this->lieuArrivee;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return OffreCovoiturage
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set nbrPlacesDispo
     *
     * @param integer $nbrPlacesDispo
     *
     * @return OffreCovoiturage
     */
    public function setNbrPlacesDispo($nbrPlacesDispo)
    {
        $this->nbrPlacesDispo = $nbrPlacesDispo;

        return $this;
    }

    /**
     * Get nbrPlacesDispo
     *
     * @return integer
     */
    public function getNbrPlacesDispo()
    {
        return $this->nbrPlacesDispo;
    }

    /**
     * Set trajet
     *
     * @param string $trajet
     *
     * @return OffreCovoiturage
     */
    public function setTrajet($trajet)
    {
        $this->trajet = $trajet;

        return $this;
    }

    /**
     * Get trajet
     *
     * @return string
     */
    public function getTrajet()
    {
        return $this->trajet;
    }

    /**
     * Set flagAnnule
     *
     * @param boolean $flagAnnule
     *
     * @return OffreCovoiturage
     */
    public function setFlagAnnule($flagAnnule)
    {
        $this->flagAnnule = $flagAnnule;

        return $this;
    }

    /**
     * Get flagAnnule
     *
     * @return boolean
     */
    public function getFlagAnnule()
    {
        return $this->flagAnnule;
    }

    /**
     * Set flagTermine
     *
     * @param boolean $flagTermine
     *
     * @return OffreCovoiturage
     */
    public function setFlagTermine($flagTermine)
    {
        $this->flagTermine = $flagTermine;

        return $this;
    }

    /**
     * Get flagTermine
     *
     * @return boolean
     */
    public function getFlagTermine()
    {
        return $this->flagTermine;
    }

    /**
     * Set flagFumeur
     *
     * @param boolean $flagFumeur
     *
     * @return OffreCovoiturage
     */
    public function setFlagFumeur($flagFumeur)
    {
        $this->flagFumeur = $flagFumeur;

        return $this;
    }

    /**
     * Get flagFumeur
     *
     * @return boolean
     */
    public function getFlagFumeur()
    {
        return $this->flagFumeur;
    }

    /**
     * Set flagFemaleOnly
     *
     * @param boolean $flagFemaleOnly
     *
     * @return OffreCovoiturage
     */
    public function setFlagFemaleOnly($flagFemaleOnly)
    {
        $this->flagFemaleOnly = $flagFemaleOnly;

        return $this;
    }

    /**
     * Get flagFemaleOnly
     *
     * @return boolean
     */
    public function getFlagFemaleOnly()
    {
        return $this->flagFemaleOnly;
    }

    /**
     * Set typeCovoiturage
     *
     * @param string $typeCovoiturage
     *
     * @return OffreCovoiturage
     */
    public function setTypeCovoiturage($typeCovoiturage)
    {
        $this->typeCovoiturage = $typeCovoiturage;

        return $this;
    }

    /**
     * Get typeCovoiturage
     *
     * @return string
     */
    public function getTypeCovoiturage()
    {
        return $this->typeCovoiturage;
    }

    /**
     * Set test
     *
     * @param \MainBundle\Entity\Utilisateur $test
     *
     * @return OffreCovoiturage
     */
    public function setTest(\MainBundle\Entity\Utilisateur $test = null)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Add idUser
     *
     * @param \MainBundle\Entity\Utilisateur $idUser
     *
     * @return OffreCovoiturage
     */
    public function addIdUser(\MainBundle\Entity\Utilisateur $idUser)
    {
        $this->idUser[] = $idUser;

        return $this;
    }

    /**
     * Remove idUser
     *
     * @param \MainBundle\Entity\Utilisateur $idUser
     */
    public function removeIdUser(\MainBundle\Entity\Utilisateur $idUser)
    {
        $this->idUser->removeElement($idUser);
    }

    /**
     * Get idUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
