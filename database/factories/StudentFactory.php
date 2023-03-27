<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $allName = $this->faker->name;
        $nameValues = explode(' ',$allName);

        return [
            'name' => $nameValues[0],
            'surname' => $nameValues[1],
            'patronymic'=>$nameValues[1],
            'sex' => 'МУЖ',
            'age'=>$this->faker->numberBetween(15,26),
            'date_of_birth'=>'200'.rand(0,8).'-0'.rand(1,9).'-'.rand(10,28),
            'group_id'=>$this->faker->numberBetween(11,20)
        ];
    }
}
