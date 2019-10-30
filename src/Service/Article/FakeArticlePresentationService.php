<?php

declare(strict_types=1);

/*
 * This is a training news site based on Symfony framework.
 * (c) Al Maz <019maz@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Article;

use App\Collection\ArticleCollection;
use App\Model\Article;
use Faker\Factory;

final class FakeArticlePresentationService implements ArticlePresentationInterface, ArticlePageInterface
{
    private const CATEGORIES = [
        'World',
        'Sport',
        'IT',
        'Science',
    ];

    public function getLatest(): ArticleCollection
    {
        $faker = Factory::create();
        $articles = [];

        for ($i = 0; $i < 10; ++$i) {
            $article = new Article(
                $faker->numberBetween(1, 10),
                $faker->randomElement(self::CATEGORIES),
                $faker->words($faker->numberBetween(3, 5), true),
                \DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-7 days'))
            );

            $article->setDescription(
                $faker->words($faker->numberBetween(4, 8), true)
            );
            $article->setImage($faker->imageUrl());

            $articles[] = $article;
        }

        return new ArticleCollection(...$articles);
    }

    public function getArticle(int $id): Article
    {
        $faker = Factory::create();

        $article = new Article($id,
            $faker->randomElement(self::CATEGORIES),
            $faker->words($faker->numberBetween(3, 5), true),
            \DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-7 days'))
        );

        $article->setDescription(
            $faker->words($faker->numberBetween(4, 8), true)
        );
        $article->setImage($faker->imageUrl());
        $article->setBody($faker->realText(100));

        return $article;
    }
}
