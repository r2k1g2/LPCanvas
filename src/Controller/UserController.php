<?php


namespace App\Controller;


use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    public function userAction()
    {
        $user = new User(12,'Jean', 'Dupont', new DateTime(), new DateTime());

        return $this->json($user);
    }

    public function userNew($firstName, $lastName)
    {
        $user = new User(null, $firstName, $lastName, new DateTime(), new DateTime());

        return $this->json($user);
    }

    public function userList()
    {
        $userList = array();
        $i = 0;

        while($i < 4)
        {
            $user = new User($i,'Jean', 'Dupont', new DateTime(), new DateTime());
            array_push($userList, $user);
            ++$i;
        }

        return $this->json($userList);
    }

}