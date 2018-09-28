<?php

namespace App\Controller;

use App\Entity\Grupo;
use App\Form\GrupoType;
use App\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Grupo")
 */
class GrupoController extends Controller
{
    /**
     * @Route("/", name="grupo_index", methods="GET")
     */
    public function index(GrupoRepository $grupoRepository): Response
    {
        return $this->render('grupo/index.html.twig', ['grupos' => $grupoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="grupo_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $grupo = new Grupo();
        $form = $this->createForm(GrupoType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grupo);
            $em->flush();

            return $this->redirectToRoute('grupo_index');
        }

        return $this->render('grupo/new.html.twig', [
            'grupo' => $grupo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grupo_show", methods="GET")
     */
    public function show(Grupo $grupo): Response
    {
        return $this->render('grupo/show.html.twig', ['grupo' => $grupo]);
    }

    /**
     * @Route("/{id}/edit", name="grupo_edit", methods="GET|POST")
     */
    public function edit(Request $request, Grupo $grupo): Response
    {
        $form = $this->createForm(GrupoType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grupo_edit', ['id' => $grupo->getId()]);
        }

        return $this->render('grupo/edit.html.twig', [
            'grupo' => $grupo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grupo_delete", methods="DELETE")
     */
    public function delete(Request $request, Grupo $grupo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grupo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($grupo);
            $em->flush();
        }

        return $this->redirectToRoute('grupo_index');
    }
}
