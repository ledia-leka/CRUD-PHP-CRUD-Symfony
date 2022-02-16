<?php

namespace App\Controller;

use App\Entity\Scrud;
use App\Form\ScrudType;
use App\Repository\ScrudRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scrud")
 */
class ScrudController extends AbstractController
{
    /**
     * @Route("/", name="scrud_index", methods={"GET"})
     */
    public function index(ScrudRepository $scrudRepository): Response
    {
        return $this->render('scrud/index.html.twig', [
            'scruds' => $scrudRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scrud_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scrud = new Scrud();
        $form = $this->createForm(ScrudType::class, $scrud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scrud);
            $entityManager->flush();

            return $this->redirectToRoute('scrud_index');
        }

        return $this->render('scrud/new.html.twig', [
            'scrud' => $scrud,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scrud_show", methods={"GET"})
     */
    public function show(Scrud $scrud): Response
    {
        return $this->render('scrud/show.html.twig', [
            'scrud' => $scrud,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scrud_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Scrud $scrud): Response
    {
        $form = $this->createForm(ScrudType::class, $scrud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scrud_index');
        }

        return $this->render('scrud/edit.html.twig', [
            'scrud' => $scrud,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scrud_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Scrud $scrud): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scrud->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scrud);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scrud_index');
    }
}
