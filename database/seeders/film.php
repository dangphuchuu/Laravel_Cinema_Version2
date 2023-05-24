<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

    DB::table('movies')->insert([
        'name' => 'FAST & FURIOUS 10',
        'image'=>'https://cdn.galaxycine.vn/media/2023/5/9/300x450_1683602208564.jpg',
        'showTime' => '141 Phút',
        'releaseDate' => '2023-05-19',
        'endDate' => '2023-06-19',
        'national'=>'Mỹ',
        'director_id' => 1,
        'cast_id' => 11,
    "description" => 'Trong Fast Five (2011), Dom và nhóm của anh đã tiêu diệt trùm ma túy người Brazil Hernan Reyes ở Rio De Janeiro. Điều họ không biết là con trai của Reyes, Dante đã chứng kiến tất cả và dành 12 năm qua để lên một kế hoạch “hoàn hảo” sẽ khiến gia đình Dom phải trả giá đắt. Trải qua nhiều nhiệm vụ khó khăn tưởng chừng như bất khả thi nhưng Dom Toretto và gia đình của anh ấy đều đã vượt qua. Họ đánh bại mọi kẻ thù trên hành trình hơn 20 năm qua. Nhưng giờ đây, Dante được đánh giá là kẻ nguy hiểm nhất mà họ sẽ đối mặt: một mối đe dọa đáng sợ xuất hiện từ bóng tối của quá khứ, một kẻ thù đẫm máu, với quyết tâm phá tan gia đình và phá hủy mọi thứ mà Dom yêu thương mãi mãi. Phim mới Fast & Furious 10 ra mắt tại các rạp chiếu phim từ 19.05.2023.',
    'rating_id' => 3,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],[

    ]);
DB::table('movie_genres_movies')->insert([
    'movie_id' => 1,
    'movie_genres_id' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],[

]);
