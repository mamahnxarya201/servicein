<?php

namespace App\Form;

use App\Entity\ServiceSchedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('detail', TextareaType::class, [
                'label' => 'Detail Kerusakan',
                'attr' => [
                    'placeholder' => 'Jelaskan kerusakan pada perangkat Anda...',
                ],
                'required' => true,
            ])
            ->add('alamat', TextType::class, [
                'label' => 'Alamat',
                'attr' => [
                    'placeholder' => 'Masukkan alamat Anda',
                ],
                'required' => true,
            ])
            ->add('notelp', TelType::class, [
                'label' => 'Nomor Telepon',
                'attr' => [
                    'placeholder' => 'Masukkan nomor telepon Anda',
                ],
                'required' => true,
            ])
            ->add('date', DateType::class, [
                'label' => 'Tanggal Service',
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Pilihan Layanan',
                'choices' => [
                    'Pilih layanan' => '',
                    'On-site Service' => 'on-site',
                    'House Call Service' => 'housecall',
                ],
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ServiceSchedule::class
        ]);
    }
}