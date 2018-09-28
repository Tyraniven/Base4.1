<?php

namespace App\Controller;

use App\Entity\Estudiante;
use App\Form\EstudianteType;
use App\Repository\EstudianteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Estudiante")
 */
class EstudianteController extends Controller
{
    /**
     * @Route("/", name="estudiante_index", methods="GET")
     */
    public function index(EstudianteRepository $estudianteRepository): Response
    {
        return $this->render('estudiante/index.html.twig', ['estudiantes' => $estudianteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="estudiante_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $estudiante = new Estudiante();
        $form = $this->createForm(EstudianteType::class, $estudiante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estudiante);
            $em->flush();

            return $this->redirectToRoute('estudiante_index');
        }

        return $this->render('estudiante/new.html.twig', [
            'estudiante' => $estudiante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="estudiante_show", methods="GET")
     */
    public function show(Estudiante $estudiante): Response
    {
        return $this->render('estudiante/show.html.twig', ['estudiante' => $estudiante]);
    }

    /**
     * @Route("/{id}/edit", name="estudiante_edit", methods="GET|POST")
     */
    public function edit(Request $request, Estudiante $estudiante): Response
    {
        $form = $this->createForm(EstudianteType::class, $estudiante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estudiante_edit', ['id' => $estudiante->getId()]);
        }

        return $this->render('estudiante/edit.html.twig', [
            'estudiante' => $estudiante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="estudiante_delete", methods="DELETE")
     */
    public function delete(Request $request, Estudiante $estudiante): Response
    {
        if ($this->isCsrfTokenValid('delete'.$estudiante->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estudiante);
            $em->flush();
        }

        return $this->redirectToRoute('estudiante_index');
    }
}
