<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Pilot;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PilotController extends AbstractController
{
    public function listPilots() {
        $pilots = $this-> getDoctrine()
            -> getRepository(Pilot::class)
            -> findAll();
        return $this->json($pilots);
    }

    public function showPilot($id) {
        $pilot = $this-> getDoctrine()
            -> getRepository(Pilot::class)
            -> find($id);
        return $this->json($pilot);
    }

    public function createPilot() {
        $entityManager = $this->getDoctrine()->getManager();
        $pilot = new Pilot('pilot first name', 'pilot last name', new DateTime(), new DateTime(), new DateTime(), new DateTime());

        $entityManager->persist($pilot);
        $entityManager->flush();

        return new Response($this->json($pilot));

    }

    public function updatePilot($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $pilot = $this-> getDoctrine()->getRepository(Pilot::class)->find($id);

        $pilot->setLastName('This is a new Last Name');

        $entityManager->persist($pilot);
        $entityManager->flush();

        try {
            return new Response($this->json($pilot));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function deletePilot($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $pilot = $this-> getDoctrine()->getRepository(Pilot::class)->find($id);

        $entityManager->remove($pilot);
        $entityManager->flush();
        return $this->json($pilot);
    }
}