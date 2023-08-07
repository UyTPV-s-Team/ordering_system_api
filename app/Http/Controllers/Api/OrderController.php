<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    private $ordersFilePath = 'storage/app/public/orders_data/orders.json';

    private function getOrdersFromFile()
    {
        if (File::exists($this->ordersFilePath)) {
            $content = File::get($this->ordersFilePath);
            return json_decode($content, true);
        } else {
            // Nếu file không tồn tại, trả về mảng rỗng
            return [];
        }
    }

    private function saveOrdersToFile($orders)
    {
        $content = json_encode($orders, JSON_PRETTY_PRINT);
        File::put($this->ordersFilePath, $content);
    }

    public function index()
    {
        // Đọc dữ liệu từ file
        $orders = $this->getOrdersFromFile();

        // Trả về danh sách order đã được cập nhật
        return response()->json(["orders" => $orders]);
    }

    public function updateStatusPreparation(Request $request, $orderId)
    {
        // Đọc dữ liệu từ file
        $orders = $this->getOrdersFromFile();

        // Tìm order dựa vào id
        $order = collect($orders)->firstWhere('id', $orderId);

        // Nếu không tìm thấy order với id tương ứng
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Cập nhật trạng thái của order
        $order['status'][0]['preparation'] = $order['status'][0]['preparation'] == 'true' ? 'false' : 'true';
        
        // Cập nhật lại danh sách order
        foreach ($orders as &$item) {
            if ($item['id'] === $order['id']) {
                $item = $order;
                break;
            }
        }
        // Ghi lại dữ liệu vào file
        $this->saveOrdersToFile($orders);

        // Trả về thông báo thành công
        return response()->json(['message' => 'Status PREPARATION updated successfully']);
    }

    public function updateStatusReady(Request $request, $orderId)
    {
        // Đọc dữ liệu từ file
        $orders = $this->getOrdersFromFile();

        // Tìm order dựa vào id
        $order = collect($orders)->firstWhere('id', $orderId);

        // Nếu không tìm thấy order với id tương ứng
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }


        // Cập nhật trạng thái của order
        $order['status'][0]['ready'] = $order['status'][0]['ready'] == 'true' ? 'false' : 'true';

        // Cập nhật lại danh sách order
        foreach ($orders as &$item) {
            if ($item['id'] === $order['id']) {
                $item = $order;
                break;
            }
        }
        // Ghi lại dữ liệu vào file
        $this->saveOrdersToFile($orders);

        // Trả về thông báo thành công
        return response()->json(['message' => 'Status READY updated successfully']);
    }

    public function updateStatusDelivered(Request $request, $orderId)
    {
        // Đọc dữ liệu từ file
        $orders = $this->getOrdersFromFile();

        // Tìm order dựa vào id
        $order = collect($orders)->firstWhere('id', $orderId);

        // Nếu không tìm thấy order với id tương ứng
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }


        // Cập nhật trạng thái của order
        $order['status'][0]['delivered'] = $order['status'][0]['delivered'] == 'true' ? 'false' : 'true';

        // Cập nhật lại danh sách order
        foreach ($orders as &$item) {
            if ($item['id'] === $order['id']) {
                $item = $order;
                break;
            }
        }
        // Ghi lại dữ liệu vào file
        $this->saveOrdersToFile($orders);

        // Trả về thông báo thành công
        return response()->json(['message' => 'Status DELIVERED updated successfully']);
    }
}
