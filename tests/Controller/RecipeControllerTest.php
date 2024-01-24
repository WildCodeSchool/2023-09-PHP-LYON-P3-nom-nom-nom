<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecipeControllerTest extends WebTestCase
{
    public function testRoute(): void
    {
        $client = static::createClient();
        $client->request('GET', '/Recettes/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'LISTE DES RECETTES');
    }
}
