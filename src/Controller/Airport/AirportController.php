<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Airport;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AirportController extends AbstractController
{
    public function listAirports() {
        $airports = $this-> getDoctrine()
            -> getRepository(Airport::class)
            -> findAll();
        return $this->json($airports);
    }

    public function createAirport() {
        $entityManager = $this->getDoctrine()->getManager();
        $pilot = new Airport('420', 'Berlin Airport');

        $entityManager->persist($pilot);
        $entityManager->flush();

        return new Response($this->json($pilot));

    }

    public function showAirport($id) {
        $airport = $this-> getDoctrine()
            -> getRepository(Airport::class)
            -> find($id);
        return $this->json($airport);
    }

    public function updateAirport(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $airport = $this-> getDoctrine()->getRepository(Airport::class)->find($id);

        $airport->setDepartureDatetime(new DateTime());

        $entityManager->persist($airport);
        $entityManager->flush();

        try {
            return new Response($this->json($airport));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function deleteAirport($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $airport = $this-> getDoctrine()->getRepository(Airport::class)->find($id);

        $entityManager->remove($airport);
        $entityManager->flush();
        return $this->json($airport);
    }
}