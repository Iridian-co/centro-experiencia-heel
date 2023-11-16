<?php

namespace App\Controller\Admin;




use App\Entity\Galeria;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GaleriaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Galeria::class;
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
            AssociationField::new('seccion'),
            CollectionField::new('imagenes')
                ->setEntryIsComplex(false)
                ->useEntryCrudForm(CoreImageOnlyCrudController::class)
                ->setColumns(12)
                //->setEntryType(CoreImageType::class)
                ->setRequired(true)
                ->hideOnIndex()
                ->renderExpanded(),
        ];
    }

}
