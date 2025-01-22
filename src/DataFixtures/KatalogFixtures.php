<?php
// src/DataFixtures/BarangFixtures.php
namespace App\DataFixtures;

use App\Entity\Katalog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class KatalogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $barangs = [
            [
                'tipe' => 'RAM',
                'name' => 'DDR4 3200MHz, 16GB Dual Channel',
                'harga' => 'Rp 1.200.000',
                'images' => 'images/corsair.jpg'
            ],
            [
                'tipe' => 'Motherboard',
                'name' => 'ATX, Socket AM4, 4x DDR4',
                'harga' => 'Rp 2.500.000',
                'images' => 'images/motherboard.jpg'
            ],
            [
                'tipe' => 'Processor',
                'name' => 'AMD Ryzen 5 5600X, 6-Core',
                'harga' => 'Rp 3.200.000',
                'images' => 'images/processor.jpg'
            ],
            [
                'tipe' => 'SSD',
                'name' => 'NVMe M.2, 1TB, 3500MB/s',
                'harga' => 'Rp 1.800.000',
                'images' => 'images/ssd evo.jpg'
            ]
        ];

        foreach ($barangs as $data) {
            $katalog = new Katalog();
            $katalog->setTipe($data['tipe']);
            $katalog->setName($data['name']);
            $katalog->setHarga($data['harga']);
            $katalog->setImages($data['images']);

            $manager->persist($katalog);
        }

        $manager->flush();
    }
}
