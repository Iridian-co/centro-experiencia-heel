<?php

namespace App\Controller\Admin;


use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Entity\TextoBig;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;



class TextoBigCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TextoBig::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsInlined()
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('llave'),
            AssociationField::new('seccion')->setRequired(0),
            CollectionField::new('translations')
                ->setColumns(12)
                ->setEntryIsComplex(true)
                ->useEntryCrudForm(TextoBigTranslationCrudController::class)
                ->setRequired(true)
                 ->renderExpanded(true)
        ];
    }

}
