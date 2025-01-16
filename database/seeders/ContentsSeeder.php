<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create(['page'=>'home','description'=>'slider-1']);
        Content::create(['page'=>'home','description'=>'slider-2']);
        Content::create(['page'=>'home','description'=>'slider-3']);
        Content::create(['page'=>'home','description'=>'slider-4']);
        Content::create(['page'=>'home','description'=>'video']);
        Content::create(['page'=>'about-us','description'=>'history-body']);
        Content::create(['page'=>'about-us','description'=>'history-img']);
        Content::create(['page'=>'about-us','description'=>'visi-body']);
        Content::create(['page'=>'about-us','description'=>'misi-body']);
        Content::create(['page'=>'about-us','description'=>'welcome-body']);
        Content::create(['page'=>'about-us','description'=>'welcome-img']);
        Content::create(['page'=>'about-us','description'=>'welcome-sub-title']);
        Content::create(['page'=>'about-us','description'=>'structure-org-1']);
        Content::create(['page'=>'about-us','description'=>'structure-org-2']);
        Content::create(['page'=>'about-us','description'=>'structure-org-3']);
        Content::create(['page'=>'about-us','description'=>'structure-org-4']);
        Content::create(['page'=>'about-us','description'=>'structure-org-5']);
        Content::create(['page'=>'academic','description'=>'kinder-img']);
        Content::create(['page'=>'academic','description'=>'kinder-desc']);
        Content::create(['page'=>'academic','description'=>'primary-img']);
        Content::create(['page'=>'academic','description'=>'primary-desc']);
        Content::create(['page'=>'academic','description'=>'secondary-img']);
        Content::create(['page'=>'academic','description'=>'secondary-desc']);
        Content::create(['page'=>'kindergarten','description'=>'kinder-desc']);
        Content::create(['page'=>'kindergarten','description'=>'kinder-img-1']);
        Content::create(['page'=>'kindergarten','description'=>'kinder-img-2']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-hari']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-jam']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-desc-1']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-desc-2']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-desc-3']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-desc-4']);
        Content::create(['page'=>'kindergarten','description'=>'playgroup-hari']);
        Content::create(['page'=>'kindergarten','description'=>'playgroup-jam']);
        Content::create(['page'=>'kindergarten','description'=>'playgroup-desc-1']);
        Content::create(['page'=>'kindergarten','description'=>'playgroup-desc-2']);
        Content::create(['page'=>'kindergarten','description'=>'playgroup-desc-3']);
        Content::create(['page'=>'kindergarten','description'=>'playgroup-desc-4']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-hari']);
        Content::create(['page'=>'kindergarten','description'=>'toodler-jam']);
        Content::create(['page'=>'kindergarten','description'=>'kinder-desc-1']);
        Content::create(['page'=>'kindergarten','description'=>'kinder-desc-2']);
        Content::create(['page'=>'kindergarten','description'=>'kinder-desc-3']);
        Content::create(['page'=>'kindergarten','description'=>'kinder-desc-4']);
        Content::create(['page'=>'kindergarten','description'=>'campus-1-img']);
        Content::create(['page'=>'kindergarten','description'=>'campus-1-title']);
        Content::create(['page'=>'kindergarten','description'=>'campus-1-alamat']);
        Content::create(['page'=>'kindergarten','description'=>'campus-1-contact']);
        Content::create(['page'=>'kindergarten','description'=>'campus-2-img']);
        Content::create(['page'=>'kindergarten','description'=>'campus-2-title']);
        Content::create(['page'=>'kindergarten','description'=>'campus-2-alamat']);
        Content::create(['page'=>'kindergarten','description'=>'campus-2-contact']);
        Content::create(['page'=>'kindergarten','description'=>'campus-3-img']);
        Content::create(['page'=>'kindergarten','description'=>'campus-3-title']);
        Content::create(['page'=>'kindergarten','description'=>'campus-3-alamat']);
        Content::create(['page'=>'kindergarten','description'=>'campus-3-contact']);
        Content::create(['page'=>'kindergarten','description'=>'campus-4-img']);
        Content::create(['page'=>'kindergarten','description'=>'campus-4-title']);
        Content::create(['page'=>'kindergarten','description'=>'campus-4-alamat']);
        Content::create(['page'=>'kindergarten','description'=>'campus-4-contact']);
        Content::create(['page'=>'kindergarten','description'=>'primary13-hari']);
        Content::create(['page'=>'kindergarten','description'=>'primary46-hari']);
        Content::create(['page'=>'kindergarten','description'=>'primary13-jam']);
        Content::create(['page'=>'kindergarten','description'=>'primary46-jam']);
        Content::create(['page'=>'primary','description'=>'primary-desc']);
        Content::create(['page'=>'primary','description'=>'primary-img-1']);
        Content::create(['page'=>'primary','description'=>'primary-img-2']);
        Content::create(['page'=>'kindergarten','description'=>'primary-img']);
        Content::create(['page'=>'kindergarten','description'=>'primary-title']);
        Content::create(['page'=>'kindergarten','description'=>'primary-alamat']);
        Content::create(['page'=>'kindergarten','description'=>'primary-contact']);
        
    }
}
