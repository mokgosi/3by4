<?php

namespace App\DataFixtures;

use App\Entity\CountryKit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CountryKitFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $kit = new CountryKit();
        $kit->setCountry($this->getReference(CountryFixtures::COUNTRY_REFERENCE));
        $kit->setKit($this->getReference(KitFixtures::KIT_REFERENCE));
        $kit->setPrice(100.00);
        $manager->persist($kit);

        $kit1 = new CountryKit();
        $kit1->setCountry($this->getReference(CountryFixtures::COUNTRY1_REFERENCE));
        $kit1->setKit($this->getReference(KitFixtures::KIT_REFERENCE));
        $kit1->setPrice(200.00);
        $manager->persist($kit1);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CountryFixtures::class,
            KitFixtures::class,
        ];
    }
}
