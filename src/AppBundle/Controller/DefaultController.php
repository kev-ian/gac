<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\LoadCsvFile;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, LoadCsvFile $loader)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'totalDurationReal' => $loader->getTotalRealDuration(),
            'numberOfSms' => $loader->countSms(),
            'topTen' => $loader->getTopTen(),
        ]);
    }

    /**
     * @Route("/load-file", name="load_file")
     */
    public function loadFileAction(Request $request, LoadCsvFile $loader)
    {
        $loader->loadAndSaveFile();

        return $this->redirectToRoute('homepage');
    }
}
