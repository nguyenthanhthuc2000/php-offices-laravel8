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
