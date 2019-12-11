<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Pilot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function deletePilot($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $pilot = $this-> getDoctrine()->getRepository(Pilot::class)->find($id);

        $entityManager->remove($pilot);
        $entityManager->flush();
        return $this->json($pilot);
    }
}