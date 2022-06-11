<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use File;



class FileController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function export(Request $request) {
        $id     = $request->id;
        $type   = $request->type;
        if(Auth::id() == $id || getRole() == 2 || getRole() == 1) {
            $user = $this->user->find($id);
            $template_name = 'So-Yeu-Ly-Lich-Sinh-Vien-2022.docx';

            if($user) {
                $info = $user->info;

                $name = $user->name;
                $date_join_tncshcm = dateFormat($info->date_join_tncshcm);
                $birth_date = dateFormat($info->birth_date);
                $date_join_csvn = dateFormat($info->date_join_csvn);
                $sex = $info->sex == NAM ? 'Nam' : 'Nữ';
                $place_birth = $info->placeBirth->_name;
                $address =  $info->getWard->_prefix.' '.$info->getWard->_name.', '.$info->getDistrict->_prefix.' '.$info->getDistrict->_name. ', '  .$info->getProvince->_name;
                $identity_card_number = $info->identity_card_number;
                $student_code = $info->student_code;
                $phone = $info->phone;
                $ethnic = $info->getEthnic->name;

                $name_1 = 'Chưa cập nhật';
                $ethnic_1 = 'Chưa cập nhật';
                $religion_1 = 'Chưa cập nhật';
                $permanent_address_1 = 'Chưa cập nhật';
                $phone_1 = 'Chưa cập nhật';
                $job_1 = 'Chưa cập nhật';

                $name_2 = 'Chưa cập nhật';
                $ethnic_2 = 'Chưa cập nhật';
                $religion_2 = 'Chưa cập nhật';
                $permanent_address_2 = 'Chưa cập nhật';
                $phone_2 = 'Chưa cập nhật';
                $job_2 = 'Chưa cập nhật';

                $name_3 = 'Chưa cập nhật';
                $ethnic_3 = 'Chưa cập nhật';
                $religion_3 = 'Chưa cập nhật';
                $permanent_address_3 = 'Chưa cập nhật';
                $phone_3 = 'Chưa cập nhật';
                $job_3 = 'Chưa cập nhật';

                $relatives = $user->relative;
                if(count($relatives) > 0) {

                   foreach ($relatives as $relative) {
                       if($relative->type_relative == 1) {
                           $name_1 = $relative->name;
                           $ethnic_1 = $relative->getEthnic ? $relative->getEthnic->name : '';
                           $religion_1 = $relative->religion;
                           $permanent_address_1 = $relative->permanent_address;
                           $phone_1 = $relative->phone;
                           $job_1 = $relative->job;
                       }
                       if($relative->type_relative == 2) {
                           $name_2 = $relative->name;
                           $ethnic_2 = $relative->getEthnic ? $relative->getEthnic->name : '';
                           $religion_2 = $relative->religion;
                           $permanent_address_2 = $relative->permanent_address;
                           $phone_2 = $relative->phone;
                           $job_2 = $relative->job;
                       }
                       if($relative->type_relative == 3) {
                           $name_3 = $relative->name;
                           $ethnic_3 = $relative->getEthnic ? $relative->getEthnic->name : '';
                           $religion_3 = $relative->religion;
                           $permanent_address_3 = $relative->permanent_address;
                           $phone_3 = $relative->phone;
                           $job_3 = $relative->job;
                       }
                   }
                }



                $templateProcessor = new TemplateProcessor('file_templates/'.$template_name);
                $templateProcessor->setValue('name', $name);
                $templateProcessor->setValue('birth_date', $birth_date);
                $templateProcessor->setValue('date_join_tncshcm', $date_join_tncshcm);;
                $templateProcessor->setValue('date_join_csvn', $date_join_csvn);
                $templateProcessor->setValue('sex', $sex);
                $templateProcessor->setValue('place_birth', $place_birth);
                $templateProcessor->setValue('address', $address);
                $templateProcessor->setValue('identity_card_number', $identity_card_number);
                $templateProcessor->setValue('student_code', $student_code);
                $templateProcessor->setValue('phone', $phone);
                $templateProcessor->setValue('ethnic', $ethnic);


                $templateProcessor->setValue('name_1', $name_1);
                $templateProcessor->setValue('ethnic_1', $ethnic_1);
                $templateProcessor->setValue('religion_1', $religion_1);
                $templateProcessor->setValue('permanent_address_1', $permanent_address_1);
                $templateProcessor->setValue('phone_1', $phone_1);
                $templateProcessor->setValue('job_1', $job_1);

                $templateProcessor->setValue('name_2', $name_2);
                $templateProcessor->setValue('ethnic_2', $ethnic_2);
                $templateProcessor->setValue('religion_2', $religion_2);
                $templateProcessor->setValue('permanent_address_2', $permanent_address_2);
                $templateProcessor->setValue('phone_2', $phone_2);
                $templateProcessor->setValue('job_2', $job_2);

                $templateProcessor->setValue('name_3', $name_3);
                $templateProcessor->setValue('ethnic_3', $ethnic_3);
                $templateProcessor->setValue('religion_3', $religion_3);
                $templateProcessor->setValue('permanent_address_3', $permanent_address_3);
                $templateProcessor->setValue('phone_3', $phone_3);
                $templateProcessor->setValue('job_3', $job_3);

                $templateProcessor->saveAs($template_name);

                return response()->download($template_name)->deleteFileAfterSend(true);
            }

            return response()->json(['status' => 404, 'message' => 'Không tìm thấy dữ liệu!']);
        }
        else {

            return response()->json(['status' => 403, 'message' => 'Bạn không có quyền!']);
        }
    }
}
