<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use DB;
use Auth;
use PDF;
use App\StudentInfo;
use App;

class StudentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'last_education' => 'required',
            'subject' => 'required',
            'result' => 'required',
            'pre_address' => 'required',
            'pre_upz' => 'required',
            'pre_dist' => 'required',
            'pre_post' => 'required',
            'per_address' => 'required',
            'per_upz' => 'required',
            'per_dist' => 'required',
            'per_post' => 'required'
        ]);

        $info = new StudentInfo();
        $info->user_id = Auth::user()->id;
        $info->last_education = $request->last_education;
        $info->subject = $request->subject;
        $info->result = $request->result;
        $info->pre_address = $request->pre_address;
        $info->pre_upz = $request->pre_upz;
        $info->pre_dist = $request->pre_dist;
        $info->pre_post = $request->pre_post;
        $info->per_address = $request->per_address;
        $info->per_upz = $request->per_upz;
        $info->per_dist = $request->per_dist;
        $info->per_post = $request->per_post;
        $info->save();

        return redirect()->route('student.dashboard');
    }

    public function show($id)
    {
        $student = DB::table('students as s')
                        ->join('users as u','u.id','=','s.user_id')
                        ->join('student_infos as si','u.id','=','si.user_id')
                        ->where('s.id', $id)
                        ->where('is_certified',1)
                        ->select('u.name as name','s.c_name as course','s.duration as duration','s.batch_id as batch','s.updated_at as date','si.father as father','s.result as result')
                        ->first();
        if ($student->course == 1) {
           $course = 'Microsoft Office Application';
        }elseif ($student->course == 2) {
           $course = 'Graphics Design (Photoshop)';
        }elseif ($student->course == 3) {
           $course = 'Graphics Design (Illustrator)';
        }elseif ($student->course == 4) {
           $course = 'Web Design & Development';
        }

        if ($student->duration > 1) {
            $duration_type = 'Month';
        }else{
            $duration_type = 'Year';
        }

        $pdf = App::make('dompdf.wrapper');
        $html = '';
        $html .= '<!doctype html>';
        $html .= '<html lang="en">';
        $html .= '<head>';
        $html .= '<title>'.$student->name.'</title>';
        $html .= '<style>body{margin: 10px auto; padding: 10px; width: 100%;}tr{line-height: 10px;} .center{text-align: center;}p{line-height: 20px;font-size: 18px;}.footer{font-size: small;margin-top: 20px;}.admin{padding-left: 90px;} h1{font-family: Certificate; font-stye: italic;}</style>';
        $html .= '</title>';
        $html .= '<body>';
        $html .= '<div class="container" style="background-color: #ffeecf; border: 1px solid black; padding: 20px 20px 0px 20px;">';
            $html .= '<table class="table">';
                $html .= '<tr class="center"><td colspan="2"><h1>Course Completion Certificate</h1></td></tr>';
                $html .= '<tr class="center"><td colspan="2">This is to certify </td></tr>';
                $html .= '<tr class="center"><td colspan="2"><h2>'.$student->name.'</h2> </td></tr>';
                $html .= '<tr><td colspan="2" style="min-height: 300px;">';
                $html .= '<p style="min-height: 300px; text-align: justify;">Father\'s name:'.$student->father.' Has successfully completed the course <b>'.$course.'</b>. Course Duration <b>'.$student->duration. ' ' .$duration_type.'</b>. Batch ID: <b>B-'.$student->batch.'</b>.  His/Her Result is <b>'.$student->result.'</b>. Certification Date: <b>'.date("d M Y", strtotime($student->date)).'.</b></p>';
                $html .= '</td>';
                $html .= '</tr>';
                $html .= '<tr class="pad"><td class="admin"></td><td class="center">&nbsp; </td></tr>';
                $html .= '<tr class="pad"><td class="admin">&nbsp;</td><td class="center">&nbsp; </td></tr>';
                $html .= '<tr class="pad"><td class="admin"></td><td class="center">&nbsp; </td></tr>';
                $html .= '<tr class="pad"><td class="admin">&nbsp;</td><td class="center">&nbsp; </td></tr>';
                $html .= '<tr class="pad"><td class="admin"></td><td class="center">&nbsp; </td></tr>';
                $html .= '<tr class="pad"><td class="admin">&nbsp;</td><td class="center">&nbsp; </td></tr>';
                $html .= '<tr class="pad"><td class="admin"><h3>Admin</h3></td><td class="center"><h3>CEO</h3></td></tr>';
                $html .= '<tr>';
                    $html .= '<td><p class="footer">This Computer Generated Certificate. Generated By <a href="http://bornomalaitcenter.com/">Bornomala IT Center</a></p></td>';
                    $html .= '<td class="footer center">Developed By <a href="https://devmizanur.com" target="_blank">Mizanur Rahman</a></td>';
                $html .= '</tr>';
            $html .= '</table>';
        $html .= '</div>';
        $html .= '</body>';
        $html .= '</html>';
        $pdf->loadHTML($html);
        return $pdf->stream();

    }

    public function edit($id)
    {
        $student = User::find($id);
        $info = DB::table('student_infos')->where('user_id', Auth::user()->id)->first();
        return view('student.profile', compact('student','info'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'last_education' => 'required',
            'subject' => 'required',
            'result' => 'required',
            'pre_address' => 'required',
            'pre_upz' => 'required',
            'pre_dist' => 'required',
            'pre_post' => 'required',
            'per_address' => 'required',
            'per_upz' => 'required',
            'per_dist' => 'required',
            'per_post' => 'required'
        ]);

        $info = StudentInfo::find($id);
        $info->user_id = Auth::user()->id;
        $info->father = $request->father;
        $info->mother = $request->mother;
        $info->dob = $request->dob;
        $info->gender = $request->gender;
        $info->religion = $request->religion;
        $info->marital = $request->marital;
        $info->last_education = $request->last_education;
        $info->subject = $request->subject;
        $info->result = $request->result;
        $info->pre_address = $request->pre_address;
        $info->pre_upz = $request->pre_upz;
        $info->pre_dist = $request->pre_dist;
        $info->pre_post = $request->pre_post;
        $info->per_address = $request->per_address;
        $info->per_upz = $request->per_upz;
        $info->per_dist = $request->per_dist;
        $info->per_post = $request->per_post;
        $info->save();

        return redirect()->route('student.dashboard');
    }

    public function destroy($id)
    {
        //
    }
}
