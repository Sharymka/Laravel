<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private array $categories =
        [
            'weather' => [
                'Что ожидает нас в ближайший год',
                'Глобальное потепление',
                'Самое большое количество отсадков за последние 50 лет',
                'Снежные вершины'
            ],
            'in the animal world' => [
                'В зоопарке родился носорог',
                '5 маленьких котят ищут новые семьи',
                'Медвеженок Барни существует',
                'Нашествие саранчи привело людей в замешательство'
            ],
            'dialogues about fishing' => [
                'Ловись рыбка большая и мельнкая',
                'Где лучше клюет',
                'Рыбацкие истороии',
                'Русалки существуют'
            ],
            'space' => [
                'Полетели, полетели на луну не сели',
                'Жили-были в предалеком царстве',
                'Млечный путь',
                ' Скоро звездопар'
            ],
            'New Year' => [
                'Скоро новый год',
                'Рождество, где провести?',
                'Дедушка мороз заболел',
                'Огромный питомкик живых елочек'
            ]
        ];

    function categories() {
        return array_keys($this->categories);
    }

    function category($categoryName) {
        foreach ($this->categories as $name => $news) {
            if($name == $categoryName) {
                return $news;
            }
        }
    }
    function categories2() {
        return [

        ];
    }
}
