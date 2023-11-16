<?php

namespace App\Controller\Admin;

use App\Entity\TextoTranslation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class TextoTranslationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TextoTranslation::class;
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
            AssociationField::new('locale')->setRequired(true),
            TextField::new('titulo'),
            TextField::new('valor')->setColumns(10)->setRequired(true),
            TextField::new('boton'),
            TextField::new('link'),
        ];
    }

}
