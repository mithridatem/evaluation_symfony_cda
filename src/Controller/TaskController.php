<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\TaskType;
class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_task')]
    public function showAllTask(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll();
        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }

    #[Route('/task/add', name:'app_task_add')]
    public function addTask(Request $request, EntityManagerInterface $em) : Response {
        $msg = "";
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $task->setStatus(true);
            $em->persist($task);
            $em->flush();
            $msg = "La tache " . $task->getTitle() . " a été ajouté en BDD";
        }
        return $this->render('task/addtask.html.twig', [
            'form' => $form->createView(),
            'msg' => $msg,
        ]);
    }
}
