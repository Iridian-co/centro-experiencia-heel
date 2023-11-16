<?php

namespace App\Controller\Admin;

use App\Entity\CoreImage;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CoreImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CoreImage::class;
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
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            TextField::new('imagetabletFile')->setFormType(VichImageType::class)->onlyOnForms(),
            TextField::new('imagemobileFile')->setFormType(VichImageType::class)->onlyOnForms(),
            AssociationField::new('seccion'),
            BooleanField::new('visible'),
            ImageField::new('image', 'Imagen')
                ->onlyOnIndex()
                ->setBasePath('/uploads/images/'),
            CollectionField::new('translations')
                ->setColumns(12)
                ->setEntryIsComplex(true)
                ->useEntryCrudForm(CoreImageTranslationCrudController::class)
                ->setRequired(true)
                ->renderExpanded(true)
        ];
    }

    public function createIndexQueryBuilder(
        SearchDto $searchDto,
        EntityDto $entityDto,
        FieldCollection $fields,
        FilterCollection $filters
    ): QueryBuilder {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        $qb->andWhere($qb->expr()->isNotNull('entity.llave'));
        $qb->andWhere($qb->expr()->orX(
            $qb->expr()->isNull('entity.isVideo'),
            $qb->expr()->eq('entity.isVideo', ':value'),
        ))->setParameter('value', false);
        
        return $qb;
    }
}
