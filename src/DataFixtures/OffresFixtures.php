<?php

namespace App\DataFixtures;

use App\Entity\Offres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class OffresFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('fr_FR');

        for($off = 1; $off <= 10; $off++){
            $offre = new Offres();
            $offre->setName($faker->text(15));
            $offre->setDescription($faker->text());
            $offre->setSlug($this->slugger->slug($offre->getName())->lower());
            $offre->setPrice($faker->numberBetween(900, 150000));
            $offre->setStock($faker->numberBetween(0, 10));

            //On va chercher une référence de catégorie
            $category = $this->getReference('cat-'. rand(1, 8));
            $offre->setCategories($category);

            $this->setReference('off-'.$off, $offre);
            $manager->persist($offre);
        }

        $manager->flush();
    }
}
