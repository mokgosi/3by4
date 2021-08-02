<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Patient;
use App\Entity\Dto\PatientDTO;
use App\Entity\Dto\OrderDTO;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/order')]
class OrderController extends AbstractController
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }

    #[Route('/', name: 'order_index', methods: ['GET'])]
    public function index(OrderRepository $orderRepository): Response
    {
        return $this->render('order/index.html.twig', [
            'orders' => $orderRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'order_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $dto = new OrderDTO();
        $form = $this->createForm(OrderType::class, $dto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $patient = new Patient();
            $patient->setFirstName($dto->getPatient()->getFirstName());
            $patient->setLastName($dto->getPatient()->getLastName());
            $patient->setEmail($dto->getPatient()->getEmail());
            $entityManager->persist($patient);

            $order = new Order();
            $order->setCountry($dto->getCountry());
            $order->setKit($dto->getKit());
            $order->setPatient($patient);
            $order->setPaid($dto->getPaid());
            $entityManager->persist($order);

            $entityManager->flush();

            return $this->redirectToRoute('order_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('order/new.html.twig', [
            'order' => $dto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'order_show', methods: ['GET'])]
    public function show(Order $order): Response
    {
        $order = $this->orderRepository
            ->findOneById($order->getId());

        return $this->render('order/show.html.twig', [
            'order' => $order,
        ]);
    }
}
