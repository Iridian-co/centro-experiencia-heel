<?php

namespace App\Controller\Admin;


use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Entity\SettingEncrypted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class SettingEncryptedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SettingEncrypted::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityPermission('ROLE_ADMIN');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('llave'),
            TextField::new('valor'),

        ];
    }

}
