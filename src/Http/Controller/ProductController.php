<?php

namespace App\Http\Controller;

use App\Domain\Product;
use Doctrine\Persistence\ManagerRegistry;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
    #[Route('/save', name: 'create_product')]
    public function createProduct(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return $this->json([
            'message' => 'Saved new product with id ' . $product->getId(),
            'code' => 201
        ]);

    }

    #[Route('/product/{id}', name: 'product_show')]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return $this->json([
            'name' => $product->getName(),
            'code' => 201
        ]);
        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    #[Route('/product/edit/{id}', name: 'product_edit')]
    public function update(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $product->setName('New product name!');
        $entityManager->flush();

        /* return $this->redirectToRoute('product_show', [
             'id' => $product->getId()
         ]);*/
        return $this->json([
            'id' => $product->getId(),
            'code' => 201
        ]);
    }

    #[Route(path: "/products/index", name: "products")]
    public function allProducts(ManagerRegistry $doctrine): JsonResponse
    {
        $id =1;
        $entityManager = $doctrine->getManager();
        $repository=$entityManager->getRepository(Product::class);

// look for a single Product by its primary key (usually "id")
        $product = $repository->find($id);

// look for a single Product by name
        $product = $repository->findOneBy(['name' => 'Keyboard']);
// or find by name and price
        $product = $repository->findOneBy([
            'name' => 'Keyboard',
            'price' => 1999,
            'description'=>'electronics',
            'id' =>1
        ]);

        // look for multiple Product objects matching the name, ordered by price
        $products = $repository->findBy(
            ['name' => 'Keyboard'],
            ['price' => 'ASC']
        );

        $minPrice = 1000;

        $allGreaterThank = $repository->findAllGreaterThanPrice($minPrice);


        // look for *all* Product objects
        //$products = $repository->findAll();
        $products = $repository->findOneById(1);

        return $this->json([
            'data' => $products,
        ]);
    }
}
