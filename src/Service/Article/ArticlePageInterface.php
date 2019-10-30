<?php

declare(strict_types=1);

/*
 * This is a training news site based on Symfony framework.
 * (c) Al Maz <019maz@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Article;

use App\Model\Article;

interface ArticlePageInterface
{
    public function getArticle(int $id): Article;
}
