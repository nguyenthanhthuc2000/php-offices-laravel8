<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Info;
use App\Models\Relative;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;
use Exception;

class UserController extends Controller
{
    protected $user;
    protected $info;
    protected $relative;

    protected function customAttributes(){
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirm' => 'Mật khẩu xác nhận',
            'role' => 'Vai trò',
            'identity_card' => 'CMND',
            'student_code' => 'MSSV',
            'ethnic' => 'Dân tộc',
            'gender' => 'Giới tính',
            'place_birth' => 'Nơi sinh',
            'province' => 'Tỉnh / Thành phố',
            'district' => 'Quận huyện',
            'ward' => 'Phường / Xã / Thị trấn',
            'class' => 'Lớp học',
            'school_years' => 'Niên khóa',
            'type_education' => 'Loại đào tạo',
            'education_level' => 'Bậc đào tạo',
            'branch' => 'Khoa'
        ];
    }

    protected function customMessage(){
        return [
            '*.required' => ':attribute không được bỏ trống.',
            'email.email' => ':attribute không đúng định dạng',
            'password_confirm.same' => ':attribute không trùng khớp với Mật khẩu'
        ];
    }

    public function __construct(User $user, Info $info, Relative $relative){
        $this->user = $user;
        $this->info = $info;
        $this->relative = $relative;
    }

    public function index(){
        return 'list user';
    }

    public function store(Request $request){

        $this->validate($request,
            [
                'email' => 'bail|email|required',
                'password_confirm' => 'bail|same:password',
                'code_student' => 'required|digits:10',
                'phone' => 'digits:10',
                'identity_card' => 'required|max:14',
                'password' => 'required',
                'role' => 'required',
                'ethnic' => 'required',
                'gender' => 'required',
                'place_birth' => 'required',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
                'class' => 'required',
                'school_years' => 'required',
                'type_education' => 'required',
                'education_level' => 'required',
                'branch' => 'required',
            ],
            $this->customMessage(),
            $this->customAttributes()
        );

        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ];


        $data_info = [
            'identity_card_number' => $request->identity_card,
            'student_code' => $request->student_code,
            'ethnic' => $request->ethnic,
            'sex' => $request->gender,
            'birth_date' => $request->birth,
            'date_join_tncshcm' => $request->date_join_tncshcm,
            'date_join_csvn' => $request->date_join_csvn,
            'place_birth' => $request->place_birth,
            'province' => $request->province,
            'district' => $request->district,
            'phone' => $request->phone,
            'ward' => $request->ward,
            'class_id' => $request->class,
            'school_year' => $request->school_years,
            'education_level' => $request->education_level,
            'type_education' => $request->type_education,
            'branch' => $request->branch,
            'status' => 1,
            'student_code' => substr(md5(microtime()),rand(0,5), 7).substr(md5(microtime()),rand(0,5), 7),
        ];

        $user = $this->user->where('email', $data_user['email'])->first('email');

        if($user) {
            return back()->withErrors(['email' => 'Email đã tồn tại.'])->withInput($request->input());
        }
        DB::beginTransaction();
            try {
                $id = $this->user->create($data_user)->id;

                $new_data = [
                    'user_id'=> $id,
                ];

                $data_info = array_merge($data_info, $new_data);
                $this->info->create($data_info);
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                // return back()->withErrors(['errorUpdate' => 'Thêm sửa thất bại.'])->withInput($request->input());
                throw new Exception($e->getMessage());
            }
            return back()->with(['updateSuccess' => 'Thêm thành công.']);
    }



    public function update(Request $request, $id){
        $this->validate($request,
            [
                'email' => 'bail|email|required',
                'code_student' => 'required|digits:10',
                'phone' => 'digits:10',
                'identity_card' => 'required|max:14',
                'ethnic' => 'required',
                'gender' => 'required',
                'place_birth' => 'required',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
                'class' => 'required',
                'school_years' => 'required',
                'type_education' => 'required',
                'education_level' => 'required',
                'branch' => 'required',
                "date_join_tncshcm"  => 'date',
                "date_join_csvn"     => 'date',
                "birth_date"         => 'date',
            ],
            $this->customMessage(),
            $this->customAttributes()
        );

        $data_user = [
            "name"  => $request->name,
            "email" => $request->email
        ];

        $data_info = [
            'user_id'=> $id,
            'status' => 1,
            'birth_date'             => $request->birth,
            'identity_card_number'   => $request->identity_card,
            'ethnic'                 => $request->ethnic,
            'date_join_tncshcm'      => $request->date_join_tncshcm,
            'phone'                  => $request->phone,
            'sex'                    => $request->gender,
            'date_join_csvn'         => $request->date_join_csvn,
            'place_birth'            => $request->place_birth,
            'province'               => $request->province,
            'district'               => $request->district,
            'ward'                   => $request->ward
        ];

         if(getRole() == 1){
             $new_data_info = [
                "class_id"               => $request->class,
                "education_level"        => $request->education_level,
                "type_education"         => $request->type_education,
                "student_code"           => $request->code_student,
                "school_year"            => $request->school_years,
                "branch"                 => $request->branch
             ];
             $data_info =  array_merge($data_info, $new_data_info);
         }

        $user = $this->user->find($id);

        if (!$user){
            return back()->withErrors(['errorUpdate' => 'Chỉnh sửa thất bại.!'])->withInput($request->input());
        }
        DB::beginTransaction();
            try {
                if(($data_user['name'] != '' || $data_user['name'] != null) && $data_user['email'] != '' || $data_user['email'] != null){
                    $user->update($data_user);
                }
                // nếu ng dùng chưa có thông tin trong bảng info thì thêm vào
                Info::updateOrCreate(
                    ['user_id' => $id],
                    $data_info,
                );
                //  cập nhật thông tin người thân
                $relatives_father = [];
                $relatives_mom = [];
                $relatives_other = [];
                $data_relatives = [];

                foreach ($request->all() as $key => $req){
                    if(preg_match("/_father/i", $key )){
                        $relatives_father[$key] = $req;
                    }
                    elseif(preg_match("/_mom/i", $key )){
                        $relatives_mom[$key] = $req;
                    }
                    else{
                        $relatives_other[$key] = $req;
                    }
                }

                foreach ($relatives_father as $father){
                    if(!empty($father) && $father != null){
                        $relatives_father['type_relative'] = 1;
                    }
                }

                foreach ($relatives_mom as $mom){
                    if(!empty($mom) && $mom != null){
                        $relatives_mom['type_relative'] = 2;
                    }
                }

                foreach ($relatives_other as $other){
                    if(!empty($other) && $other != null){
                        $relatives_other['type_relative'] = 3;
                    }
                }

                $relative = $user->relative;

                if($relatives_father['type_relative']){
                    $data_relatives['father'] = [
                        'type_relative' => 1,
                        "name"      => $relatives_father['name_father'],
                        "year_birth"     => $relatives_father['birth_father'],
                        "job"       => $relatives_father['job_father'],
                        "phone"     => $relatives_father['phone_father'],
                        "ethnic"    => $relatives_father['ethnic_father'],
                        "permanent_address"   => $relatives_father['address_father']
                    ];
                }
                if($relatives_mom['type_relative']){
                    $data_relatives['mom'] = [
                        'type_relative' => 2,
                        "name"      => $relatives_mom['name_mom'],
                        "year_birth"     => $relatives_mom['birth_mom'],
                        "job"       => $relatives_mom['job_mom'],
                        "phone"     => $relatives_mom['phone_mom'],
                        "ethnic"    => $relatives_mom['ethnic_mom'],
                        "permanent_address"   => $relatives_mom['address_mom']
                    ];
                }
                if($relatives_other['type_relative']){
                    $data_relatives['other'] = [
                        'type_relative' => 3,
                        "name"      => $relatives_other['name_other'],
                        "year_birth"     => $relatives_other['birth_other'],
                        "job"       => $relatives_other['job_other'],
                        "phone"     => $relatives_other['phone_other'],
                        "ethnic"    => $relatives_other['ethnic_other'],
                        "permanent_address"   => $relatives_other['address_other']
                    ];
                }
                foreach($data_relatives as $i => $data_relative){
                    $userRelative = $user->relative->where('type_relative', $data_relative['type_relative'])->first();
                    if(!$userRelative){
                        $data_relative['user_id'] = $id;
                        $this->relative->insert(
                            $data_relative
                        );
                    }
                    else{
                        $userRelative->update(
                            $data_relative
                        );
                    }
                }
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();

                //return back()->withErrors(['errorUpdate' => 'Chỉnh sửa thất bại.'])->withInput($request->input());
                throw new Exception($e->getMessage());
            }
            return back()->with(['updateSuccess' => 'Chỉnh sửa thành công.']);

    }

    public function delete($id){
        $user = $this->user->find($id);

        if (!$user){
            return back()->withErrors(['errorUpdate' => 'Xóa thất bại.']);
        }

        if($user->delete()){
            return back()->with(['updateSuccess' => 'Chỉnh sửa thành công.']);
        }

    }

    public function changeStatus($id){}
}
