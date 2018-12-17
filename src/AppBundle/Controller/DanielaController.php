<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\Videojuego;

class DanielaController extends Controller {

    public function videojuegosAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository("BackendBundle:Videojuego")->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->getInt('page', 1), 5);
        $videojuego = new Videojuego();
        $form = $this->createForm(\AppBundle\Form\VideojuegoType::class, $videojuego);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $videojuego->setImagen('default.png');
            $em->persist($videojuego);
            $em->flush();
            $this->addFlash('success', "Registro de videojuego correcto");
            return $this->redirect($this->generateUrl("app_admin_videojuegos"));
        }
        return $this->render("AppBundle:Admin:videojuegos.html.twig", array('listVideojuegos' => $pagination, 'formVideojuego' => $form->createView()));
    }
    
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $idD = $this->get("nzo_url_encryptor")->decrypt($id);
        $videojuego = $em->getRepository("BackendBundle:Videojuego")->find($idD);
        $query = $em->getRepository("BackendBundle:Videojuego")->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->getInt('page', 1), 3);

        $form = $this->createForm(\AppBundle\Form\VideojuegoType::class, $videojuego);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $videojuego->setImagen('default.png');
            $em->persist($videojuego);
            $em->flush();
            $this->addFlash('success', "Actualización de videojuego correcta");
            return $this->redirect($this->generateUrl("app_admin_videojuegos"));
        }
       return $this->render("AppBundle:Admin:videojuegos.html.twig", array('listVideojuegos' => $pagination, 'formVideojuego' => $form->createView()));
    }
    
     public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $videojuego = $em->getRepository("BackendBundle:Videojuego")->find($id);
        $em->remove($videojuego);
        $em->flush();
        $this->addFlash('success', "Eliminación del videojuego exitosa");
        return $this->redirect($this->generateUrl("app_admin_videojuegos"));
    }
}
