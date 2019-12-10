<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController
{

    public function helloAction() {
        return(new JsonResponse(['data' => 'hello symfony']));
    }

    public function numberAction($number) {
        return(new JsonResponse(['data' => $number, 'unlocked' => 'this is a string']));
    }

    public function lockedNumberAction(int $number) {
        return(new JsonResponse(['data' => $number, 'locked' => 'this number is locked']));
    }

    public function putAction() {
        return(new JsonResponse(['method' => 'put']));
    }

}