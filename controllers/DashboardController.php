<?php
namespace Src\Controllers;

class DashboardController
{
    public function index()
    {
        // 1) your dynamic data
        $stats = [
          ['number'=>'50K+','label'=>'Student joined'],
          ['number'=>'630+','label'=>'Best Online Course'],
          ['number'=>'220+','label'=>'Brands Companions'],
          ['number'=>'75+','label'=>'Experienced Teachers'],
        ];
        $services = [
          ['title'=>'Design','desc'=>'Design classes that learn about the latest design world','highlight'=>false],
          ['title'=>'Development','desc'=>'Development classes that learn about the latest development world','highlight'=>true],
          ['title'=>'Marketing','desc'=>'Marketing classes that learn about the latest marketing world','highlight'=>false],
        ];
        // … likewise $courses, $testimonials, etc.

        // 2) render your templates
        include __DIR__ . '/../../templates/header.php';
        include __DIR__ . '/../../templates/stats.php';
        include __DIR__ . '/../../templates/services.php';
        include __DIR__ . '/../../templates/courses.php';
        include __DIR__ . '/../../templates/testimonial.php';
        include __DIR__ . '/../../templates/footer.php';
    }
}
