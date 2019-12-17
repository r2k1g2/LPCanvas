<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Flight;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FlightController extends AbstractController
{
    public function listFlights() {
        $flights = $this-> getDoctrine()
            -> getRepository(Flight::class)
            -> findAll();
        return $this->json($flights);
    }

    public function createFlight() {
        $entityManager = $this->getDoctrine()->getManager();
        $pilot = new Flight(NULL, NULL, New DateTime(), New DateTime(), NULL);

        $entityManager->persist($pilot);
        $entityManager->flush();

        return new Response($this->json($pilot));

    }

    public function showFlight($id) {
        $flight = $this-> getDoctrine()
            -> getRepository(Flight::class)
            -> find($id);
        return $this->json($flight);
    }

    public function updateFlight($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $flight = $this-> getDoctrine()->getRepository(Flight::class)->find($id);

        $flight->setLastName('This is a new Last Name');

        $entityManager->persist($flight);
        $entityManager->flush();

        try {
            return new Response($this->json($flight));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function deleteFlight($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $flight = $this-> getDoctrine()->getRepository(Flight::class)->find($id);

        $entityManager->remove($flight);
        $entityManager->flush();
        return $this->json($flight);
    }
}