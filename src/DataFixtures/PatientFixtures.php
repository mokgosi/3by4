<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PatientFixtures extends Fixture implements DependentFixtureInterface
{
    public const PATIENT_REFERENCE = 'patient';

    public function load(ObjectManager $manager)
    {
        $patient = new Patient();
        $patient->setFirstName('John');
        $patient->setLastName('Doe');
        $patient->setEmail('john.doe@email.com');
        $patient->setCreatedAt(new \DateTimeImmutable());
        $patient->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($patient);
        $manager->flush();

        $this->addReference(self::PATIENT_REFERENCE, $patient);
    }

    public function getDependencies()
    {
        return [
            CountryFixtures::class,
        ];
    }
}
