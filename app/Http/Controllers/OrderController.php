<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\Order as OrderResource;
use App\Order;
use App\Utilities\StatusCode;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{
    protected $statusCode;

    public function __construct(StatusCode $statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $orders = Order::where('user_id', $user->id)->paginate();
        return (new OrderCollection($orders));
    }

    protected function storeValidator(array $data)
    {
        return Validator::make($data, [
            'reference' => 'required|string|max:50',
            'type' => 'required|in:PLA,PAL,PLL',
            'origin_name' => 'required|string|max:50',
            'origin_address' => 'required|string|max:50',
            'destination' => 'required|string|max:50',
            'contact' => 'required|string|max:50',
        ]);
    }

    protected function create(array $data)
    {
        return Order::create([
            'reference' => $data['reference'],
            'type' => $data['type'],
            'origin_name' => $data['origin_name'],
            'origin_address' => $data['origin_address'],
            'destination' => $data['destination'],
            'contact' => $data['contact'],
            'user_id' => $data['user_id']
        ]);
    }

    public function store(Request $request)
    {

        if (!$request->isJson()) {
            return response()->json([
                'errors' => [
                    'body' => 'Data body not acceptable'
                ],
                'response' => [
                    'status' => (string) $this->statusCode->badRequest(),
                    'message' => 'Bad Request',
                ],
            ])->setStatusCode($this->statusCode->badRequest());
        }

        $user = $request->user();
        $data = $request->all();
        $data['user_id'] = $user->id;

        $validator = $this->storeValidator($data);

        if (count($validator->errors()) > 0) {
            return response()->json([
                'errors' => $validator->errors(),
                'response' => [
                    'status' => (string) $this->statusCode->badRequest(),
                    'message' => 'Bad Request',
                ],
            ])->setStatusCode($this->statusCode->badRequest());
        }

        $order = $this->create($data);

        if ($order) {
            return (new OrderResource($order))
                ->additional([
                    'response' => [
                        'code' => (string) $this->statusCode->created(),
                        'message' => 'Created',
                    ]
                ]);
        }

        return response()->json([
            'response' => [
                'status' => (string) $this->statusCode->inServerError(),
                'message' => 'Something went wrong',
            ],
        ])->setStatusCode(
            $this->statusCode->inServerError(),
            'Something went wrong'
        );
    }
}
