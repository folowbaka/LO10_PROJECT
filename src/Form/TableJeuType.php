<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 22/05/2018
 * Time: 23:42
 */

namespace App\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\TableJeu;

class TableJeuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('type',EntityType::class,array('class'=>\App\Entity\TableJeuType::class,'choice_label'=>'nom','multiple'=>false,'expanded'=>true,'attr'=>array('class'=>'form-check-inline'),'label'=>'Type de jeu'))
            ->add('description',TextareaType::class,array('attr'=>array('rows'=>10)))
            ->add('ville',TextType::class)
            ->add('adresse',TextType::class)
            ->add('emailOrganisateur',EmailType::class,array('label'=>'Email'))
            ->add('telephone',TelType::class)
            ->add('save',SubmitType::class)
            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => TableJeu::class,
        ));
    }

}