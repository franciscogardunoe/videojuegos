<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        if ($this->getUser()) {
            return $this->redirectToRoute('role_check');
        }
        return $this->render('AppBundle:Default:index.html.twig', array());
    }

    public function loginAction(Request $request) {
        if ($this->getUser()) {
            return $this->redirectToRoute('role_check');
        }
        return $this->render("AppBundle:Default:index.html.twig", []);
    }

    public function roleCheckAction(Request $request) {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_users');
        } else if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_user_profile');
        }
    }
    
}
