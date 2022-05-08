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
            $path = public_path('file_templates/'.$template_name);
            // $templateProcessor = new TemplateProcessor($path);
            

            if($user) {
                // if(file_exists($path)) {
                    // $docContent = Storage::get($path);
                    // $content = File::get($path);
                    // $phpWord = \PhpOffice\PhpWord\IOFactory::load($path);
                    $templateProcessor = new TemplateProcessor('file_templates/So-Yeu-Ly-Lich-Sinh-Vien-2022.docx');
                    // dd($templateProcessor);
                    // dd($phpWord);
                    // $templateProcessor->setValue('replace', $str);
                    $templateProcessor->saveAs($template_name);
                    return response()->download($template_name)->deleteFileAfterSend(true);
                // }
                // $template = public_path('file_templates/'.$template_name);
                // dd($file);
                // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($template_name, 'Word2007');

                // $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($template);
                // dd($spreadsheet);
                

                // dd($templateProcessor);
                
            }

            return response()->json(['status' => 404, 'message' => 'Không tìm thấy dữ liệu!']);
        }
        else {
            
            return response()->json(['status' => 403, 'message' => 'Bạn không có quyền!']);
        }
    }
}
