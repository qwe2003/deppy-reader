<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DebbyReaderFormType;
use App\Service\DeppyReaderService;

class DebbyReaderController extends AbstractController
{
    public function debbyReaderAction(Request $request, DeppyReaderService $deppyReaderService)
    {
        $form = $this->createForm(DebbyReaderFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $deppyReaderService->getHml($data['password'], $data['code']);
        }

        return $this->render('debby_reader_template.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
        