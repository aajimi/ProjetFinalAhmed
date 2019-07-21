<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=true)
     */
    private $login;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_signal", type="integer", nullable=true)
     */
    protected $nbrSignal;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_mail", type="string", length=255, nullable=true)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_telephone", type="string", length=255, nullable=true)
     */
    private $numeroTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="flag_actif", type="string", length=255, nullable=true)
     */
    private $flagActif;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=255, nullable=true)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="blob", nullable=true)
     */
    private $photo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OffreCovoiturage", inversedBy="idUser")
     * @ORM\JoinTable(name="offrecovoiturage_utilisateur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_offre_covoiturage", referencedColumnName="id_offre")
     *   }
     * )
     */
    private $idOffreCovoiturage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Article", inversedBy="idUser")
     * @ORM\JoinTable(name="reaction",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_article", referencedColumnName="id_article")
     *   }
     * )
     */
    private $idArticle;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->idOffreCovoiturage = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idArticle = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return User
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return User
     */
    public function setAdresseMail($adresseMail)
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /**
     * Get adresseMail
     *
     * @return string
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * Set numeroTelephone
     *
     * @param string $numeroTelephone
     *
     * @return User
     */
    public function setNumeroTelephone($numeroTelephone)
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    /**
     * Get numeroTelephone
     *
     * @return string
     */
    public function getNumeroTelephone()
    {
        return $this->numeroTelephone;
    }




    /**
     * Set nbrSignal
     *
     * @param integer $nbrSignal
     *
     * @return User
     */
    public function setNbrSignal($nbrSignal)
    {
        $this->nbrSignal = $nbrSignal;

        return $this;
    }

    /**
     * Get nbrSignal
     *
     * @return integer
     */
    public function getNbrSignal()
    {
        return $this->nbrSignal;
    }

    /**
     * Set flagActif
     *
     * @param string $flagActif
     *
     * @return User
     */
    public function setFlagActif($flagActif)
    {
        $this->flagActif = $flagActif;

        return $this;
    }

    /**
     * Get flagActif
     *
     * @return string
     */
    public function getFlagActif()
    {
        return $this->flagActif;
    }

    /**
     * Set profil
     *
     * @param string $profil
     *
     * @return User
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Add idOffreCovoiturage
     *
     * @param \MainBundle\Entity\OffreCovoiturage $idOffreCovoiturage
     *
     * @return User
     */
    public function addIdOffreCovoiturage(\MainBundle\Entity\OffreCovoiturage $idOffreCovoiturage)
    {
        $this->idOffreCovoiturage[] = $idOffreCovoiturage;

        return $this;
    }

    /**
     * Remove idOffreCovoiturage
     *
     * @param \MainBundle\Entity\OffreCovoiturage $idOffreCovoiturage
     */
    public function removeIdOffreCovoiturage(\MainBundle\Entity\OffreCovoiturage $idOffreCovoiturage)
    {
        $this->idOffreCovoiturage->removeElement($idOffreCovoiturage);
    }

    /**
     * Get idOffreCovoiturage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdOffreCovoiturage()
    {
        return $this->idOffreCovoiturage;
    }

    /**
     * Add idArticle
     *
     * @param \MainBundle\Entity\Article $idArticle
     *
     * @return User
     */
    public function addIdArticle(\MainBundle\Entity\Article $idArticle)
    {
        $this->idArticle[] = $idArticle;

        return $this;
    }

    /**
     * Remove idArticle
     *
     * @param \MainBundle\Entity\Article $idArticle
     */
    public function removeIdArticle(\MainBundle\Entity\Article $idArticle)
    {
        $this->idArticle->removeElement($idArticle);
    }

    /**
     * Get idArticle
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }
}
