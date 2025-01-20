<?php

namespace App\Form;

use App\Entity\Paket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaketFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('penerima', TextType::class, [
                'label' => 'Nama Penerima',
                'attr' => ['placeholder' => 'Masukkan nama penerima']
            ])
            ->add('alamat', TextareaType::class, [
                'label' => 'Alamat Pengiriman',
                'attr' => ['placeholder' => 'Masukkan alamat lengkap']
            ])
            ->add('notelp', TelType::class, [
                'label' => 'Nomor Telepon',
                'attr' => ['placeholder' => 'Masukkan nomor telepon']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Checkout',
                'attr' => ['class' => 'checkout-button']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paket::class,
        ]);
    }
}
