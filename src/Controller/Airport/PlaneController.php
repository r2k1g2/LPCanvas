<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Plane;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlaneController extends AbstractController
{
    public function listPlanes() {
        $planes = $this-> getDoctrine()
            -> getRepository(Plane::class)
            -> findAll();
        return $this->json($planes);
    }

    public function showPlane($id) {
        $plane = $this-> getDoctrine()
            -> getRepository(Plane::class)
            -> find($id);
        return $this->json($plane);
    }

    public function deletePlane($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $plane = $this-> getDoctrine()->getRepository(Plane::class)->find($id);

        $entityManager->remove($plane);
        $entityManager->flush();
        return $this->json($plane);
    }
}