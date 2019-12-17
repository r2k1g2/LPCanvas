<?php


namespace App\Controller\Airport;


use App\Entity\Airport\Plane;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function createPlane(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $plane = new Plane($request->get('airplaneName'),$request->get('model'), NULL, NULL);

        $plane->setCode($request->get('airplaneCode'));
        $entityManager->persist($plane);
        $entityManager->flush();

        return new Response($this->json($plane));

    }

    public function updatePlane(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $plane = $this-> getDoctrine()->getRepository(Plane::class)->find($id);

        if (null !== $request->get('name')) {
            $plane->setName($request->get('airplaneName'));
            $plane->setName($request->get('model'));
            $plane->setName($request->get('airplaneCode'));
        }

        $entityManager->persist($plane);
        $entityManager->flush();

        try {
            return new Response($this->json($plane));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function deletePlane($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $plane = $this-> getDoctrine()->getRepository(Plane::class)->find($id);

        $entityManager->remove($plane);
        $entityManager->flush();

        return new Response($this->json($plane));
    }
}