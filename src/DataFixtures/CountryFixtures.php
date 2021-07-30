<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public const COUNTRY_REFERENCE = 'country';

    public function load(ObjectManager $manager)
    {
        $country = new Country();
        $country->setName('South Africa');
        $country->setIsoCode('RSA');
        $manager->persist($country);

        $country1 = new Country();
        $country1->setName('United States Of America');
        $country1->setIsoCode('USA');
        $manager->persist($country1);

        $manager->flush();

        $this->addReference(self::COUNTRY_REFERENCE, $country);
    }
}
