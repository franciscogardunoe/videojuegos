<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\Clasificacion;
use BackendBundle\Entity\Clasificaciondetipo;

class EvelynController extends Controller {

    public function tiposAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository("BackendBundle:Clasificaciondetipo")->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 5);

        $tipo = new Clasificaciondetipo();
        $formTipo = $this->createForm(\AppBundle\Form\ClasificaciondetipoType::class, $tipo);
        $formTipo->handleRequest($request);
        if ($formTipo->isSubmitted() && $formTipo->isValid()) {
            $em->persist($tipo);
            $em->flush();
            $this->addFlash('success', "Registro de Tipo de Clasificación correcto");
            return $this->redirect($this->generateUrl("app_admin_tipos"));
        }
        return $this->render("AppBundle:Admin:clasificaciondetipo.html.twig", array('listTipo' => $pagination, 'formTipo' => $formTipo->createView()));
    }

    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $idTipo = $this->get("nzo_url_encryptor")->decrypt($id);
        $tipo = $em->getRepository("BackendBundle:Clasificaciondetipo")->find($idTipo);
        $query = $em->getRepository("BackendBundle:Clasificaciondetipo")->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->getInt('page', 1), 3);

        $form = $this->createForm(\AppBundle\Form\ClasificaciondetipoType::class, $tipo);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($tipo);
            $em->flush();
            $this->addFlash('success', "Actualización de tipo de videojuego correcta");
            return $this->redirect($this->generateUrl("app_admin_tipos"));
        }
        return $this->render("AppBundle:Admin:clasificaciondetipo.html.twig", array('listTipo' => $pagination, 'formTipo' => $form->createView()));
    }
    
    public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->getRepository("BackendBundle:Clasificaciondetipo")->find($id);
        $em->remove($tipo);
        $em->flush();
        $this->addFlash('success', "Eliminación del tipo de videojuego exitosa");
        return $this->redirect($this->generateUrl("app_admin_tipos"));
    }

    
    // CLASIFICACIONES
    public function clasificacionesAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository("BackendBundle:Clasificacion")->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 5);

        $clasificacion = new Clasificacion();
        $formClasificacion = $this->createForm(\AppBundle\Form\ClasificacionType::class, $clasificacion);
        $formClasificacion->handleRequest($request);
        if ($formClasificacion->isSubmitted() && $formClasificacion->isValid()) {
            $em->persist($clasificacion);
            $em->flush();
            $this->addFlash('success', "Registro de Clasificacion correcto");
            return $this->redirect($this->generateUrl("app_admin_clasificaciones"));
        }
        return $this->render("AppBundle:Admin:clasificacion.html.twig", array('listClasificacion' => $pagination, 'formClasificacion' => $formClasificacion->createView()));
    }

    public function updateClasificacionAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $idCl = $this->get("nzo_url_encryptor")->decrypt($id);
        $clasificacion = $em->getRepository("BackendBundle:Clasificacion")->find($idCl);
        $query = $em->getRepository("BackendBundle:Clasificacion")->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->getInt('page', 1), 5);

        $form = $this->createForm(\AppBundle\Form\ClasificacionType::class, $clasificacion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($clasificacion);
            $em->flush();
            $this->addFlash('success', "Actualización de Clasificación de videojuego correcta");
            return $this->redirect($this->generateUrl("app_admin_clasificaciones"));
        }
        return $this->render("AppBundle:Admin:clasificacion.html.twig", array('listClasificacion' => $pagination, 'formClasificacion' => $form->createView()));
        
        }
    
    public function deleteClasificacionAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $clasificacion = $em->getRepository("BackendBundle:Clasificacion")->find($id);
        $em->remove($clasificacion);
        $em->flush();
        $this->addFlash('success', "Eliminación de la clasificacion exitosa");
        return $this->redirect($this->generateUrl("app_admin_clasificaciones"));
    }
}
