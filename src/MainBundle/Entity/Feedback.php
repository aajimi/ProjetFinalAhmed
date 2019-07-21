<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table(name="feedback", indexes={@ORM\Index(name="fk_feedback_01", columns={"id_user1"}), @ORM\Index(name="fk_feedback_02", columns={"id_user2"})})
 * @ORM\Entity
 */
class Feedback
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_feedback", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFeedback;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_feedback", type="datetime", nullable=true)
     */
    private $dateFeedback;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer", nullable=true)
     */
    private $rate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user1", referencedColumnName="id_user")
     * })
     */
    private $idUser1;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user2", referencedColumnName="id_user")
     * })
     */
    private $idUser2;



    /**
     * Get idFeedback
     *
     * @return integer
     */
    public function getIdFeedback()
    {
        return $this->idFeedback;
    }

    /**
     * Set dateFeedback
     *
     * @param \DateTime $dateFeedback
     *
     * @return Feedback
     */
    public function setDateFeedback($dateFeedback)
    {
        $this->dateFeedback = $dateFeedback;

        return $this;
    }

    /**
     * Get dateFeedback
     *
     * @return \DateTime
     */
    public function getDateFeedback()
    {
        return $this->dateFeedback;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Feedback
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set rate
     *
     * @param integer $rate
     *
     * @return Feedback
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return integer
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set idUser1
     *
     * @param \MainBundle\Entity\Utilisateur $idUser1
     *
     * @return Feedback
     */
    public function setIdUser1(\MainBundle\Entity\Utilisateur $idUser1 = null)
    {
        $this->idUser1 = $idUser1;

        return $this;
    }

    /**
     * Get idUser1
     *
     * @return \MainBundle\Entity\User
     */
    public function getIdUser1()
    {
        return $this->idUser1;
    }

    /**
     * Set idUser2
     *
     * @param \MainBundle\Entity\User $idUser2
     *
     * @return Feedback
     */
    public function setIdUser2(\MainBundle\Entity\Utilisateur $idUser2 = null)
    {
        $this->idUser2 = $idUser2;

        return $this;
    }

    /**
     * Get idUser2
     *
     * @return \MainBundle\Entity\Utilisateur
     */
    public function getIdUser2()
    {
        return $this->idUser2;
    }
}
