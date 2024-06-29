<?php 
namespace App\Http\Controllers;
 
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Observers\EmailMaskObserver; 
// use App\Http\Requests\StoreStudentRequest;
 
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(10);       
        return view('index',compact('students'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    } 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:255',
            'date_of_birth' => 'bail|required|date',
            'city' => 'bail|required|string|max:255'
        ]);

        // Attach EmailMaskObserver to Student model
        Student::observe(EmailMaskObserver::class);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->date_of_birth = $request->date_of_birth;
        $student->city = $request->city;
        $student->save();
        return back()->with('success','Data submited successfully!');
    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    } 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Student::findOrFail($id);
        $delete->delete();
        return back()->with("error","Delete Data Successfully!!");
    } 
    public function exportExcel(Request $request)
    {
        return Excel::download(new StudentExport, 'student-excel.xlsx');
    }

    // public function exportExcel(Request $request)
    // {
    //     return CSV::download(new StudentExport, 'student-excel.csv');
    // }

    public function exportPdf()
    {
        // Get all students
        $students = Student::all();

        // Load the view
        $pdf = Pdf::loadView('student-pdf-export', compact('students'));

        // Set the paper size to A4
        $pdf->setPaper('A4', 'portrait');

        // Download the PDF file
        return $pdf->download('students.pdf');

    }
}