<?php
   
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\Export;
use App\Imports\Import;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Test;
use App\Http\Requests\FileSubmitRequest;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       $tests = Test::paginate(5);
       return view('backend.import', compact('tests'));
    }
    public function delete($id){
        $test = Test::find($id);
        $test->delete();

        return redirect()->route('excel');
    }
    public function create(){
        return view('backend.add');
    }
    public function store(Request $request){
        // thao tác với CSDL
        // use Illuminate\Support\Facades\Hash;
        $test = new Test;
        $test->name = $request->name;
        $test->email = $request->email;
       
        $test->save();

        return redirect()->route('excel');
       
    }
    public function deleteAll(){
        DB::table('tests')->delete();
        return redirect()->route('excel');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new Export, 'test.csv');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(FileSubmitRequest $request) 
    {
        Excel::import(new Import,request()->file('file'));
        
        return back();
    }
    
}