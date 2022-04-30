<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Kinh',
                'other_name' => 'Việt'
            ],
            [
                'id' => '2',
                'name' => 'Tày',
                'other_name' => 'Thổ, Ngạn, Phén, Thù Lao, Pa Dí, Tày Khao'
            ],
            [
                'id' => '3',
                'name' => 'Thái',
                'other_name' => 'Tày Đăm, Tày Mười, Tày Thanh, Mán Thanh, Hàng Bông, Tày Mường, Pa Thay, Thổ Đà Bắc'
            ],
            [
                'id' => '4',
                'name' => 'Hoa',
                'other_name' => 'Hán, Triều Châu, Phúc Kiến, Quảng Đông, Hải Nam, Hạ, Xạ Phạn'
            ],
            [
                'id' => '5',
                'name' => 'Khơ-me',
                'other_name' => 'Cur, Cul, Cu, Thổ, Việt gốc Miên, Krôm'
            ],
            [
                'id' => '6',
                'name' => 'Mường',
                'other_name' => 'Mol, Mual, Mọi, Mọi Bi, Ao Tá, Ậu Tá'
            ],
            [
                'id' => '7',
                'name' => 'Nùng',
                'other_name' => 'Xuồng, Giang, Nùng An, Phàn Sinh, Nùng Cháo, Nùng Lòi, Quý Rim, Khèn Lài'
            ],
            [
                'id' => '8',
                'name' => 'HMông',
                'other_name' => 'Mèo, Hoa, Mèo Xanh, Mèo Đỏ, Mèo Đen, Ná Mẻo, Mán Trắng'
            ],
            [
                'id' => '9',
                'name' => 'Dao',
                'other_name' => 'Mán, Động, Trại, Xá, Dìu, Miên, Kiềm, Miền, Quần Trắng, Dao Đỏ, Quần Chẹt, Lô Giang, Dao Tiền, Thanh Y, Lan Tẻn, Đại Bản, Tiểu Bản, Cóc Ngáng, Cóc Mùn, Sơn Đầu'
            ],
            [
                'id' => '10',
                'name' => 'Gia-rai',
                'other_name' => 'Giơ-rai, Tơ-buăn, Chơ-rai, Hơ-bau, Hđrung, Chor'
            ],
            [
                'id' => '11',
                'name' => 'Ngái',
                'other_name' => 'Xín, Lê, Đản, Khách Gia'
            ],
            [
                'id' => '12',
                'name' => 'Ê-đê',
                'other_name' => 'Ra-đê, Đê, Kpạ, A-đham, Krung, Ktul, Đliê Ruê, Blô, Epan, Mđhur, Bih'
            ],
            [
                'id' => '13',
                'name' => 'Ba na',
                'other_name' => 'Giơ-lar. Tơ-lô, Giơ-lâng, Y-lăng, Rơ-ngao, Krem, Roh, ConKđe, A-la Công, Kpăng Công, Bơ-nâm'
            ],
            [
                'id' => '14',
                'name' => 'Xơ-Đăng',
                'other_name' => 'Xơ-teng, Hđang, Tơ-đra, Mơ-nâm, Ha-lăng, Ca-dong, Kmrâng, ConLan, Bri-la, Tang'
            ],
            [
                'id' => '15',
                'name' => 'Sán Chay',
                'other_name' => 'Cao Lan, Sán Chỉ, Mán Cao Lan, Hờn Bạn, Sơn Tử'
            ],
            [
                'id' => '16',
                'name' => 'Cơ-ho',
                'other_name' => 'Xrê, Nốp, Tu-lốp, Cơ-don, Chil, Lat, Lach, Trinh'
            ],
            [
                'id' => '17',
                'name' => 'Chăm',
                'other_name' => 'Chàm, Chiêm Thành, Hroi'
            ],
            [
                'id' => '18',
                'name' => 'Sán Dìu',
                'other_name' => 'Sán Dẻo, Trại, Trại Đất, Mán, Quần Cộc'
            ],
            [
                'id' => '19',
                'name' => 'Hrê',
                'other_name' => 'Chăm Rê, Chom, Krẹ Luỹ'
            ],
            [
                'id' => '20',
                'name' => 'Mnông',
                'other_name' => 'Pnông, Nông, Pré, Bu-đâng, ĐiPri, Biat, Gar, Rơ-lam, Chil'
            ],
            [
                'id' => '21',
                'name' => 'Ra-glai',
                'other_name' => 'Ra-clây, Rai, Noang, La-oang'
            ],
            [
                'id' => '22',
                'name' => 'Xtiêng',
                'other_name' => 'Xa-điêng'
            ],
            [
                'id' => '23',
                'name' => 'Bru-Vân Kiều',
                'other_name' => 'Bru, Vân Kiều, Măng Coong, Tri Khùa'
            ],
            [
                'id' => '24',
                'name' => 'Thổ',
                'other_name' => 'Kẹo, Mọn, Cuối, Họ, Đan Lai, Ly Hà, Tày Pọng, Con Kha, Xá Lá Vàng'
            ],
            [
                'id' => '25',
                'name' => 'Giáy',
                'other_name' => 'Nhắng, Dẩng, Pầu Thìn Nu Nà, Cùi Chu, Xa'
            ],
            [
                'id' => '26',
                'name' => 'Cơ-tu',
                'other_name' => 'Ca-tu, Cao, Hạ, Phương, Ca-tang'
            ],
            [
                'id' => '27',
                'name' => 'Gié Triêng',
                'other_name' => 'Đgiéh, Tareb, Giang Rẫy Pin, Triêng, Treng, Ta-riêng, Ve, Veh, La-ve, Ca-tang'
            ],
            [
                'id' => '28',
                'name' => 'Mạ',
                'other_name' => 'Châu Mạ, Mạ Ngăn, Mạ Xóp, Mạ Tô, Mạ Krung'
            ],
            [
                'id' => '29',
                'name' => 'Khơ-mú',
                'other_name' => 'Xá Cẩu, Mứn Xen, Pu Thênh, Tềnh, Tày Hay'
            ],
            [
                'id' => '30',
                'name' => 'Co',
                'other_name' => 'Cor, Col, Cùa, Trầu'
            ],
            [
                'id' => '31',
                'name' => 'Tà-ôi',
                'other_name' => 'Tôi-ôi, Pa-co, Pa-hi, Ba-hi'
            ],
            [
                'id' => '32',
                'name' => 'Chơ-ro',
                'other_name' => 'Dơ-ro, Châu-ro'
            ],
            [
                'id' => '33',
                'name' => 'Kháng',
                'other_name' => 'Xá Khao, Xá Súa, Xá Dón, Xá Dẩng, Xá Hốc, Xá Ái, Xá Bung, Quảng Lâm'
            ],
            [
                'id' => '34',
                'name' => 'Xinh-mun',
                'other_name' => 'Puộc, Pụa'
            ],
            [
                'id' => '35',
                'name' => 'Hà Nhì',
                'other_name' => 'U Ni, Xá U Ni'
            ],
            [
                'id' => '36',
                'name' => 'Chu ru',
                'other_name' => 'Chơ-ru, Chu'
            ],
            [
                'id' => '37',
                'name' => 'Lào',
                'other_name' => 'Là Bốc, Lào Nọi'
            ],
            [
                'id' => '38',
                'name' => 'La Chí',
                'other_name' => 'Cù Tê, La Quả'
            ],
            [
                'id' => '39',
                'name' => 'La Ha',
                'other_name' => 'Xá Khao, Khlá Phlạo'
            ],
            [
                'id' => '40',
                'name' => 'Phù Lá',
                'other_name' => 'Bồ Khô Pạ, Mu Di Pạ Xá, Phó, Phổ, Va Xơ'
            ],
            [
                'id' => '41',
                'name' => 'La Hủ',
                'other_name' => 'Lao, Pu Đang, Khù Xung, Cò Xung, Khả Quy'
            ],
            [
                'id' => '42',
                'name' => 'Lự',
                'other_name' => 'Lừ, Nhuồn, Duôn'
            ],
            [
                'id' => '43',
                'name' => 'Lô Lô',
                'other_name' => 'Mun Di'
            ],
            [
                'id' => '44',
                'name' => 'Chứt',
                'other_name' => 'Sách, Máy, Rục, Mã-liêng, A-rem, Tu vang, Pa-leng, Xơ-Lang, Tơ-hung, Chà-củi, Tắc-củi, U-mo, Xá Lá Vàng'
            ],
            [
                'id' => '45',
                'name' => 'Mảng',
                'other_name' => 'Mảng Ư, Xá Lá Vàng'
            ],
            [
                'id' => '46',
                'name' => 'Pà Thẻn',
                'other_name' => 'Pà Hưng, Tống'
            ],
            [
                'id' => '47',
                'name' => 'Co Lao'
            ],
            [
                'id' => '48',
                'name' => 'Cống',
                'other_name' => 'Xắm Khống, Mấng Nhé, Xá Xeng'
            ],
            [
                'id' => '49',
                'name' => 'Bố Y',
                'other_name' => 'Chủng Chá, Trọng Gia, Tu Di, Tu Din'
            ],
            [
                'id' => '50',
                'name' => 'Si La',
                'other_name' => 'Cù Dề Xừ, Khả pẻ'
            ],
            [
                'id' => '51',
                'name' => 'Pu Péo',
                'other_name' => 'Ka Pèo, Pen Ti Lô Lô'
            ],
            [
                'id' => '52',
                'name' => 'Brâu',
                'other_name' => 'Brao'
            ],
            [
                'id' => '53',
                'name' => 'Ơ Đu',
                'other_name' => 'Tày Hạt'
            ],
            [
                'id' => '54',
                'name' => 'Rơ măm'
            ],
        ];

        foreach ($data as $val) {
            DB::table('ethnic')->insert($val);
        }
    }
}
