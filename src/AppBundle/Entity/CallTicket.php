<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CallTicket
 *
 * @ORM\Table(name="call_ticket")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CallTicketRepository")
 */
class CallTicket
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="billedAccount", type="integer")
     */
    private $billedAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="InvoiceNumber", type="string", length=50)
     */
    private $invoiceNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="subscriberNumber", type="string", length=255)
     */
    private $subscriberNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="string", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="string", nullable=true)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="durationReal", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $durationReal;

    /**
     * @var string
     *
     * @ORM\Column(name="durationInvoiced", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $durationInvoiced;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;


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
     * Set billedAccount
     *
     * @param integer $billedAccount
     *
     * @return CallTicket
     */
    public function setBilledAccount($billedAccount)
    {
        $this->billedAccount = $billedAccount;

        return $this;
    }

    /**
     * Get billedAccount
     *
     * @return int
     */
    public function getBilledAccount()
    {
        return $this->billedAccount;
    }

    /**
     * Set invoiceNumber
     *
     * @param string $invoiceNumber
     *
     * @return CallTicket
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * Get invoiceNumber
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Set subscriberNumber
     *
     * @param string $subscriberNumber
     *
     * @return CallTicket
     */
    public function setSubscriberNumber($subscriberNumber)
    {
        $this->subscriberNumber = $subscriberNumber;

        return $this;
    }

    /**
     * Get subscriberNumber
     *
     * @return string
     */
    public function getSubscriberNumber()
    {
        return $this->subscriberNumber;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return CallTicket
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

    /**
     * Set durationReal
     *
     * @param string $durationReal
     *
     * @return CallTicket
     */
    public function setDurationReal($durationReal)
    {
        $this->durationReal = $durationReal;

        return $this;
    }

    /**
     * Get durationReal
     *
     * @return string
     */
    public function getDurationReal()
    {
        return $this->durationReal;
    }

    /**
     * Set durationInvoiced
     *
     * @param string $durationInvoiced
     *
     * @return CallTicket
     */
    public function setDurationInvoiced($durationInvoiced)
    {
        $this->durationInvoiced = $durationInvoiced;

        return $this;
    }

    /**
     * Get durationInvoiced
     *
     * @return string
     */
    public function getDurationInvoiced()
    {
        return $this->durationInvoiced;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return CallTicket
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return CallTicket
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }
}
