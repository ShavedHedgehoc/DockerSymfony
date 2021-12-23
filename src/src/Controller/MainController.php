<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\Type\BatchNameType;
// use App\Repository\BatchRepository;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")

     */
    public function main(Request $request): Response
    {
        return $this->render('index.html.twig');
    }
    /**
     * @Route("/batch", name="batch")          
     */
    public function batch(Request $request, \App\Repository\BatchRepository $queriesManager): Response
    {
        $data = array();
        $form = $this->createForm(BatchNameType::class, $data);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            return $this->redirectToRoute('batch', array('batchname' => $data['batchname']));
        }
        if (isset($_GET['batchname'])) {
            $batchname = $_GET['batchname'];
            $boilTableData = $queriesManager->findBoilData($batchname);
            $weightTableData = $queriesManager->findWeightData($batchname);
            $loadTableData = $queriesManager->findLoadData($batchname);
        } else {
            $batchname = '';
            $boilTableData = '';
            $weightTableData = '';
            $loadTableData = '';
        }

        return $this->render(
            'batch.html.twig',
            [
                'form' => $form->createView(),
                'batchname' => $batchname,
                'boilTableData' => $boilTableData,
                'weightTableData' => $weightTableData,
                'loadTableData' => $loadTableData,
            ]
        );
        // return $this->render('batch.html.twig');
    }
    /**
     * @Route("/lot", name="lot")          
     */
    public function lot(): Response
    {
        ob_start();
        phpinfo();
        $phpinfo = ob_get_clean();
        return $this->render('lot.html.twig',['arr'=>$phpinfo]);
    }
    /**
     * @Route("/product", name="product")       
     */
    public function product(): Response
    {
        return $this->render('product.html.twig');
    }
    /**
     * @Route("/check", name="check")          
     */
    public function check(): Response
    {
        return $this->render('check.html.twig');
    }
    /**
     * @Route("/form", name="form")          
     */
    public function form(Request $request): Response

    {
        $data = array();
        $form = $this->createForm(BatchNameType::class, $data);
        $form->handleRequest($request);
        return $this->render('_form.html.twig', ['form' => $form->createView(),]);
    }
}
