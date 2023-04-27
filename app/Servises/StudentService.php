<?php

namespace App\Servises;

use App\Constants\ValidationConstant;
use App\Exceptions\NotFoundException;

use App\Models\Student;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StudentService
{

    public function findAll(){
        return Student::all();
    }

    /**
     * @throws ValidationException
     */
    public function createProduct($prod){
        $this
            ->projectValidator
            ->validateRequest($prod,ValidationConstant::getProductValidationForSave());
        return Student::create($prod);
    }

    public function findProductById($id){
        $student = Student::find($id);
        if(!$student){
            throw new NotFoundException("product");
        }
        return $student;
    }

    /**
     * @throws ValidationException
     */
    public function updateProduct($input, $prod)
    {
        $validator = Validator::make($input, ValidationConstant::getProductValidationForUpdate());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $prod->firstname = $input['name'];
        $prod->lastname = $input['barcode'];
        $prod->save();
    }

    public function deleteProduct($id) : bool
    {
        return Student::findOr($id,function (){
            throw new NotFoundException("Product already deleted and");
        })->delete();
    }

}
