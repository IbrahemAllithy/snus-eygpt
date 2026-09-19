<?php

namespace Database\Seeders;

use App\Models\Admin\BlogNewsDetail;
use Illuminate\Database\Seeder;

class BlogNewsDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 31; $i++) { 
            BlogNewsDetail::insertOrIgnore(
                [
                    'blog_news_id' => '1',
                    'language_id' => $i,
                    'name' => 'Blog Cat1 Title1',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
                ]
            );
        
            BlogNewsDetail::insertOrIgnore(
                [
                    'blog_news_id' => '2',
                    'language_id' => $i,
                    'name' => 'Blog Cat1 Title2',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
                ]
            );
        
            BlogNewsDetail::insertOrIgnore(
                [
                    'blog_news_id' => '3',
                    'language_id' => $i,
                    'name' => 'Blog Cat1 Title3',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
                ]
            );
        
            BlogNewsDetail::insertOrIgnore(
                [
                    'blog_news_id' => '4',
                    'language_id' => $i,
                    'name' => 'Blog Cat2 Title1',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
                ]
            );
        
            BlogNewsDetail::insertOrIgnore(
                [
                    'blog_news_id' => '5',
                    'language_id' => $i,
                    'name' => 'Blog Cat2 Title2',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
                ]
            );
        
            BlogNewsDetail::insertOrIgnore(
                [
                    'blog_news_id' => '6',
                    'language_id' => $i,
                    'name' => 'Blog Cat2 Title3',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
                ]
            );
        }
    }
}
