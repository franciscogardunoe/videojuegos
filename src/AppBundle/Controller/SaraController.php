<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BackendBundle\Entity\Usuario;


class SaraController extends Controller {
    public function loginAction(Request $request) {
        return $this->render('AppBundle:Default:index.html.twig', []);
    }
    
    public function usersAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository("BackendBundle:Usuario")->findAll();
        //Paginator...
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->getInt('page', 1), 5);
        $user = new User();
        $form = $this->createForm(\AppBundle\Form\UsuarioType::class, $user);
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
            $user->setRole("ROLE_ADMIN");
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', "Registro correcto");
            return $this->redirect($this->generateUrl("app_admin"));
        }
        return $this->render("AppBundle:User:users.html.twig", array('listUsers' => $pagination, 'formUsuario' => $form->createView()));
    }
    
    
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $idD = $this->get("nzo_url_encryptor")->decrypt($id);
        $user = $em->getRepository("BackendBundle:Usuario")->find($idD);
        //Paginator...
        $query = $em->getRepository("BackendBundle:Usuario")->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->getInt('page', 1), 3);

        $form = $this->createForm(\AppBundle\Form\UsuarioType::class, $user);
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
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', "Actualización correcta");
            return $this->redirect($this->generateUrl("app_admin"));
        }
        return $this->render("AppBundle:User:users.html.twig", array('listUsers' => $pagination, 'formUsuario' => $form->createView()));
    }
    
    public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("BackendBundle:Usuario")->find($id);
        $em->remove($user);
        $em->flush();
        $this->addFlash('success', "Eliminación correcta");
        return $this->redirect($this->generateUrl("app_admin"));
    }
    
}
