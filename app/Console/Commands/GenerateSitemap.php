<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Food;
use App\Models\Blog;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add Food URLs
        $foods = Food::all();
        print_r($foods. PHP_EOL);

        foreach ($foods as $food) {
            print_r($food->id . PHP_EOL);
            $sitemap->add(
            //    Url::create(route('recipes.show', $food->id))
 //                    Url::create(route('food.index',['recipe' => $food->id]))
        Url::create(route('food.menu',['menu' => $food->id]))
                    ->setLastModificationDate($food->updated_at)
            );
        }

        // Add Blog URLs
        $blogs = Blog::all();

 //       dd($blogs);
//print_r($blogs);



        foreach ($blogs as $blog) {
   //         dd($blog);
            print_r($blog->category.'/'.$blog->slug . PHP_EOL);

            $sitemap->add(
             //   Url::create(route('blogs.index', $blog->category.'/'.$blog->slug))

                    Url::create(route('blogs.show', ['category' => $blog->category, 'slug' => $blog->slug]))
                    ->setLastModificationDate($blog->updated_at)
            );


        }

        // Save the Sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
