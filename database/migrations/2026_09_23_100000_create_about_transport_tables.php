<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAboutTransportTables extends Migration
{
    public function up()
    {
        Schema::create('about_transport_settings', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->default('Phương tiện vận chuyển');
            $table->string('subtitle')->nullable();
            $table->text('intro_content')->nullable();
            $table->string('main_image')->nullable();
            $table->text('gallery_images')->nullable();
            $table->string('quote_text')->nullable();
            $table->string('quote_icon')->nullable();
            $table->string('footer_text')->nullable();
            $table->timestamps();
        });

        Schema::create('about_transport_items', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->default('feature');
            $table->string('title')->default('');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedSmallInteger('sort')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        $now = now();
        DB::table('about_transport_settings')->insert([
            'section_title' => 'Phương tiện vận chuyển',
            'subtitle' => 'Vận chuyển an toàn – Giữ trọn chất lượng',
            'intro_content' => "Kỳ Linh Food sở hữu hệ thống phương tiện vận chuyển chuyên dụng, đáp ứng yêu cầu bảo quản và giao nhận thực phẩm theo tiêu chuẩn vệ sinh an toàn thực phẩm.\n\nToàn bộ phương tiện được kiểm soát nhiệt độ, vệ sinh định kỳ và vận hành theo quy trình nghiêm ngặt nhằm đảm bảo chất lượng sản phẩm đến tay khách hàng.",
            'main_image' => null,
            'gallery_images' => json_encode(['', '', '']),
            'quote_text' => 'Vận chuyển chuyên nghiệp – Đảm bảo chất lượng – Trao trọn niềm tin',
            'quote_icon' => null,
            'footer_text' => 'KỲ LINH FOOD | HỒ SƠ NĂNG LỰC',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $features = [
            ['Đa dạng phương tiện', 'Xe tải, xe đông lạnh phù hợp từng loại thực phẩm và quãng đường giao hàng.'],
            ['Kiểm soát nhiệt độ', 'Duy trì nhiệt độ ổn định suốt quá trình vận chuyển, bảo toàn chất lượng sản phẩm.'],
            ['Vệ sinh định kỳ', 'Phương tiện được vệ sinh, khử khuẩn theo lịch, đảm bảo điều kiện an toàn thực phẩm.'],
            ['Giao hàng đúng hẹn', 'Lịch trình rõ ràng, phối hợp chặt chẽ để giao hàng đúng thời gian cam kết.'],
            ['Phạm vi phục vụ', 'Phủ sóng nhiều khu vực, đáp ứng nhu cầu cung ứng ổn định cho đối tác.'],
        ];

        $badges = [
            ['Hiện đại', 'tiên tiến'],
            ['Đảm bảo', 'ATTP'],
            ['Dễ dàng', 'vệ sinh'],
            ['Vận hành', 'ổn định'],
        ];

        $rows = [];
        foreach ($features as $i => $f) {
            $rows[] = [
                'type' => 'feature',
                'title' => $f[0],
                'description' => $f[1],
                'image' => null,
                'sort' => $i + 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        foreach ($badges as $i => $b) {
            $rows[] = [
                'type' => 'badge',
                'title' => $b[0],
                'description' => $b[1],
                'image' => null,
                'sort' => $i + 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('about_transport_items')->insert($rows);
    }

    public function down()
    {
        Schema::dropIfExists('about_transport_items');
        Schema::dropIfExists('about_transport_settings');
    }
}
