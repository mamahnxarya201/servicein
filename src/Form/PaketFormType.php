<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class PaketFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipientName', TextType::class, [
                'label' => 'Nama Penerima',
                'attr' => ['placeholder' => 'Masukkan nama penerima']
            ])
            ->add('address', TextareaType::class, [
                'label' => 'Alamat Pengiriman',
                'attr' => ['placeholder' => 'Masukkan alamat lengkap']
            ])
            ->add('phone', TelType::class, [
                'label' => 'Nomor Telepon',
                'attr' => ['placeholder' => 'Masukkan nomor telepon']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Checkout',
                'attr' => ['class' => 'checkout-button']
            ])
        ;
    }
}
