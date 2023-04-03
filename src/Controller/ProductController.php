<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/Home', name: 'app_product')]
    public function index(  ProductRepository $productRepository,
                            PaginatorInterface $paginator,
                            request $request): Response
    {
        //recuperation du premier produit
        $firtProduct = $productRepository->findOneBy([], ['dateCreation' => 'ASC']);
        //recuperation des 4 produits suivants
        $fourProduct = $productRepository->findBy([], ['dateCreation' => 'DESC'], 4);
        //recuperation du reste des produits
        $products = $productRepository->findBy([], ['dateCreation' => 'DESC']);
        $products = array_slice($products, 5);
        $products =  $paginator->paginate($products, $request->query->getInt('page', 1), 3);


        return $this->render('Home/index.html.twig', [
            'controller_name' => 'ProductController',
            'firstProduct' =>$firtProduct,
            'fourProduct' =>$fourProduct,
            'products' =>$products

        ]);
    }
}
