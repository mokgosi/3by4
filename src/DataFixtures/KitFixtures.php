<?php

namespace App\DataFixtures;

use App\Entity\Kit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class KitFixtures extends Fixture
{
    public const KIT_REFERENCE = 'kit';
    public const KIT1_REFERENCE = 'kit1';

    public function load(ObjectManager $manager)
    {
        $kit = new Kit();
        $kit->setName('DNA Test');
        $kit->setDescription('DNA Test');
        $manager->persist($kit);

        $kit1 = new Kit();
        $kit1->setName('Ethnicity Estimate');
        $kit1->setDescription('Ethnicity Estimate');
        $manager->persist($kit1);

        $this->addReference(self::KIT_REFERENCE, $kit);
        $this->addReference(self::KIT1_REFERENCE, $kit1);

        $manager->flush();
    }
}
