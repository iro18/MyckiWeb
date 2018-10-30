<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace Mycki\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MyckiBundle\Entity\Page;

class LoadCategory implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $names = array(
      array(
        'Titre page','Titre-page','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porta mi sed felis rutrum, ac maximus augue placerat. Vivamus ac lorem semper, tempor metus vel, lacinia mi. Suspendisse potenti. Integer eu rutrum erat, vitae accumsan dolor. Cras sed vehicula sapien, eu aliquet dui. Nam pellentesque dui sit amet nulla facilisis, ut vehicula nisi euismod. Vivamus finibus enim id lacus varius, eget feugiat odio porta. Aliquam erat volutpat.

Pellentesque euismod pellentesque faucibus. Maecenas tincidunt tincidunt velit, ut vehicula risus cursus eget. Mauris bibendum fringilla placerat. Nullam viverra tristique pellentesque. Sed et tempus nulla. Mauris est magna, molestie ut imperdiet nec, dictum at ligula. Nunc consequat tincidunt neque sed bibendum. Sed vitae rutrum magna. Nunc pretium leo gravida felis condimentum auctor.

Duis ut consequat augue, vitae ultricies metus. Phasellus vestibulum turpis pulvinar metus faucibus, eu luctus quam mattis. Sed mollis pulvinar metus, vitae bibendum sapien congue eget. Nulla facilisi. Vivamus aliquet orci neque, vel facilisis lorem fringilla eget. Nulla sed ipsum pulvinar, blandit ipsum at, pulvinar dui. Pellentesque pulvinar ipsum sed diam accumsan pulvinar. Proin aliquet tincidunt orci id mattis')
    ,array(
            'Titre page 2','Titre-page-2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porta mi sed felis rutrum, ac maximus augue placerat. Vivamus ac lorem semper, tempor metus vel, lacinia mi. Suspendisse potenti. Integer eu rutrum erat, vitae accumsan dolor. Cras sed vehicula sapien, eu aliquet dui. Nam pellentesque dui sit amet nulla facilisis, ut vehicula nisi euismod. Vivamus finibus enim id lacus varius, eget feugiat odio porta. Aliquam erat volutpat.

Pellentesque euismod pellentesque faucibus. Maecenas tincidunt tincidunt velit, ut vehicula risus cursus eget. Mauris bibendum fringilla placerat. Nullam viverra tristique pellentesque. Sed et tempus nulla. Mauris est magna, molestie ut imperdiet nec, dictum at ligula. Nunc consequat tincidunt neque sed bibendum. Sed vitae rutrum magna. Nunc pretium leo gravida felis condimentum auctor.

Duis ut consequat augue, vitae ultricies metus. Phasellus vestibulum turpis pulvinar metus faucibus, eu luctus quam mattis. Sed mollis pulvinar metus, vitae bibendum sapien congue eget. Nulla facilisi. Vivamus aliquet orci neque, vel facilisis lorem fringilla eget. Nulla sed ipsum pulvinar, blandit ipsum at, pulvinar dui. Pellentesque pulvinar ipsum sed diam accumsan pulvinar. Proin aliquet tincidunt orci id mattis'
),array(
        'Titre page 3','Titre-page-3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porta mi sed felis rutrum, ac maximus augue placerat. Vivamus ac lorem semper, tempor metus vel, lacinia mi. Suspendisse potenti. Integer eu rutrum erat, vitae accumsan dolor. Cras sed vehicula sapien, eu aliquet dui. Nam pellentesque dui sit amet nulla facilisis, ut vehicula nisi euismod. Vivamus finibus enim id lacus varius, eget feugiat odio porta. Aliquam erat volutpat.

Pellentesque euismod pellentesque faucibus. Maecenas tincidunt tincidunt velit, ut vehicula risus cursus eget. Mauris bibendum fringilla placerat. Nullam viverra tristique pellentesque. Sed et tempus nulla. Mauris est magna, molestie ut imperdiet nec, dictum at ligula. Nunc consequat tincidunt neque sed bibendum. Sed vitae rutrum magna. Nunc pretium leo gravida felis condimentum auctor.

Duis ut consequat augue, vitae ultricies metus. Phasellus vestibulum turpis pulvinar metus faucibus, eu luctus quam mattis. Sed mollis pulvinar metus, vitae bibendum sapien congue eget. Nulla facilisi. Vivamus aliquet orci neque, vel facilisis lorem fringilla eget. Nulla sed ipsum pulvinar, blandit ipsum at, pulvinar dui. Pellentesque pulvinar ipsum sed diam accumsan pulvinar. Proin aliquet tincidunt orci id mattis'  
)    
    );

      

    foreach ($names as $name) {
      // On crée la catégorie
      $category = new Page();
      $category->setSlug($name[1]);
      $category->setContent($name[2]);
      $category->setTitle($name[0]);

      // On la persiste
      $manager->persist($category);
      $manager->flush();
    }

    // On déclenche l'enregistrement de toutes les catégories

  }
}