<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dash;
use App\Entity\Capitalize;
use App\Entity\Logger;
use App\Entity\Master;


class HomepageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {

        $form = $this->createFormBuilder()
            ->add('message', TextType::class, ['label' => 'Your text'])
            ->add('transform', ChoiceType::class, ['choices' => ['Capitalize' => 0, 'Dash' => 1], 'label' => 'Transform type'])
            ->add('save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $input = $form->getData();

            $transform = [new Capitalize(), new Dash()];
            $masterClass = new Master($transform[$input['transform']], new Logger());
            $message =  $masterClass->transformAndLog($input['message']);

            return $this->render('homepage/index.html.twig', [
                'form' => $form->createView(),
                'input' => $input,
                'message' => $message,
            ]);
        }

        return $this->render('homepage/index.html.twig', [
            'form' => $form->createView(),
            'message' => '',
        ]);
    }
}
