<?php

namespace App\Controller;

use App\Entity\Citizen;
use App\Form\CitizenType;
use App\Repository\CitizenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/citizen')]
class CitizenController extends AbstractController
{
    #[Route('/', name: 'app_citizen_index', methods: ['GET'])]
    public function index(CitizenRepository $citizenRepository, Request $request): Response
    {
        $nis = $request->query->get('nis');
        $citizens = null;
        $message = null;
    
        if ($nis) {
            $citizen = $citizenRepository->findOneBy(['nis' => $nis]);
    
            if ($citizen) {
                $citizens = [$citizen];
            } else {
                $message = 'Cidadão não encontrado.';
            }
        } else {
            $citizens = $citizenRepository->findAll();
        }
    
        return $this->render('citizen/index.html.twig', [
            'citizens' => $citizens,
            'message' => $message,
        ]);
    }
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    #[Route('/new', name: 'app_citizen_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $citizen = new Citizen();
        $form = $this->createForm(CitizenType::class, $citizen);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('name')->getData();
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            $citizen->setName($name);
            
            try {
                $entityManager->persist($citizen);
                $entityManager->flush();
                
                $this->addFlash('success', $citizen->getName() . ' cadastrado(a) com o NIS: ' . $citizen->getNis());
                
                return $this->redirectToRoute('app_citizen_index');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Ocorreu um erro ao cadastrar o cidadão. Por favor, tente novamente mais tarde.');
            }
        }
        
        return $this->render('citizen/new.html.twig', [
            'citizen' => $citizen,
            'form' => $form->createView(),
        ]);
    }
    

    #[Route('/{id}', name: 'app_citizen_delete', methods: ['POST'])]
    public function delete(Request $request, Citizen $citizen, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$citizen->getId(), $request->request->get('_token'))) {
            $entityManager->remove($citizen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_citizen_index', [], Response::HTTP_SEE_OTHER);
    }
}