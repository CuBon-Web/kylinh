<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAboutHrTables extends Migration
{
    public function up()
    {
        Schema::create('about_hr_settings', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->default('Nhân lực');
            $table->string('subtitle')->nullable();
            $table->text('intro_content')->nullable();
            $table->string('main_image')->nullable();
            $table->string('training_title')->default('Đào tạo & phát triển');
            $table->string('health_title')->default('Khám sức khỏe định kỳ');
            $table->string('health_image')->nullable();
            $table->text('health_text')->nullable();
            $table->string('health_badge_image')->nullable();
            $table->string('footer_text')->nullable();
            $table->timestamps();
        });

        Schema::create('about_hr_items', function (Blueprint $table) {
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
        DB::table('about_hr_settings')->insert([
            'section_title' => 'Nhân lực',
            'subtitle' => 'Đội ngũ chuyên nghiệp – Tận tâm – Trách nhiệm',
            'intro_content' => "Nhân sự Kỳ Linh Food được tổ chức chuyên nghiệp, huấn luyện bài bản trong chế biến thực phẩm và tuân thủ nghiêm ngặt quy trình VSATTP.\n\nMỗi cán bộ nhân viên đều được đào tạo, kiểm tra định kỳ và luôn đặt trách nhiệm lên hàng đầu trong từng khâu thao tác.",
            'main_image' => null,
            'training_title' => 'ĐÀO TẠO & PHÁT TRIỂN',
            'health_title' => 'KHÁM SỨC KHỎE ĐỊNH KỲ',
            'health_image' => null,
            'health_text' => 'Nhân viên tham gia sản xuất đều được khám sức khỏe định kỳ, đảm bảo điều kiện làm việc an toàn và phù hợp quy định ATTP.',
            'health_badge_image' => null,
            'footer_text' => 'KỲ LINH FOOD | HỒ SƠ NĂNG LỰC',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $features = [
            ['ĐỘI NGŨ NHÂN SỰ CHUYÊN NGHIỆP', 'Được đào tạo bài bản, am hiểu quy trình sản xuất và tiêu chuẩn vệ sinh.'],
            ['NHÂN VIÊN SƠ CHẾ, ĐÓNG GÓI', 'Thực hiện đúng quy trình, đảm bảo vệ sinh cá nhân và môi trường làm việc.'],
            ['PHÂN CÔNG CHUYÊN MÔN RÕ RÀNG', 'Mỗi bộ phận có nhiệm vụ cụ thể, phối hợp chặt chẽ trong toàn bộ quy trình.'],
            ['TẬN TÂM TRONG TỪNG SẢN PHẨM', 'Làm việc có trách nhiệm, coi chất lượng và an toàn thực phẩm là ưu tiên hàng đầu.'],
            ['KHÁM SỨC KHỎE ĐỊNH KỲ', 'Đảm bảo sức khỏe người lao động, tuân thủ quy định ATTP trong sản xuất thực phẩm.'],
        ];

        $training = [
            ['Đào tạo quy trình VSATTP', ''],
            ['Huấn luyện vệ sinh cá nhân', ''],
            ['Nâng cao ý thức trách nhiệm', ''],
            ['Phát triển kỹ năng chuyên môn', ''],
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
        foreach ($training as $i => $t) {
            $rows[] = [
                'type' => 'training',
                'title' => '',
                'description' => $t[0],
                'image' => null,
                'sort' => $i + 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('about_hr_items')->insert($rows);
    }

    public function down()
    {
        Schema::dropIfExists('about_hr_items');
        Schema::dropIfExists('about_hr_settings');
    }
}
