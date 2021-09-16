<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class EmployeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInSingular('un employé')
        ->setEntityLabelInPlural('Les employés par service')
        ->setSearchFields(['name','surname','jobtitle']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        ->add(EntityFilter::new('service'));
    }



    
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('service','service');
        yield ImageField::new('picture','photo')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads/')
        ->setFormType(FileUploadType::class);
        yield TextField::new('name','nom');
        yield TextField::new('surname','prénom');
        yield TextField::new('jobtitle','intitulé de poste');
        yield TextEditorField::new('biography','biographie')
        ->hideOnIndex();



        // return [
        //     IdField::new('id'),
        //     TextField::new('title'),
        //     TextEditorField::new('description'),
        // ];
    }
    
}
