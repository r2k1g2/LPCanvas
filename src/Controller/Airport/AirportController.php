<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Airport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AirportController extends AbstractController
{
    public function listAirports() {
        $airports = $this-> getDoctrine()
            -> getRepository(Airport::class)
            -> findAll();
        return $this->json($airports);
    }

    public function showAirport($id) {
        $airport = $this-> getDoctrine()
            -> getRepository(Airport::class)
            -> find($id);
        return $this->json($airport);
    }

    public function deleteAirport($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $airport = $this-> getDoctrine()->getRepository(Airport::class)->find($id);

        $entityManager->remove($airport);
        $entityManager->flush();
        return $this->json($airport);
    }
}