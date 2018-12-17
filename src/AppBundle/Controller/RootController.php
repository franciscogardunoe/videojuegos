<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\Recomendacion;

class RootController extends Controller {

    public function detailsVideogameAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $idV = $this->get("nzo_url_encryptor")->decrypt($id);
        $videogame = $em->getRepository("BackendBundle:Videojuego")->find($idV);
        $recomendations = $em->getRepository("BackendBundle:Recomendacion")->findBy(array('idvideojuego' => $idV), array('idrecomendacion' => 'DESC'));
        return $this->render("AppBundle:User:detallesVideojuego.html.twig", array('videogame' => $videogame, 'recomendations' => $recomendations));
    }

    public function registerRecomendationAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $idV = $this->get("nzo_url_encryptor")->decrypt($id);
        $videogame = $em->getRepository("BackendBundle:Videojuego")->find($idV);
        $comentario = $request->get("comentario");
        $estrellas = $request->get("estrellas");
        if ($estrellas == "") {
            $estrellas = 0;
        }
        $recomendation = new Recomendacion();
        $recomendation->setComentario($comentario);
        $recomendation->setEstrellas($estrellas);
        $recomendation->setIdusuario($this->getUser());
        $recomendation->setIdvideojuego($videogame);
        $em->persist($recomendation);
        $em->flush();
        $this->addFlash('success', "Registro de reseña correcta");
        return $this->redirect($this->generateUrl("app_details_videogame", array('id' => $id)));
    }

}
