<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('art', 40)->nullable();
            $table->unsignedSmallInteger('sort')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        $now = now();
        $seed = [
            ['Máy hút chân không', 'Hút chân không giúp bảo quản thực phẩm lâu hơn, hạn chế vi khuẩn và giữ nguyên chất lượng sản phẩm.', 'vacuum'],
            ['Bàn inox', 'Mặt bàn phẳng, dễ lau rửa, phù hợp sơ chế và thao tác chế biến thực phẩm mỗi ngày.', 'table'],
            ['Kệ inox', 'Sắp xếp nguyên liệu gọn gàng, thông thoáng, thuận tiện vệ sinh và kiểm soát kho.', 'shelf'],
            ['Cân điện tử', 'Định lượng chính xác từng mẻ, hỗ trợ kiểm soát khẩu phần và chất lượng thành phẩm.', 'scale'],
            ['Máy thái thịt', 'Thái lát đều, nhanh và sạch, đáp ứng năng suất sơ chế thịt tươi.', 'slicer'],
            ['Máy xay thịt', 'Xay nhuyễn đồng đều, phục vụ chế biến các sản phẩm từ thịt an toàn.', 'grinder'],
            ['Xe kéo hàng', 'Vận chuyển nguyên liệu và thành phẩm nhanh, gọn trong khu vực sản xuất.', 'trolley'],
            ['Thùng nhựa thực phẩm', 'Đựng và bảo quản nguyên liệu đúng chuẩn, dễ vệ sinh sau mỗi ca.', 'bin'],
            ['Máy xay giò', 'Xay thịt và gia vị mịn, đều cho quy trình sản xuất giò chả.', 'gio'],
            ['Nồi hấp giò', 'Hấp chín đều, giữ hương vị và đảm bảo vệ sinh trong suốt quá trình chế biến.', 'steamer'],
            ['Bếp điện rán chả', 'Rán chín đều, dễ kiểm soát nhiệt độ và vệ sinh bề mặt sau khi sử dụng.', 'griddle'],
        ];

        $rows = [];
        foreach ($seed as $index => $item) {
            $rows[] = [
                'title' => $item[0],
                'description' => $item[1],
                'image' => null,
                'art' => $item[2],
                'sort' => $index + 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('equipments')->insert($rows);
    }

    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
