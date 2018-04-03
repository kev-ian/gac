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
    public function loadFile()
    {
        try {
            if (($handle = fopen($this->getFile(), "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $explode[] = $data;
                }

                fclose($handle);

                // CSV headers, not used for now
                $header = $explode[2];

                // Remove from array, those fields are empty for some reason
                unset($explode[0], $explode[1], $explode[2]);

                $this->saveTickets($explode);
            }
        } catch (\Exception $e) {
            // Log errors?
        }
    }

    /**
     * Persist data into database
     */
    public function saveTickets($data)
    {
        // chunk the array and process it in batch
        $chunks = array_chunk($data, 5);

        foreach ($chunks as $items) {
            foreach ($items as $item) {
                $dateTime = \DateTime::createFromFormat('d/m/Y', $item[3]);

                /** @var CallTicket $callTicket */
                $callTicket = new CallTicket();
                $callTicket->setBilledAccount($item[0])
                  ->setInvoiceNumber($item[1])
                  ->setSubscriberNumber($item[2])
                  ->setDurationReal($item[5])
                  ->setDurationInvoiced($item[6])
                  ->setTime($item[4])
                  ->setType($item[7]);

                if (is_object($dateTime)) {
                    $callTicket->setDate($dateTime);
                }

                $this->manager->persist($callTicket);
                $this->manager->flush();
            }
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
        $dateTime = \DateTime::createFromFormat('d/m/Y', $date);
        $totalDuration = $this->callRepository->getTotalRealDuration($dateTime->format('Y-m-d'));

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