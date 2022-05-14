<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Info;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;
use Exception;

class UserController extends Controller
{
    protected $user;
    protected $info;

    public function __construct(User $user, Info $info){
        $this->user = $user;
        $this->info = $info;
    }

    public function index(){
        return 'list user';
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'email' => 'bail|email',
                '*' => 'required',
                'password_confirm' => 'bail|same:password'
            ],
            [
                '*.required' => ':attribute không được bỏ trống.',
                'email.email' => ':attribute không đúng định dạng',
                'password_confirm.same' => ':attribute không trùng khớp với Mật khẩu'
            ],
            [
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
                'branch' => 'Khoa',
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'identity_card' => $request->identity_card,
            'student_code' => $request->student_code,
            'ethnic' => $request->ethnic,
            'gender' => $request->gender,
            'place_birth' => $request->place_birth,
            'province' => $request->province,
            'district' => $request->district,
            'ward' => $request->ward,
            'class' => $request->class,
            'school_years' => $request->school_years,
            'education_level' => $request->education_level,
            'type_education' => $request->type_education,
            'branch' => $request->branch
        ];

        $user = $this->user->where('email', $data['email'])->first('email');

        if($user) {
            return back()->withErrors(['email' => 'Email đã tồn tại.']);
        }
        DB::beginTransaction();
            try {
                $id = $this->user->create($data)->id;
                $new_data = [
                    'user_id'=> $id,
                ];

                $data = array_merge($data, $new_data);
                $this->info->create($data);
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }
            return redirect()->route('listStudent');
    }

    public function edit($id){
        return $id;
    }

    public function update(Request $request, $id){
        $this->validate($request,
            [
                '*'                  => 'required',
                "date_join_tncshcm"  => 'date',
                "date_join_csvn"     => 'date',
                "birth_date"         => 'date',
            ]
        );

        $data = [
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


        $user = $this->user->find($id);

        if (!$user){
            return back()->withErrors(['errorUpdate' => 'Chỉnh sửa thất bại.'])->withInput($request->input());
        }
        DB::beginTransaction();
            try {
                $user->update($data);
                if(!$user->info){
                    $new_data = [
                        'user_id'=> $id,
                        'status' => 1
                    ];
                    $data = array_merge($data, $new_data);
                    $this->info->create($data);
                }
                else{
                    $user->info->update($data);
                }
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();

                // return back()->withErrors(['errorUpdate' => 'Chỉnh sửa thất bại.'])->withInput($request->input());
                throw new Exception($e->getMessage());
            }
            return back()->with(['updateSuccess' => 'Chỉnh sửa thành công.']);

    }

    public function delete($id){}

    public function changeStatus($id){}
}
