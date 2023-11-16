<?php

namespace App\Controller\Admin;


use App\Entity\Texto;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;



class TextoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Texto::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('llave'),
            AssociationField::new('seccion')->setRequired(0),
            CollectionField::new('translations')
                ->setColumns(12)
                ->setEntryIsComplex(true)
                ->useEntryCrudForm(TextoTranslationCrudController::class)
                ->setRequired(true)
                ->renderExpanded(true)
        ];
    }

}
