<?php

namespace App\Controller;

use App\Entity\Docente;
use App\Form\DocenteType;
use App\Repository\DocenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Docente")
 */
class DocenteController extends Controller
{
    /**
     * @Route("/", name="docente_index", methods="GET")
     */
    public function index(DocenteRepository $docenteRepository): Response
    {
        return $this->render('docente/index.html.twig', ['docentes' => $docenteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="docente_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $docente = new Docente();
        $form = $this->createForm(DocenteType::class, $docente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($docente);
            $em->flush();

            return $this->redirectToRoute('docente_index');
        }

        return $this->render('docente/new.html.twig', [
            'docente' => $docente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="docente_show", methods="GET")
     */
    public function show(Docente $docente): Response
    {
        return $this->render('docente/show.html.twig', ['docente' => $docente]);
    }

    /**
     * @Route("/{id}/edit", name="docente_edit", methods="GET|POST")
     */
    public function edit(Request $request, Docente $docente): Response
    {
        $form = $this->createForm(DocenteType::class, $docente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('docente_edit', ['id' => $docente->getId()]);
        }

        return $this->render('docente/edit.html.twig', [
            'docente' => $docente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="docente_delete", methods="DELETE")
     */
    public function delete(Request $request, Docente $docente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$docente->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($docente);
            $em->flush();
        }

        return $this->redirectToRoute('docente_index');
    }
}
