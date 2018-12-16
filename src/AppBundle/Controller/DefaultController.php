<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;

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
            return $this->redirectToRoute('app_admin');
        } else if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_user');
        }
    }

    public function registerUserAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $user = new Usuario();
        $form = $this->createForm(UsuarioType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Indica que ocupe el encoder declarado en el security.yml
            $factory = $this->get("security.encoder_factory");
            //Convierte/Codifica... el objeto
            $encoder = $factory->getEncoder($user);
            //Codifica la contraseña con el encoder del objeto y el salt del objeto
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            //Reasigna la contraseña codificada
            $user->setPassword($password);
            $user->setRole("ROLE_USER");
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', "Registro de usuario correcto");
            return $this->redirect($this->generateUrl("app_index"));
        }
        return $this->render("AppBundle:Default:registroCuenta.html.twig", array('formUser' => $form->createView()));
    }

    public function userDashboardAction(Request $requesr) {
        return $this->render("AppBundle:User:dashboard.html.twig", array());
    }

    public function adminDashboardAction(Request $request) {
        return $this->render("AppBundle:Admin:dashboard.html.twig", array());
    }

}
