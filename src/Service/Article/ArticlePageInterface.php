<?php

namespace App\Service\Article;

use App\Model\Article;

interface ArticlePageInterface
{
    public function getArticle(int $id): Article;
}