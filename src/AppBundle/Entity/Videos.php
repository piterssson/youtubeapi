<?php

namespace AppBundle\Entity;

/**
 * Videos
 */
class Videos
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $videoid;

    /**
     * @var \DateTime
     */
    private $date;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set videoid
     *
     * @param string $videoid
     *
     * @return Videos
     */
    public function setVideoid($videoid)
    {
        $this->videoid = $videoid;

        return $this;
    }

    /**
     * Get videoid
     *
     * @return string
     */
    public function getVideoid()
    {
        return $this->videoid;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Videos
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

