<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="fk_01", columns={"id_publicateur"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="datetime", nullable=true)
     */
    private $datePublication;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_vues", type="integer", nullable=true)
     */
    private $nbrVues;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="text", nullable=false)
     */
    private $article;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_publicateur", referencedColumnName="id_user")
     * })
     */
    private $idPublicateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="idArticle")
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
     * Get idArticle
     *
     * @return integer
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Article
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
     * Set nbrVues
     *
     * @param integer $nbrVues
     *
     * @return Article
     */
    public function setNbrVues($nbrVues)
    {
        $this->nbrVues = $nbrVues;

        return $this;
    }

    /**
     * Get nbrVues
     *
     * @return integer
     */
    public function getNbrVues()
    {
        return $this->nbrVues;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set article
     *
     * @param string $article
     *
     * @return Article
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set idPublicateur
     *
     * @param \MainBundle\Entity\Utilisateur $idPublicateur
     *
     * @return Article
     */
    public function setIdPublicateur(\MainBundle\Entity\Utilisateur $idPublicateur = null)
    {
        $this->idPublicateur = $idPublicateur;

        return $this;
    }

    /**
     * Get idPublicateur
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getIdPublicateur()
    {
        return $this->idPublicateur;
    }

    /**
     * Add idUser
     *
     * @param \MainBundle\Entity\Utilisateur $idUser
     *
     * @return Article
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
