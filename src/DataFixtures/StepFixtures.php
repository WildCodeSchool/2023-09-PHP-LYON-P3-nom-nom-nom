<?php

namespace App\DataFixtures;

use App\Entity\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture implements DependentFixtureInterface
{
    public const STEPS = [
        [
            'description' => 'Préparer la viande en la marinant avec des épices et de l\'huile d\'olive',
            'recipe' => 'recipe_Donnër Kebab',
            'stepNumber' => 1
        ],

        [
            'description' => 'Cuire la viande sur une broche verticale jusqu\'à ce qu\'elle soit bien dorée',
            'recipe' => 'recipe_Donnër Kebab',
            'stepNumber' => 2
        ],

        [
            'description' => 'Découper la viande en fines tranches',
            'recipe' => 'recipe_Donnër Kebab',
            'stepNumber' => 3
        ],

        [
            'description' => 'Préparer les légumes et la sauce à l\'ail',
            'recipe' => 'recipe_Donnër Kebab',
            'stepNumber' => 4
        ],

        [
            'description' => 'Assembler le kebab en garnissant un pain pita de viande, de légumes et de sauce',
            'recipe' => 'recipe_Donnër Kebab',
            'stepNumber' => 5
        ],

        [
            'description' => 'Préparer la pâte à bao en mélangeant la farine, le sucre,
             la levure et l\'eau jusqu\'à obtention d\'une pâte homogène',
            'recipe' => 'recipe_Gua Bao',
            'stepNumber' => 1
        ],

        [
            'description' => 'Laisser reposer la pâte à couvert pendant une heure pour qu\'elle double de volume',
            'recipe' => 'recipe_Gua Bao',
            'stepNumber' => 2
        ],

        [
            'description' => 'Préparer la garniture en faisant mariner le porc avec de la sauce soja,
             de l\'ail et du gingembre',
            'recipe' => 'recipe_Gua Bao',
            'stepNumber' => 3
        ],

        [
            'description' => 'Cuire le porc mariné jusqu\'à ce qu\'il soit tendre et bien caramélisé',
            'recipe' => 'recipe_Gua Bao',
            'stepNumber' => 4
        ],

        [
            'description' => 'Assembler les bao en garnissant chaque petit pain de porc, de concombre,
             d\'oignons verts et de coriandre',
            'recipe' => 'recipe_Gua Bao',
            'stepNumber' => 5
        ],

        [
            'description' => 'Faire revenir les morceaux de poulet dans une cocotte avec de
             l\'huile d\'olive jusqu\'à ce qu\'ils soient dorés',
            'recipe' => 'recipe_poulet aux haricots blancs',
            'stepNumber' => 1
        ],

        [
            'description' => 'Ajouter les oignons et les carottes hachées, ainsi que l\'ail émincé,
             et faire cuire jusqu\'à ce qu\'ils soient tendres',
            'recipe' => 'recipe_poulet aux haricots blancs',
            'stepNumber' => 2
        ],

        [
            'description' => 'Incorporer les haricots blancs égouttés, le bouillon de poulet
             et le bouquet garni dans la cocotte',
            'recipe' => 'recipe_poulet aux haricots blancs',
            'stepNumber' => 3
        ],

        [
            'description' => 'Laisser mijoter à feu doux pendant environ 45 minutes à 1 heure,
             jusqu\'à ce que le poulet soit bien cuit et tendre',
            'recipe' => 'recipe_poulet aux haricots blancs',
            'stepNumber' => 4
        ],

        [
            'description' => 'Assaisonner avec du sel et du poivre, et servir chaud',
            'recipe' => 'recipe_poulet aux haricots blancs',
            'stepNumber' => 5
        ],

        [
            'description' => 'Griller ou cuire le poulet jusqu\'à ce qu\'il soit bien cuit',
            'recipe' => 'recipe_sandwich au poulet',
            'stepNumber' => 1
        ],

        [
            'description' => 'Couper les légumes frais (laitue, tomate, oignon) en tranches fines',
            'recipe' => 'recipe_sandwich au poulet',
            'stepNumber' => 2
        ],

        [
            'description' => 'Préparer la sauce en mélangeant de la mayonnaise avec de l\'ail haché et des herbes',
            'recipe' => 'recipe_sandwich au poulet',
            'stepNumber' => 3
        ],

        [
            'description' => 'Assembler le sandwich en plaçant le poulet grillé et
             les légumes entre deux tranches de pain, en ajoutant la sauce',
            'recipe' => 'recipe_sandwich au poulet',
            'stepNumber' => 4
        ],

        [
            'description' => 'Couper le sandwich en diagonale et servir',
            'recipe' => 'recipe_sandwich au poulet',
            'stepNumber' => 5
        ],

        [
            'description' => 'Couper des tranches fines de mortadelle',
            'recipe' => 'recipe_Sandwich à la mortadelle',
            'stepNumber' => 1
        ],

        [
            'description' => 'Trancher la baguette en deux dans le sens de la longueur',
            'recipe' => 'recipe_Sandwich à la mortadelle',
            'stepNumber' => 2
        ],

        [
            'description' => 'Garnir une moitié de la baguette avec la mortadelle, des cornichons et de la moutarde',
            'recipe' => 'recipe_Sandwich à la mortadelle',
            'stepNumber' => 3
        ],

        [
            'description' => 'Refermer le sandwich avec l\'autre moitié de la baguette',
            'recipe' => 'recipe_Sandwich à la mortadelle',
            'stepNumber' => 4
        ],

        [
            'description' => 'Couper en portions et servir',
            'recipe' => 'recipe_Sandwich à la mortadelle',
            'stepNumber' => 5
        ],

        [
            'description' => 'Couper une baguette en deux dans le sens de la longueur',
            'recipe' => 'recipe_Sandwich au jambon beurre',
            'stepNumber' => 1
        ],

        [
            'description' => 'Beurrer généreusement les deux moitiés de baguette avec du beurre doux',
            'recipe' => 'recipe_Sandwich au jambon beurre',
            'stepNumber' => 2
        ],

        [
            'description' => 'Disposer des tranches de jambon sur une moitié de la baguette',
            'recipe' => 'recipe_Sandwich au jambon beurre',
            'stepNumber' => 3
        ],

        [
            'description' => 'Assembler le sandwich en fermant
             la baguette et en appuyant légèrement pour compacter',
            'recipe' => 'recipe_Sandwich au jambon beurre',
            'stepNumber' => 4
        ],

        [
            'description' => 'Couper le sandwich en portions et servir',
            'recipe' => 'recipe_Sandwich au jambon beurre',
            'stepNumber' => 5
        ],

        [
            'description' => 'Trancher la baguette en deux dans le sens de la longueur',
            'recipe' => 'recipe_Sandwich à la coppa',
            'stepNumber' => 1
        ],

        [
            'description' => 'Disposer les tranches de coppa sur une des moitiés de la baguette',
            'recipe' => 'recipe_Sandwich à la coppa',
            'stepNumber' => 2
        ],

        [
            'description' => 'Ajouter des feuilles de roquette
             et des tranches de tomate sur la coppa',
            'recipe' => 'recipe_Sandwich à la coppa',
            'stepNumber' => 3
        ],

        [
            'description' => 'Arroser d\'un filet d\'huile d\'olive et
             d\'un peu de vinaigre balsamique',
            'recipe' => 'recipe_Sandwich à la coppa',
            'stepNumber' => 4
        ],

        [
            'description' => 'Refermer le sandwich avec l\'autre moitié
             de la baguette, couper en portions et servir',
            'recipe' => 'recipe_Sandwich à la coppa',
            'stepNumber' => 5
        ],

        [
            'description' => 'Trancher la baguette en deux dans le sens de la longueur',
            'recipe' => 'recipe_Sandwich au jambon cru',
            'stepNumber' => 1
        ],

        [
            'description' => 'Disposer les tranches de jambon cru
             sur une des moitiés de la baguette',
            'recipe' => 'recipe_Sandwich au jambon cru',
            'stepNumber' => 2
        ],

        [
            'description' => 'Ajouter des feuilles de roquette et
             des copeaux de parmesan sur le jambon cru',
            'recipe' => 'recipe_Sandwich au jambon cru',
            'stepNumber' => 3
        ],

        [
            'description' => 'Arroser d\'un filet d\'huile d\'olive et de vinaigre balsamique',
            'recipe' => 'recipe_Sandwich au jambon cru',
            'stepNumber' => 4
        ],

        [
            'description' => 'Refermer le sandwich avec l\'autre moitié
             de la baguette, couper en portions et servir',
            'recipe' => 'recipe_Sandwich au jambon cru',
            'stepNumber' => 5
        ],

        [
            'description' => 'Égoutter le thon en conserve et l\'émietter dans un bol',
            'recipe' => 'recipe_Sandwich au thon',
            'stepNumber' => 1
        ],

        [
            'description' => 'Ajouter de la mayonnaise, des câpres,
             des oignons verts hachés et du poivre au thon émietté',
            'recipe' => 'recipe_Sandwich au thon',
            'stepNumber' => 2
        ],

        [
            'description' => 'Mélanger tous les ingrédients jusqu\'à obtenir une texture homogène',
            'recipe' => 'recipe_Sandwich au thon',
            'stepNumber' => 3
        ],

        [
            'description' => 'Étaler la préparation au thon sur une moitié de pain de mie',
            'recipe' => 'recipe_Sandwich au thon',
            'stepNumber' => 4
        ],

        [
            'description' => 'Refermer avec l\'autre moitié de pain de mie, couper en portions et servir',
            'recipe' => 'recipe_Sandwich au thon',
            'stepNumber' => 5
        ],

        [
            'description' => 'Laver et couper la laitue romaine en morceaux',
            'recipe' => 'recipe_Salade caesar',
            'stepNumber' => 1
        ],

        [
            'description' => 'Préparer la sauce en mélangeant de la mayonnaise,
             de l\'ail émincé, du parmesan râpé, du jus de citron et de la moutarde',
            'recipe' => 'recipe_Salade caesar',
            'stepNumber' => 2
        ],

        [
            'description' => 'Faire griller des morceaux de poulet assaisonnés
             jusqu\'à ce qu\'ils soient bien cuits',
            'recipe' => 'recipe_Salade caesar',
            'stepNumber' => 3
        ],

        [
            'description' => 'Mélanger la laitue avec la sauce Caesar,
             ajouter des croûtons et du poulet grillé',
            'recipe' => 'recipe_Salade caesar',
            'stepNumber' => 4
        ],

        [
            'description' => 'Saupoudrer de parmesan râpé supplémentaire, si désiré, et servir',
            'recipe' => 'recipe_Salade caesar',
            'stepNumber' => 5
        ],

        [
            'description' => 'Faire chauffer de l\'huile d\'olive dans une
             cocotte et faire dorer les morceaux de jarret de veau sur tous les côtés',
            'recipe' => 'recipe_Osso buco',
            'stepNumber' => 1
        ],

        [
            'description' => 'Retirer les morceaux de viande de la cocotte et réserver',
            'recipe' => 'recipe_Osso buco',
            'stepNumber' => 2
        ],

        [
            'description' => 'Faire revenir des oignons, des carottes et
             du céleri dans la cocotte jusqu\'à ce qu\'ils soient tendres',
            'recipe' => 'recipe_Osso buco',
            'stepNumber' => 3
        ],

        [
            'description' => 'Remettre les morceaux de viande dans la cocotte,
             ajouter du vin blanc, du bouillon de volaille, des tomates concassées et des herbes',
            'recipe' => 'recipe_Osso buco',
            'stepNumber' => 4
        ],

        [
            'description' => 'Laisser mijoter à feu doux pendant environ
             2 heures jusqu\'à ce que la viande soit tendre',
            'recipe' => 'recipe_Osso buco',
            'stepNumber' => 5
        ],

        [
            'description' => 'Préparer la pâte brisée en mélangeant la farine,
             le beurre, une pincée de sel et un peu d\'eau jusqu\'à obtenir une pâte homogène',
            'recipe' => 'recipe_Quiche',
            'stepNumber' => 1
        ],

        [
            'description' => 'Étaler la pâte dans un moule à tarte et la piquer à l\'aide d\'une fourchette',
            'recipe' => 'recipe_Quiche',
            'stepNumber' => 2
        ],

        [
            'description' => 'Préparer la garniture en mélangeant des oeufs,
             de la crème fraîche, du fromage râpé et des ingrédients au choix (lardons, légumes, etc.)',
            'recipe' => 'recipe_Quiche',
            'stepNumber' => 3
        ],

        [
            'description' => 'Verser la garniture sur la pâte et étaler uniformément',
            'recipe' => 'recipe_Quiche',
            'stepNumber' => 4
        ],

        [
            'description' => 'Cuire au four préchauffé à 180°C (350°F) pendant environ 30 à 40 minutes,
             jusqu\'à ce que la quiche soit dorée et prise',
            'recipe' => 'recipe_Quiche',
            'stepNumber' => 5
        ],

        [
            'description' => 'Couper les pommes de terre en fines rondelles et les faire revenir
             dans une poêle avec de l\'huile d\'olive jusqu\'à ce qu\'elles soient tendres',
            'recipe' => 'recipe_Tortilla',
            'stepNumber' => 1
        ],

        [
            'description' => 'Ajouter les oignons émincés aux pommes de terre et poursuivre
             la cuisson jusqu\'à ce qu\'ils soient translucides',
            'recipe' => 'recipe_Tortilla',
            'stepNumber' => 2
        ],

        [
            'description' => 'Battre les oeufs dans un bol et assaisonner avec du sel et du poivre',
            'recipe' => 'recipe_Tortilla',
            'stepNumber' => 3
        ],

        [
            'description' => 'Verser les oeufs battus sur les pommes de terre et les oignons dans la poêle',
            'recipe' => 'recipe_Tortilla',
            'stepNumber' => 4
        ],

        [
            'description' => 'Cuire à feu doux jusqu\'à ce que les oeufs soient pris et le
             dessous de la tortilla soit doré, puis retourner et cuire l\'autre côté',
            'recipe' => 'recipe_Tortilla',
            'stepNumber' => 5
        ],

        [
            'description' => 'Préparer le bouillon en faisant mijoter des os de porc, des légumes,
             du kombu et du bonite séché dans de l\'eau pendant plusieurs heures',
            'recipe' => 'recipe_Ramen Japonais',
            'stepNumber' => 1
        ],

        [
            'description' => 'Cuire les nouilles ramen selon les instructions sur l\'emballage',
            'recipe' => 'recipe_Ramen Japonais',
            'stepNumber' => 2
        ],

        [
            'description' => 'Préparer les garnitures telles que les tranches de porc cuit,
             les oeufs marinés, les pousses de bambou, les champignons et les légumes',
            'recipe' => 'recipe_Ramen Japonais',
            'stepNumber' => 3
        ],

        [
            'description' => 'Assembler le ramen en plaçant les nouilles cuites dans un bol,
             en versant le bouillon chaud par-dessus et en disposant les garnitures sur le dessus',
            'recipe' => 'recipe_Ramen Japonais',
            'stepNumber' => 4
        ],

        [
            'description' => 'Servir immédiatement et déguster chaud',
            'recipe' => 'recipe_Ramen Japonais',
            'stepNumber' => 5
        ],

        [
            'description' => 'Préparer la pâte feuilletée en étalant la pâte et en la pliant
             en plusieurs couches avec du beurre',
            'recipe' => 'recipe_Pasteis de nata',
            'stepNumber' => 1
        ],

        [
            'description' => 'Diviser la pâte en petits disques et les placer dans des
             moules à muffins préalablement beurrés',
            'recipe' => 'recipe_Pasteis de nata',
            'stepNumber' => 2
        ],

        [
            'description' => 'Préparer la crème en mélangeant du lait, de la farine, du sucre,
             de la vanille et des jaunes d\'oeufs dans une casserole',
            'recipe' => 'recipe_Pasteis de nata',
            'stepNumber' => 3
        ],

        [
            'description' => 'Verser la crème dans les moules préparés avec la pâte feuilletée',
            'recipe' => 'recipe_Pasteis de nata',
            'stepNumber' => 4
        ],

        [
            'description' => 'Cuire au four préchauffé à 220°C (425°F) pendant environ 15 à 20 minutes,
             jusqu\'à ce que les pasteis soient dorés et croustillants',
            'recipe' => 'recipe_Pasteis de nata',
            'stepNumber' => 5
        ],

        [
            'description' => 'Trancher du pain en tranches épaisses',
            'recipe' => 'recipe_Pains perdus',
            'stepNumber' => 1
        ],

        [
            'description' => 'Tremper les tranches de pain dans un mélange d\'oeufs battus,
             de lait, de sucre et de vanille',
            'recipe' => 'recipe_Pains perdus',
            'stepNumber' => 2
        ],

        [
            'description' => 'Faire fondre du beurre dans une poêle et y faire dorer
             les tranches de pain imbibées des deux côtés',
            'recipe' => 'recipe_Pains perdus',
            'stepNumber' => 3
        ],

        [
            'description' => 'Saupoudrer de sucre glace et de cannelle avant de servir',
            'recipe' => 'recipe_Pains perdus',
            'stepNumber' => 4
        ],

        [
            'description' => 'Accompagner de sirop d\'érable, de confiture ou de fruits frais selon les préférences',
            'recipe' => 'recipe_Pains perdus',
            'stepNumber' => 5
        ],

        [
            'description' => 'Faire fondre du chocolat noir et du beurre au bain-marie',
            'recipe' => 'recipe_Brownie chocolat orange',
            'stepNumber' => 1
        ],

        [
            'description' => 'Ajouter du sucre, des oeufs, de la farine, du cacao en poudre,
             du zeste d\'orange et une pincée de sel dans un saladier',
            'recipe' => 'recipe_Brownie chocolat orange',
            'stepNumber' => 2
        ],

        [
            'description' => 'Incorporer le mélange chocolat-beurre dans le saladier et
             bien mélanger jusqu\'à obtenir une pâte homogène',
            'recipe' => 'recipe_Brownie chocolat orange',
            'stepNumber' => 3
        ],

        [
            'description' => 'Verser la pâte dans un moule préalablement beurré et tapissé de papier sulfurisé',
            'recipe' => 'recipe_Brownie chocolat orange',
            'stepNumber' => 4
        ],

        [
            'description' => 'Cuire au four préchauffé à 180°C (350°F) pendant environ 25 à 30 minutes,
             jusqu\'à ce que le brownie soit cuit mais encore moelleux',
            'recipe' => 'recipe_Brownie chocolat orange',
            'stepNumber' => 5
        ],

        [
            'description' => 'Préparer la pâte brisée en mélangeant de la farine, du beurre,
             du sucre et une pincée de sel jusqu\'à obtenir une texture sableuse',
            'recipe' => 'recipe_Tarte tatin',
            'stepNumber' => 1
        ],

        [
            'description' => 'Disposer des morceaux de beurre dans un moule à tarte et saupoudrer de sucre',
            'recipe' => 'recipe_Tarte tatin',
            'stepNumber' => 2
        ],

        [
            'description' => 'Disposer les quartiers de pommes sur le fond du moule, bien serrés',
            'recipe' => 'recipe_Tarte tatin',
            'stepNumber' => 3
        ],

        [
            'description' => 'Recouvrir les pommes de la pâte brisée en rentrant
             les bords à l\'intérieur du moule',
            'recipe' => 'recipe_Tarte tatin',
            'stepNumber' => 4
        ],

        [
            'description' => 'Cuire au four préchauffé à 200°C (400°F) pendant environ 30 à 40 minutes,
             jusqu\'à ce que la pâte soit dorée et croustillante',
            'recipe' => 'recipe_Tarte tatin',
            'stepNumber' => 5
        ],

        [
            'description' => 'Préparer la pâte sablée en mélangeant de la farine,
             du sucre, du beurre et un jaune d\'oeuf',
            'recipe' => 'recipe_Tarte citron meringue',
            'stepNumber' => 1
        ],

        [
            'description' => 'Étaler la pâte dans un moule à tarte et la piquer
             à l\'aide d\'une fourchette, puis la faire cuire à blanc',
            'recipe' => 'recipe_Tarte citron meringue',
            'stepNumber' => 2
        ],

        [
            'description' => 'Préparer la crème au citron en mélangeant du jus de citron,
             du zeste de citron, du sucre, des oeufs et du beurre dans une casserole',
            'recipe' => 'recipe_Tarte citron meringue',
            'stepNumber' => 3
        ],

        [
            'description' => 'Verser la crème au citron sur le fond de tarte cuit',
            'recipe' => 'recipe_Tarte citron meringue',
            'stepNumber' => 4
        ],

        [
            'description' => 'Préparer la meringue en montant les blancs d\'oeufs en neige avec du sucre, 
            puis les étaler sur la crème au citron',
            'recipe' => 'recipe_Tarte citron meringue',
            'stepNumber' => 5
        ],

        [
            'description' => 'Rincer et égoutter les pois chiches en conserve',
            'recipe' => 'recipe_Hummus',
            'stepNumber' => 1
        ],

        [
            'description' => 'Mixer les pois chiches avec de l\'huile d\'olive, du jus de citron,
             de l\'ail émincé, du tahini et du sel jusqu\'à obtenir une texture lisse',
            'recipe' => 'recipe_Hummus',
            'stepNumber' => 2
        ],

        [
            'description' => 'Ajuster l\'assaisonnement selon les goûts en ajoutant
             plus de sel, de citron ou de tahini si nécessaire',
            'recipe' => 'recipe_Hummus',
            'stepNumber' => 3
        ],

        [
            'description' => 'Transférer l\'hummus dans un bol de service et faire un puits au centre',
            'recipe' => 'recipe_Hummus',
            'stepNumber' => 4
        ],

        [
            'description' => 'Arroser d\'huile d\'olive et saupoudrer de paprika avant de servir',
            'recipe' => 'recipe_Hummus',
            'stepNumber' => 5
        ],

        [
            'description' => 'Dénoyauter les olives et les couper en rondelles',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 1
        ],

        [
            'description' => 'Enrouler chaque olive dans une tranche de jambon',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 2
        ],

        [
            'description' => 'Fixer avec un cure-dent pour maintenir le tout en place',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 3
        ],

        [
            'description' => 'Répéter l\'opération jusqu\'à épuisement des ingrédients',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 4
        ],

        [
            'description' => 'Servir comme amuse-gueule ou en-cas lors de réceptions',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 5
        ],

        [
            'description' => 'Dénoyauter les olives et les couper en rondelles',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 1
        ],

        [
            'description' => 'Enrouler chaque olive dans une tranche de jambon',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 2
        ],

        [
            'description' => 'Fixer avec un cure-dent pour maintenir le tout en place',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 3
        ],

        [
            'description' => 'Répéter l\'opération jusqu\'à épuisement des ingrédients',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 4
        ],

        [
            'description' => 'Servir comme amuse-gueule ou en-cas lors de réceptions',
            'recipe' => 'recipe_Jambon olive',
            'stepNumber' => 5
        ],

        [
            'description' => 'Couper le filet de boeuf en petits dés réguliers',
            'recipe' => 'recipe_Tartare de boeuf',
            'stepNumber' => 1
        ],

        [
            'description' => 'Hacher finement les câpres, les cornichons, les échalotes et la ciboulette',
            'recipe' => 'recipe_Tartare de boeuf',
            'stepNumber' => 2
        ],

        [
            'description' => 'Mélanger les dés de boeuf avec les ingrédients hachés dans un bol',
            'recipe' => 'recipe_Tartare de boeuf',
            'stepNumber' => 3
        ],

        [
            'description' => 'Assaisonner avec de la moutarde, de la sauce Worcestershire,
             du sel, du poivre et un filet d\'huile d\'olive',
            'recipe' => 'recipe_Tartare de boeuf',
            'stepNumber' => 4
        ],

        [
            'description' => 'Mélanger délicatement, rectifier l\'assaisonnement si nécessaire et 
            dresser dans des assiettes individuelles',
            'recipe' => 'recipe_Tartare de boeuf',
            'stepNumber' => 5
        ],

        [
            'description' => 'Trancher très finement le filet de boeuf à l\'aide d\'un couteau bien aiguisé',
            'recipe' => 'recipe_Carpaccio de boeuf',
            'stepNumber' => 1
        ],

        [
            'description' => 'Disposer les tranches de boeuf sur des assiettes individuelles
             en les chevauchant légèrement',
            'recipe' => 'recipe_Carpaccio de boeuf',
            'stepNumber' => 2
        ],

        [
            'description' => 'Arroser d\'un filet d\'huile d\'olive extra vierge et de jus de citron',
            'recipe' => 'recipe_Carpaccio de boeuf',
            'stepNumber' => 3
        ],

        [
            'description' => 'Parsemer de copeaux de parmesan et de roquette sur le dessus',
            'recipe' => 'recipe_Carpaccio de boeuf',
            'stepNumber' => 4
        ],

        [
            'description' => 'Assaisonner avec du sel et du poivre fraîchement moulu,
            puis servir immédiatement',
            'recipe' => 'recipe_Carpaccio de boeuf',
            'stepNumber' => 5
        ],

        [
            'description' => 'Préchauffer le four à 160°C (320°F)',
            'recipe' => 'recipe_Crème brulée au fois gras',
            'stepNumber' => 1
        ],

        [
            'description' => 'Fouetter les jaunes d\'oeufs avec du sucre jusqu\'à ce que le mélange blanchisse',
            'recipe' => 'recipe_Crème brulée au fois gras',
            'stepNumber' => 2
        ],

        [
            'description' => 'Ajouter du foie gras mi-cuit coupé en petits dés à la préparation',
            'recipe' => 'recipe_Crème brulée au fois gras',
            'stepNumber' => 3
        ],

        [
            'description' => 'Verser la crème liquide et le lait dans la préparation tout en continuant de fouetter',
            'recipe' => 'recipe_Crème brulée au fois gras',
            'stepNumber' => 4
        ],

        [
            'description' => 'Répartir la préparation dans des ramequins et 
            cuire au bain-marie au four pendant environ 40 minutes',
            'recipe' => 'recipe_Crème brulée au fois gras',
            'stepNumber' => 5
        ],

        [
            'description' => 'Couper le camembert en morceaux rectangulaires ou en triangles',
            'recipe' => 'recipe_Croustillant camembert',
            'stepNumber' => 1
        ],

        [
            'description' => 'Battre un oeuf dans un bol et verser de la chapelure dans un autre bol',
            'recipe' => 'recipe_Croustillant camembert',
            'stepNumber' => 2
        ],

        [
            'description' => 'Tremper les morceaux de camembert dans l\'oeuf battu,
             puis les rouler dans la chapelure pour les enrober uniformément',
            'recipe' => 'recipe_Croustillant camembert',
            'stepNumber' => 3
        ],

        [
            'description' => 'Faire chauffer de l\'huile dans une poêle et y faire frire les morceaux de camembert panés
             jusqu\'à ce qu\'ils soient dorés et croustillants',
            'recipe' => 'recipe_Croustillant camembert',
            'stepNumber' => 4
        ],

        [
            'description' => 'Égoutter sur du papier absorbant avant de servir chaud, accompagné de 
            confiture de figues ou de gelée de groseille',
            'recipe' => 'recipe_Croustillant camembert',
            'stepNumber' => 5
        ],

        [
            'description' => 'Couper le saumon en petits dés réguliers',
            'recipe' => 'recipe_Tartare de Saumon',
            'stepNumber' => 1
        ],

        [
            'description' => 'Hacher finement les échalotes, la ciboule et la coriandre',
            'recipe' => 'recipe_Tartare de Saumon',
            'stepNumber' => 2
        ],

        [
            'description' => 'Mélanger les dés de saumon avec les ingrédients hachés dans un bol',
            'recipe' => 'recipe_Tartare de Saumon',
            'stepNumber' => 3
        ],

        [
            'description' => 'Assaisonner avec de la sauce soja, du jus de citron vert,
             du sel, du poivre et un filet d\'huile de sésame',
            'recipe' => 'recipe_Tartare de Saumon',
            'stepNumber' => 4
        ],

        [
            'description' => 'Mélanger délicatement, rectifier l\'assaisonnement si 
            nécessaire et dresser dans des assiettes individuelles',
            'recipe' => 'recipe_Tartare de Saumon',
            'stepNumber' => 5
        ],

        [
            'description' => 'Faire la pâte en mélangeant de l\'eau et de la farine
             jusqu\'à obtenir une consistance homogène',
            'recipe' => 'recipe_Oeufs fumés au bacon',
            'stepNumber' => 1
        ],

        [
            'description' => 'Préchauffer le four à 200°C (400°F)',
            'recipe' => 'recipe_Oeufs fumés au bacon',
            'stepNumber' => 2
        ],

        [
            'description' => 'Préparer les ingrédients : cuire les tranches de bacon jusqu\'à croustillantes,
             casser les oeufs dans des ramequins, égoutter le bacon',
            'recipe' => 'recipe_Oeufs fumés au bacon',
            'stepNumber' => 3
        ],

        [
            'description' => 'Assembler les oeufs fumés au bacon en disposant deux tranches de bacon sur chaque oeuf,
             saupoudrer de fromage râpé, assaisonner avec du sel et du poivre',
            'recipe' => 'recipe_Oeufs fumés au bacon',
            'stepNumber' => 4
        ],

        [
            'description' => 'Cuire au four pendant environ 10 à 15 minutes,
             jusqu\'à ce que le fromage soit fondu et doré',
            'recipe' => 'recipe_Oeufs fumés au bacon',
            'stepNumber' => 5
        ],

        [
            'description' => 'Éplucher les asperges et couper les extrémités dures',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 1
        ],

        [
            'description' => 'Faire bouillir de l\'eau dans une casserole et y plonger
             les asperges pendant 3-5 minutes, jusqu\'à ce qu\'elles soient tendres',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 2
        ],

        [
            'description' => 'Retirer les asperges de l\'eau bouillante et les plonger 
            immédiatement dans de l\'eau glacée pour arrêter la cuisson',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 3
        ],

        [
            'description' => 'Égoutter les asperges refroidies et les placer dans un blender',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 4
        ],

        [
            'description' => 'Ajouter dans le blender : des feuilles de basilic frais,
             de l\'ail émincé, du yaourt grec, du jus de citron, du sel et du poivre',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 5
        ],

        [
            'description' => 'Mixer le tout jusqu\'à obtenir une consistance lisse et homogène',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 6
        ],

        [
            'description' => 'Goûter et ajuster l\'assaisonnement si nécessaire',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 7
        ],

        [
            'description' => 'Réfrigérer le gaspacho pendant au moins 1 heure avant de servir',
            'recipe' => 'recipe_Gaspaccio d\'asperges',
            'stepNumber' => 8
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::STEPS as $stepFixture) {
            $step = new Step();
            $step->setDescription($stepFixture['description']);
            $step->setRecipe($this->getReference($stepFixture['recipe']));
            $step->setStepNumber($stepFixture['stepNumber']);

            $manager->persist($step);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RecipeFixture::class,
        ];
    }
}
