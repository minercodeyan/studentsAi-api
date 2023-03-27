<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Http\Resources\StudentResources\StudentStandardResource;
use App\Models\Student;
use App\Servises\StudentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    protected StudentService $productService;

    public function __construct(StudentService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        $products = $this->productService->findAll();
        return response()->json(StudentStandardResource::collection($products),200);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $product = $this->productService->createProduct($input);
        return response()->json(new StudentStandardResource($product), 201);
    }

    /**
     * @throws NotFoundException
     */
    public function show($id): JsonResponse
    {
        $product = $this->productService->findProductById($id);
        return response()->json(new StudentStandardResource($product), 200);
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, Student $product): JsonResponse
    {
        $input = $request->all();
        $this->productService->updateProduct($input, $product);
        return $this->sendResponse(new StudentStandardResource($product), 'Product updated successfully.');
    }

    /**
     * @throws NotFoundException
     */
    public function destroy($id): JsonResponse
    {
        $deletedStudent = $this->productService->deleteProduct($id);
        return $this->sendResponse($deletedStudent, 'Product deleted successfully.');
    }

    public function addProductsGroup(Request $request): JsonResponse
    {
        $groupCode = $request->only("groupNumber");
        $products = $request->only("products");
        return $this->sendResponse($this->productService->createProductsGroup($products,$groupCode),'group with products created successfully');
    }
}
