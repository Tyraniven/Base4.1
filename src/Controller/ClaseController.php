<?php

namespace App\Controller;

use App\Entity\Clase;
use App\Form\ClaseType;
use App\Repository\ClaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Clase")
 */
class ClaseController extends Controller
{
    /**
     * @Route("/", name="clase_index", methods="GET")
     */
    public function index(ClaseRepository $claseRepository): Response
    {
        return $this->render('clase/index.html.twig', ['clases' => $claseRepository->findAll()]);
    }

    /**
     * @Route("/new", name="clase_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $clase = new Clase();
        $form = $this->createForm(ClaseType::class, $clase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clase);
            $em->flush();

            return $this->redirectToRoute('clase_index');
        }

        return $this->render('clase/new.html.twig', [
            'clase' => $clase,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clase_show", methods="GET")
     */
    public function show(Clase $clase): Response
    {
        return $this->render('clase/show.html.twig', ['clase' => $clase]);
    }

    /**
     * @Route("/{id}/edit", name="clase_edit", methods="GET|POST")
     */
    public function edit(Request $request, Clase $clase): Response
    {
        $form = $this->createForm(ClaseType::class, $clase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clase_edit', ['id' => $clase->getId()]);
        }

        return $this->render('clase/edit.html.twig', [
            'clase' => $clase,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clase_delete", methods="DELETE")
     */
    public function delete(Request $request, Clase $clase): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clase->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clase);
            $em->flush();
        }

        return $this->redirectToRoute('clase_index');
    }
}
