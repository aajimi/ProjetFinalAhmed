<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recommendation
 *
 * @ORM\Table(name="recommendation", indexes={@ORM\Index(name="fk_rec_1", columns={"id_recomendant"}), @ORM\Index(name="fk_rec_2", columns={"id_recomende"})})
 * @ORM\Entity
 */
class Recommendation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_recommendation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRecommendation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_recommendation", type="datetime", nullable=true)
     */
    private $dateRecommendation;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_recomendant", referencedColumnName="id_user")
     * })
     */
    private $idRecomendant;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_recomende", referencedColumnName="id_user")
     * })
     */
    private $idRecomende;



    /**
     * Get idRecommendation
     *
     * @return integer
     */
    public function getIdRecommendation()
    {
        return $this->idRecommendation;
    }

    /**
     * Set dateRecommendation
     *
     * @param \DateTime $dateRecommendation
     *
     * @return Recommendation
     */
    public function setDateRecommendation($dateRecommendation)
    {
        $this->dateRecommendation = $dateRecommendation;

        return $this;
    }

    /**
     * Get dateRecommendation
     *
     * @return \DateTime
     */
    public function getDateRecommendation()
    {
        return $this->dateRecommendation;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Recommendation
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set idRecomendant
     *
     * @param \MainBundle\Entity\Utilisateur $idRecomendant
     *
     * @return Recommendation
     */
    public function setIdRecomendant(\MainBundle\Entity\Utilisateur $idRecomendant = null)
    {
        $this->idRecomendant = $idRecomendant;

        return $this;
    }

    /**
     * Get idRecomendant
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getIdRecomendant()
    {
        return $this->idRecomendant;
    }

    /**
     * Set idRecomende
     *
     * @param \MainBundle\Entity\Utilisateur $idRecomende
     *
     * @return Recommendation
     */
    public function setIdRecomende(\MainBundle\Entity\Utilisateur $idRecomende = null)
    {
        $this->idRecomende = $idRecomende;

        return $this;
    }

    /**
     * Get idRecomende
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getIdRecomende()
    {
        return $this->idRecomende;
    }
}
