<?php

namespace App\DataFixtures;
use App\Entity\TypeProperty;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TypePropertyFixtures extends Fixture
{
    public const cabane_arbre = 'cabanes-arbres';
    public const CABANE_EAU_REF = 'cabanes-eau';
    public const ROULOTTE_REF = 'roulotte';
    public const YOURTE_REF = 'yourte';
    public const BULLE_REF = 'bulle';
    public const TIPI_REF = 'tipis';
    public const CHALET_REF = 'chalet';
    public const BATEAU_REF = 'bateau';
    public const INCLASSABLE_REF = 'cat-inclasssables';

    public function load(ObjectManager $manager)
    {
        $cabaneA = new TypeProperty();
        $cabaneA->setTitle('cabane dans les arbres')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::CABANES));

        $this->addReference(self::cabane_arbre, $cabaneA);

        $manager->persist($cabaneA);

        $cabanesEau = new TypeProperty();
        $cabanesEau->setTitle('cabane sur l\'eau')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::CABANES_EAU));
        
        $this->addReference(self::CABANE_EAU_REF, $cabanesEau);

        $manager->persist($cabanesEau);

        $bulle = new TypeProperty();
        $bulle->setTitle('bulle')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::bulles));

        $this->addReference(self::BULLE_REF, $bulle);

        $manager->persist($cabanesEau);

        $yourte = new TypeProperty();
        $yourte->setTitle('yourte')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::yourtes));

        $this->addReference(self::YOURTE_REF, $yourte);

        $manager->persist($yourte);

        $tipis = new TypeProperty();
        $tipis->setTitle('tipi')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::tipis));

        $this->addReference(self::TIPI_REF, $tipis);

        $chalets = new TypeProperty();
        $chalets->setTitle('chalets')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::chalets));

        $this->addReference(self::CHALET_REF, $chalets);
        $manager->persist($chalets);

        $bateaux = new TypeProperty();
        $bateaux->setTitle('bateaux')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::bateaux));

        $this->addReference(self::BATEAU_REF, $bateaux);
        $manager->persist($bateaux);

        $inclassables = new TypeProperty();
        $inclassables->setTitle('Igloo dans le sud de la france')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::inclassables));

        $this->addReference(self::INCLASSABLE_REF, $inclassables);
        $manager->persist($inclassables);

        $roulottes = new TypeProperty();
        $roulottes->setTitle('Igloo dans le sud de la france')
                ->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
                // ->addProperty($this->getReference(PropertyFixtures::roulottes));

        $this->addReference(self::ROULOTTE_REF, $inclassables);
        $manager->persist($roulottes);
        $manager->flush();
    }
}
