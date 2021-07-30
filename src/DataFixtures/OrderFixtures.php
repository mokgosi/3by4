<?php

namespace App\DataFixtures;

use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $kits = [
            $this->getReference(KitFixtures::KIT_REFERENCE),
            $this->getReference(KitFixtures::KIT1_REFERENCE),
        ];

        // create 20 orders!
        for ($i = 0; $i < 10; $i++) {
            $order = new Order();
            $order->setCountry($this->getReference(OrderFixtures::ORDER_REFERENCE));
            $order->setKit($this->getReference(KitFixtures::KIT_REFERENCE));
            $order->setPatient($this->getReference(PatientFixtures::PATIENT_REFERENCE));
            $order->setPaid(true);
            $order->setCreatedAt(new \DateTime());
            $order->setUpdatedAt(new \DateTime());
            $manager->persist($order);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PatientFixtures::class,
            KitFixtures::class,
        ];
    }
}
