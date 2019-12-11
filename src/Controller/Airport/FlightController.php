<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Flight;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FlightController extends AbstractController
{
    public function listFlights() {
        $flights = $this-> getDoctrine()
            -> getRepository(Flight::class)
            -> findAll();
        return $this->json($flights);
    }

    public function showFlight($id) {
        $flight = $this-> getDoctrine()
            -> getRepository(Flight::class)
            -> find($id);
        return $this->json($flight);
    }

    public function deleteFlight($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $flight = $this-> getDoctrine()->getRepository(Flight::class)->find($id);

        $entityManager->remove($flight);
        $entityManager->flush();
        return $this->json($flight);
    }
}