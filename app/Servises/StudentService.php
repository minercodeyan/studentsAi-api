<?php

namespace App\Servises;

use App\Constants\ValidationConstant;
use App\Exceptions\NotFoundException;
use App\Models\Group;
use App\Models\Student;
use App\Utils\ProjectValidator;
use Illuminate\Validation\ValidationException;

class StudentService
{
    protected ProjectValidator $projectValidator;

    public function __construct(ProjectValidator $projectValidator)
    {
        $this->projectValidator = $projectValidator;
    }

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
    public function updateProduct($input, $prod) : void{
        $this
            ->projectValidator
            ->validateRequest($input,ValidationConstant::getProductValidationForUpdate());
        $prod->firstname = $input['name'];
        $prod->lastname = $input['barcode'];
        $prod->save();;
    }

    public function deleteProduct($id) : bool
    {
        return Student::findOr($id,function (){
            throw new NotFoundException("Product already deleted and");
        })->delete();
    }

}
