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
        $kit->setName('Kit Name 1');
        $kit->setDescription('Kit Name 1 Short Description');
        $kit->setPrice(mt_rand(10, 100));
        $manager->persist($kit);

        $kit1 = new Kit();
        $kit1->setName('Kit Name 2');
        $kit1->setDescription('Kit Name 2 Short Description');
        $kit1->setPrice(mt_rand(10, 100));
        $manager->persist($kit1);

        $this->addReference(self::KIT_REFERENCE, $kit);
        $this->addReference(self::KIT1_REFERENCE, $kit1);

        $manager->flush();
    }
}
