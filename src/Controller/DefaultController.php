<?php

namespace App\Controller;

use App\Service\Article\ArticlePageInterface;
use App\Service\Article\ArticlePresentationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class DefaultController extends AbstractController
{
    public function index(ArticlePresentationInterface $articlePresentation): Response
    {
        $articles = $articlePresentation->getLatest();

        return $this->render('default/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    public function article(int $id, ArticlePageInterface $articlePage): Response
    {
        $article = $articlePage->getArticle($id);

        return $this->render('default/article.html.twig', [
            'article' => $article,
        ]);
    }
}
