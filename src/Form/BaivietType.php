<?php

namespace App\Form;

use App\Entity\Baiviet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BaivietType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tieude')
            ->add('noidung')
            ->add('ngayxuatban')
            ->add('hinh')
            ->add('tacgia')
            ->add('theloai')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Baiviet::class,
        ]);
    }
}
