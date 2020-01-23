<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\durations;
use App\courses;
use App\questions;
use App\evaluations;
use App\students;
use App\surveys;

class InstructorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:instructor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $result = surveys::select('ccode')->distinct()->get();
      
        return view('Instructor.surveys',compact('result'));
    }
    
    public function show( $ccode)
    {  
        $result=questions::join('courses','courses.ccode','=','questions.ccode')
        ->where('questions.ccode',$ccode)
        ->select('courses.cname','questions.ccode')->first();
        $student=students::all()->count();
        
        $count=durations::where('ccode',$ccode)->orderby('studentNo','asc')->get();
        $number=$count->count('studentNo');
       
/*
        $result2=questions::select('question')->where([['ccode',$ccode],['title','=','head1']])->get();
        
        $result3=surveys::join('questions','questions.id','=','surveys.ques_id')
        ->select('questions.*','surveys.*')->
        where([['surveys.ccode',$ccode],['questions.title','=','sub1'],
        ['surveys.studentNo','=',1]])->limit(4)->get();

        $result5=surveys::join('questions','questions.id','=','surveys.ques_id')
        ->select('questions.*','surveys.*')->
        where([['surveys.ccode',$ccode],['questions.title','=','sub2'],
        ['surveys.studentNo','=',1]])->limit(4)->get();

        $result7=surveys::join('questions','questions.id','=','surveys.ques_id')
        ->select('questions.*','surveys.*')->
        where([['surveys.ccode',$ccode],['questions.title','=','sub3'],
        ['surveys.studentNo','=',1]])->limit(4)->get();

       
        $result4=questions::select('question')->where([['ccode',$ccode],['title','=','head2']])->get();
        $result6=questions::select('question')->where([['ccode',$ccode],['title','=','head3']])->get();
       */
        //getting department name
        $dept=courses::join('departments','departments.dept_id','=','courses.dept_id')
        ->join('semesters','semesters.id','=','courses.semester_id')
        ->join('instructors','instructors.id','=','courses.inst_id')
        ->where('courses.ccode',$ccode)->select('courses.*','departments.dname','semesters.sname',
        'semesters.year','instructors.name')->get();

        //printing part
        $evaluation= evaluations::join('questions','questions.id','=','evaluations.questionId')
        ->where([['evaluations.ccode',$ccode],['questions.title','sub2']])->select('evaluations.*','questions.question')->get();
 
        
        $evaluation1= evaluations::join('questions','questions.id','=','evaluations.questionId')
        ->where([['evaluations.ccode',$ccode],['questions.title','sub3']])->select('evaluations.*','questions.question')->get();
        
       

        return view('Instructor.display',compact('dept','student','number','evaluation','evaluation1'));
       
        // return view('Instructor.display',compact('result','student','number',
        //'result3','result2','result4', 'result5','result6','result7','result8','count','answers','survey_answer1'));
    }
    public  function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    public function convert_customer_data_to_html()
    {
     
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="15%">City</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Country</th>
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->CustomerName.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Address.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->City.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->PostalCode.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Country.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    public function update()
    {

    }
    public function create()
    {
      
    }
    public function delete($id)
    {


    }
}
