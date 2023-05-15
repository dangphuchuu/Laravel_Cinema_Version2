<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

DB::table('directors')->insert([
    'name' => 'James Cameron',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/James_Cameron_by_Gage_Skidmore.jpg/250px-James_Cameron_by_Gage_Skidmore.jpg',
    'birthday' => Carbon::create(1954, 8, 16),
    'national' => 'Mỹ',
    'content' => 'James Francis Cameron CC (sinh ngày 16 tháng 8 năm 1954) là một nhà làm phim kiêm nhà hoạt động môi trường người Canada hiện đang sống tại New Zealand. Ông nổi tiếng với việc thực hiện các phim điện ảnh khoa học viễn tưởng và sử thi. Cameron bắt đầu nhận được sự chú ý từ công chúng với vai trò đạo diễn của Kẻ hủy diệt (1984) và tiếp tục gặt hái thành công với Aliens (1986), The Abyss (1989), Kẻ hủy diệt 2: Ngày phán xét (1991) cùng phim hài giật gân True Lies (1994). Các bộ phim kinh phí lớn khác của ông bao gồm Titanic (1997) và Avatar (2009), trong đó Titanic đã mang về cho ông giải Oscar ở hạng mục Phim hay nhất, Đạo diễn xuất sắc nhất và Dựng phim xuất sắc nhất; còn Avatar thì được ghi hình bằng công nghệ 3D, cũng mang về cho ông đề cử ở các hạng mục tương tự.
    Cameron là nhà đồng sáng lập các công ty sản xuất Lightstorm Entertainment, Digital Domain và Earthship Productions. Ngoài sự nghiệp làm phim, ông còn là nhà thám hiểm đại dương của National Geographic và đã tham gia sản xuất nhiều phim tài liệu về chủ đề này, bao gồm Ghosts of the Abyss (2003) và Aliens of the Deep (2005). Cameron cũng có đóng góp vào việc phát triển công nghệ quay phim dưới nước và các phương tiện quay phim từ xa, đồng thời giúp tạo ra hệ thống máy quay 3D kỹ thuật số Fusion Camera System. Năm 2012, Cameron trở thành người đầu tiên tự mình lặn xuống đáy Rãnh Mariana bằng tàu lặn Deepsea Challenger.   
    Các phim điện ảnh của Cameron thu về tổng cộng 2 tỷ USD ở thị trường Bắc Mỹ và 6 tỷ USD toàn cầu, trong đó Avatar và Titanic là hai phim điện ảnh có doanh thu cao nhất và cao thứ ba mọi thời đại, lần lượt đem về 2,85 tỷ USD và 2,19 tỷ USD. Cameron nắm giữ thành tích là đạo diễn của hai trong số năm bộ phim đầu tiên đạt doanh thu toàn cầu hơn 2 tỷ USD. Năm 2010, tạp chí Time vinh danh Cameron là một trong 100 người có ảnh hưởng nhất thế giới. Cameron cũng là một nhà hoạt động vì môi trường cũng như tham gia điều hành một số doanh nghiệp bền vững.',
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
