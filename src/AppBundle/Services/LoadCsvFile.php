<?php

namespace AppBundle\Services;

use AppBundle\Entity\CallTicket;
use AppBundle\Repository\CallTicketRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class LoadCsvFile
{
    /**
     * @var string
     */
    private $fileName = 'tickets_appels_201202.csv';

    /**
     * @var EntityManager
     */
    private $manager = null;

    /**
     * @var RequestStack
     */
    private $request;

    /**
     * @var CallTicketRepository
     */
    private $callRepository = null;

    /**
     * LoadCsvFile constructor.
     * @param EntityManagerInterface $manager
     * @param RequestStack $request
     */
    public function __construct(EntityManagerInterface $manager, RequestStack $request)
    {
        $this->manager = $manager;
        $this->request = $request->getCurrentRequest();

        /** @var CallTicketRepository callRepository */
        $this->callRepository = $this->manager->getRepository(CallTicket::class);
    }

    /**
     * Load the csv file
     */
    public function loadAndSaveFile()
    {
        try {
            $this->callRepository->saveFileInDb($this->getFile());
        } catch (\Exception $e) {
            // Log errors?
        }
    }

    /**
     * Count sms by subscriber
     *
     * @return mixed
     */
    public function countSms()
    {
        return $this->callRepository->countSms();
    }

    /**
     * Get top ten
     *
     * @return array
     */
    public function getTopTen()
    {
        $startTime = '08:00:00';
        $endTime = '18:00:00';

        return $this->callRepository->getTopTen($startTime, $endTime);
    }

    /**
     * Get the total real duration
     *
     * @return array
     */
    public function getTotalRealDuration()
    {
        $date = '15/02/2012';
        $totalDuration = $this->callRepository->getTotalRealDuration($date);

        return $totalDuration;
    }

    /**
     * Get the csv file from query string if provided.
     * Defaults to $fileName if query string was not found
     *
     * @return string
     */
    public function getFile()
    {
        if (null !== $this->request->query->get('file')) {
            $this->fileName = $this->request->query->get('file');
        }

        return $this->getPath() . '/' . $this->fileName;
    }

    /**
     * Path to the upload folder
     *
     * @return string
     */
    public function getPath()
    {
        return __DIR__ . '/../../../web/uploads';
    }
}